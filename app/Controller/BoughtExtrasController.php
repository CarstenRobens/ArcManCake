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
	
	public function add_default($proposal_id=NULL,$extra_id=NULL) {
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
	}
	
	
	
	public function add_many_extras($proposal_id=NULL,$bool_external=false) {
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
	
		$proposal = $this->BoughtExtra->MyProposal->findById($proposal_id);
		$extras=$this->BoughtExtra->MyExtra->find('all',array(
            		'conditions'=>array('MyExtra.bool_external'=>$bool_external,'MyExtra.bool_custom'=>false)));
		$this->set('proposal_id_view',$proposal_id);
		$this->set('extras_view',$extras);
		$this->set('list_categories_view',$this->BoughtExtra->MyExtra->MyCategory->find('list'));
	
		if ($this->request->is('post')){
			foreach($extras as $x){
				if ($this->request->data['List_bool']['bool_'.$x['MyExtra']['id']]){
					$this->BoughtExtra->create();
					$save['BoughtExtra']['proposal_id']=$proposal_id;
					$save['BoughtExtra']['extra_id']=$x['MyExtra']['id'];
					$save['BoughtExtra']['price']=$x['MyExtra']['default_price'];
					$save['BoughtExtra']['factor']=1;
					
					if (!$this->BoughtExtra->save($save)) {
						$this->Session->setFlash(__('Unable to add the'. $x['MyExtra']['name'] .' extra to your proposal.'));
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
    	 
    	if ($this->request->is('get')) {
    		throw new MethodNotAllowedException();
    	}
    	
    	$x = $this->BoughtExtra->findById($id);
    	if ($this->BoughtExtra->delete($id)) {
    		$this->Session->setFlash(__('Deleted'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view', $x['MyProposal']['id']));
    	}
    }
    
    
    
}
