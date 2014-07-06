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
			throw new NotFoundException(__('Invaled Proposal'));
		}
	
		$this->set('list_extras_view',$this->BoughtExtra->MyExtra->find('list'));
		$this->set('extras_view',$this->BoughtExtra->MyExtra->find('all'));
	
	
		if ($this->request->is('post')) {
			$this->BoughtExtra->create();
			$this->request->data['BoughtExtra']['proposal_id']=$proposal_id;
			if ($this->BoughtExtra->save($this->request->data)) {
				$this->Session->setFlash(__('Extra added.'));
				return $this->redirect(array('controller'=>'Proposals', 'action'=>'edit',$proposal_id));
			}
			$this->Session->setFlash(__('Unable to add extra to your proposal.'));
		}
	}    
	
    public function delete($proposal_id,$extra_id) {
    	
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        
        $id=$this->BoughtExtra->idFromKeys($proposal_id,$extra_id);
        
        if ($this->BoughtExtra->delete($id)) {
        	$this->Session->setFlash(__('Deleted'));
            return $this->redirect(array('controller'=>'Proposals', 'action'=>'edit',$proposal_id));
        }
    }
   
  	
}
