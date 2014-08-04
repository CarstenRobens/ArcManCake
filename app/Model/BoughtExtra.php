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
    			'message'=> 'Please enter a valid price',
    			'allowEmpty'=>false
			),
    		'factor'=>array(
    			'rule'=>'decimal',
    			'message'=> 'Please enter a valid factor',
    			'allowEmpty'=>false
    		)
    		
    );
    
    public function idFromKeys ($proposal_id,$extra_id){
    	return $id=$this->find('list',array(
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
		
		$bought_extra['proposal_id']=$proposal_id;
		$bought_extra['extra_id']=$extra['MyExtra']['id'];
		$bought_extra['price']=$extra['MyExtra']['default_price'];
		$bought_extra['factor']=1;
	
		$this->create();
		
		if ($this->save($bought_extra)) {
			return TRUE;
		}else{
			return FALSE;
		}
		
	}
	
	public function edit_extra($bought_extra_id=NULL,$price=NULL, $factor=NULL) {
		if (!$bought_extra_id) {
			throw new NotFoundException(__('Invalid Bought Extra'));
		}
	
	
		$bought_extra=$this->findById($bought_extra_id);
	
		$bought_extra['BoughtExtra']['price']=$price;
		$bought_extra['BoughtExtra']['factor']=$factor;
	
		if ($this->save($bought_extra)) {
			return TRUE;
		}else{
			return FALSE;
		}
	
	}
    

}
