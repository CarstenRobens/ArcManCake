<?php

class BoughtExtra extends AppModel{
	
	public $belongsTo = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'proposal_id'
			),
			'MyExtra' => array(
					'className' => 'Extra',
					'foreignKey' => 'extra_id'
			)
	);
	
	
    public $validate=array(
    		'price'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie einen gültigen Preis an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'allowEmpty'=>false
			),
    		'factor'=>array(
    			'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie einen gültige Zahl an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'allowEmpty'=>false
    		)
    		
    );
    
    public function idFromKeys ($proposal_id,$extra_id){
    	return $BoughtExtra=$this->find('list',array(
        		'conditions'=>array('proposal_id' => $proposal_id, 'extra_id' => $extra_id)
        ));
    }
    
    public function add_default_extra($proposal_id=NULL,$extra_id=NULL) {
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
		
		if (!$extra_id) {
			throw new NotFoundException(__('Invalid Extra'));
		}
		
		$extra=$this->MyExtra->findById($extra_id);
		$proposal=$this->MyProposal->findById($proposal_id);
		
		$bought_extra['proposal_id']=$proposal_id;
		$bought_extra['extra_id']=$extra['MyExtra']['id'];
		$bought_extra['price']=$this->MyProposal->MyHouse->extra_price($proposal['MyHouse']['type'],$extra['MyExtra']);
		$bought_extra['factor']=1;
	
		$this->create();
		
		if ($this->save($bought_extra)) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}
	
	public function edit_extra($bought_extra=NULL,$price=NULL, $factor=NULL) {
		if (!$bought_extra) {
			throw new NotFoundException(__('Invalid Bought Extra'));
		}
		
		$bought_extra['price']=$price;
		$bought_extra['factor']=$factor;
	
		if ($this->save($bought_extra)) {
			return TRUE;
		}else{
			return FALSE;
		}
	
	}
	
	public function delete_extra($bought_extra_id=NULL) {
		if (!$bought_extra_id) {
			throw new NotFoundException(__('Invalid Bought Extra'));
		}
	
		$x = $this->findById($bought_extra_id);
		if (!$x) {
			throw new NotFoundException(__('Invalid Bought Extra'));
		}
		/* Logic to handle the removal of a garage */
		if($x['MyExtra']['type']==1){
			$count= sizeof($this->find('all',array(
					'conditions'=>array('proposal_id'=>$x['MyProposal']['id'],'MyExtra.bool_external'=>0,'MyExtra.type'=>1))));
			if($count==1){
				$ext_garage=$this->find('first',array(
						'conditions'=>array('proposal_id'=>$x['MyProposal']['id'],'MyExtra.bool_external'=>1,'MyExtra.type'=>1)));
				if(!empty($ext_garage)){
					$house=$this->MyProposal->MyHouse->findById($ext_garage['MyProposal']['house_id']);
					$price=$this->MyProposal->MyHouse->extra_price($house['MyHouse']['type'],$ext_garage['MyExtra']);
					$this->edit_extra($ext_garage['BoughtExtra'],$price,1);
				}
			}
		}
		/*end*/
		
		$custom_deleted=true;
		if($x['MyExtra']['bool_custom']){
			$custom_deleted=$this->MyExtra->delete($x['MyExtra']['id']);
		}
	
		if ($this->delete($bought_extra_id) && $custom_deleted) {
			return $x['MyProposal']['id'];
		}else{
			return FALSE;
		}
	
	}
	
	public function _empty($value) {
	  return empty($value);
	}
	
	
	public function allow_extra($proposal_id,$extra){
		/* checks for dependencies with other extras and whether it has to be unique */
		if (!$extra) {
			throw new NotFoundException(__('Invalid Extra'));
		}
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
		
		$tmp = $this->idFromKeys($proposal_id,$extra['id']);
		$tmp2 = $this->idFromKeys($proposal_id,$extra['depends_on']);
		
		if ($extra['bool_unique'] && !empty($tmp)){
			return FALSE;
		}elseif(empty($tmp2) && $extra['depends_on']!=0){
			return FALSE;
		}else{
			return TRUE;
		}
		
	}
    	

}
