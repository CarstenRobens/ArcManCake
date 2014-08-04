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
	
	
	public function add($proposal_id=NULL) {
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
	
		$this->set('list_extras_view',$this->BoughtExtra->MyExtra->find('list'));
		$this->set('extras_view',$this->BoughtExtra->MyExtra->find('all'));
	
	
		if ($this->request->is('post')) {
			$this->BoughtExtra->create();
			$this->request->data['BoughtExtra']['proposal_id']=$proposal_id;
			if ($this->BoughtExtra->save($this->request->data)) {
				$this->Session->setFlash(__('Extra added.'));
				return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
			}
			$this->Session->setFlash(__('Unable to add extra to your proposal.'));
		}
	}    
	
	/* public function add_default($proposal_id=NULL,$extra_id=NULL) {
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
		
		if (!$extra_id) {
			throw new NotFoundException(__('Invalid Extra'));
		}
		
		$extra=$this->BoughtExtra->MyExtra->findById($extra_id);
		
		$bought_extra['proposal_id']=$proposal_id;
		$bought_extra['extra_id']=$extra['MyExtra']['id'];
		$bought_extra['price']=$extra['MyExtra']['default_price'];
		$bought_extra['factor']=1;
	
		$this->BoughtExtra->create();
		
		if ($this->BoughtExtra->save($bought_extra)) {
			$this->Session->setFlash(__('Extra added to proposal.'));
			return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
		}
		$this->Session->setFlash(__('Unable to add extra to your proposal.'));
	} */
	
	
	public function add_default($proposal_id=NULL,$extra_id=NULL) {
		
		if ($this->BoughtExtra->add_default_extra($proposal_id,$extra_id)) {
			$this->Session->setFlash(__('Extra added to proposal.'));
			return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
		}else {
			$this->Session->setFlash(__('Unable to add extra to your proposal.'));
			return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
		}
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
		
		
		$this->set('proposal_id_view',$proposal_id);
		$this->set('extras_view',$extras);
		$this->set('list_categories_view',$this->BoughtExtra->MyExtra->MyCategory->find('list'));
		
		
		if ($this->request->is('post')){
			foreach($extras as $x){
				if ($this->request->data['List_bool']['bool_'.$x['MyExtra']['id']]){
					
					if (!$this->BoughtExtra->add_default_extra($proposal_id,$x['MyExtra']['id'])) {
						$this->Session->setFlash(__('Unable to add the'. $x['MyExtra']['name'] .' extra to your proposal.'));
					}else{
						/* Logic to handle the addition of a garage */
						if($x['MyExtra']['bool_garage']){
							$this->BoughtExtra->edit_extra($ext_garage['BoughtExtra']['id'],1,1);
						}	
					}
				}
			}
			$this->Session->setFlash(__('Extras added.'));
			return $this->redirect(array('controller'=>'Proposals','action'=>'view',$proposal_id));
		}
		
	}
	
	
	
	
	public function edit($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invalid bought extra'));
		}
		
		$x = $this->BoughtExtra->findById($id);
		$this->set('proposal_id_view',$x['BoughtExtra']['proposal_id']);
		$this->set('bought_extra',$x);
		if (!$x) {
			throw new NotFoundException (__('Invalid bought extra'));
		}
	
		if ($this->request->is(array('bought_extra','put'))) {
			$this->BoughtExtra->id = $id;
			if ($this->BoughtExtra->save($this->request->data)) {
				$this->Session->setFlash(__('The extra has been updated'));
				return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyProposal']['id']));
			}
			$this->Session->setFlash(__('Unable to update your customer.'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
	
   
    public function delete($id) {
    	
    	$x = $this->BoughtExtra->findById($id);
    	
    	/* Logic to handle the removal of a garage */
    	if($x['MyExtra']['bool_garage']){
    		$count= sizeof($this->BoughtExtra->find('all',array(
				'conditions'=>array('proposal_id'=>$x['MyProposal']['id'],'MyExtra.bool_external'=>0,'MyExtra.bool_garage'=>1))));
			if($count==1){
    		 	$ext_garage=$this->BoughtExtra->find('first',array(
					'conditions'=>array('proposal_id'=>$x['MyProposal']['id'],'MyExtra.bool_external'=>1,'MyExtra.bool_garage'=>1)));
    			$this->BoughtExtra->edit_extra($ext_garage['BoughtExtra']['id'],$ext_garage['MyExtra']['default_price'],1);
    		}
    	} 
    	/*end*/
    	
    	if ($this->BoughtExtra->delete($id)) {
    		$this->Session->setFlash(__('Deleted'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view', $x['MyProposal']['id']));
    	}
    }
    
    
    
}
