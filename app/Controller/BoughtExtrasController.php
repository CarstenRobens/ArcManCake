<?php
class BoughtExtrasController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','BoughtExtras');
	}
	
	public function isAuthorized($logged_user) {
		
		if ($logged_user['role']<3) {
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	public function add_many_extras($proposal_id=NULL,$bool_external=false) {
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
	
		$proposal = $this->BoughtExtra->MyProposal->findById($proposal_id);
		$ext_garage=$this->BoughtExtra->find('first',array(
            		'conditions'=>array('proposal_id'=>$proposal_id,'MyExtra.bool_external'=>1,'MyExtra.bool_garage'=>1)));
		$extras=$this->BoughtExtra->MyExtra->find('all',array(
            		'conditions'=>array('MyExtra.bool_external'=>$bool_external,'MyExtra.bool_custom'=>false)));
		
		foreach ($extras as $key=>$x){
			$house_dependency=($proposal['MyHouse']['id']==$x['MyExtra']['depends_on_house'] || $x['MyExtra']['depends_on_house']==0);
			if(!$this->BoughtExtra->allow_extra($proposal_id,$x['MyExtra']) || !$house_dependency){
				unset($extras[$key]);
			}
		}
		
		$this->set('proposal_id_view',$proposal_id);
		$this->set('extras_view',$extras);
		$this->set('list_categories_view',$this->BoughtExtra->MyExtra->MyCategory->find('list'));
		
		
		if ($this->request->is('post')){
			foreach($extras as $x){
				if ($this->request->data['List_bool']['bool_'.$x['MyExtra']['id']]){
					
					if (!$this->BoughtExtra->add_default_extra($proposal_id,$x['MyExtra']['id'])) {
						$this->Session->setFlash(__('Unable to add the'. $x['MyExtra']['name'] .' extra to your proposal.'), 'alert-box', array('class'=>'alert-error'));
					}else{
						/* Logic to handle the addition of a garage */
						if($x['MyExtra']['bool_garage']){
							$this->BoughtExtra->edit_extra($ext_garage['BoughtExtra'],$ext_garage['BoughtExtra']['price'],0);
						}	
					}
				}
			}
			$this->Session->setFlash(__('Extras added.'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('controller'=>'Proposals','action'=>'view',$proposal_id));
		}
		
	}
	
	
	
	
	public function edit($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invalid bought extra'));
		}
		
		$x = $this->BoughtExtra->findById($id);
		
		if ($x['MyExtra']['bool_uneditable']) {
			$this->Session->setFlash(__('This extra cannot be edited.'), 'alert-box', array('class'=>'alert-error'));
			return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyProposal']['id']));
		}
		
		$this->set('proposal_id_view',$x['BoughtExtra']['proposal_id']);
		$this->set('bought_extra',$x);
		if (!$x) {
			throw new NotFoundException (__('Invalid bought extra'));
		}
	
		if ($this->request->is(array('bought_extra','put'))) {
			$this->BoughtExtra->id = $id;
			if ($this->BoughtExtra->save($this->request->data)) {
				$this->Session->setFlash(__('The extra has been updated'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyProposal']['id']));
			}
			$this->Session->setFlash(__('Unable to update your customer.'), 'alert-box', array('class'=>'alert-error'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
	
   
    public function delete($id) {
    	
    	$bought_extra=$this->BoughtExtra->findById($id);
    	$count=sizeof($this->BoughtExtra->find('list',array('conditions'=>array('proposal_id'=>$bought_extra['MyProposal']['id'],'extra_id'=>$bought_extra['MyExtra']['id']))));
    	debug($count);
    	if ($count==1){
    		$list_extras=$this->BoughtExtra->MyExtra->find('list',array('conditions'=>array('depends_on'=>$bought_extra['MyExtra']['id'])));
    		 
    		foreach($list_extras as $key=>$extra){
    			$x=$this->BoughtExtra->idFromKeys($bought_extra['MyProposal']['id'],$key);
    			if (!empty($x)){
    				foreach($x as $key2=>$y){
    					$this->BoughtExtra->delete_extra($key2);
    				}
    			}
    		}
    	}
    	
    	if ($prop_id=$this->BoughtExtra->delete_extra($id)) {
    		$this->Session->setFlash(__('Deleted'), 'alert-box', array('class'=>'alert-success'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view', $prop_id));
    	}
    }
    
    
    
}
