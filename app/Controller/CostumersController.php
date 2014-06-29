<?php
class CostumersController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		
	}
	
	public function isAuthorized($logged_user) {
		if (isset($logged_user['role']) && $logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'));
			return FALSE;
		} # Overseers are not allowed to interact with costumer data

		if (in_array($this->action, array('index'))){
			return TRUE;
		}
	
		if (in_array($this->action, array('edit','delete','view'))){
			$costumerId=(int) $this->request->params['pass'][0];
			if ($this->Costumer->isOwnedBy($costumerId,$logged_user['id'])){
				return TRUE;
			}
		}
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		
		if ($logged_user['role']<2){
			$this->set('costumers_view',$this->Costumer->find('all'));
		}else{
			$this->set('costumers_view',$this->Costumer->find('all',Array('conditions'=>Array('user_id'=>$logged_user['id']))));
		}
		
		
		if ($logged_user['role']<3){
			if ($this->request->is('post')) {
				$this->Costumer->create();
				$this->request->data['Costumer']['user_id'] = $this->Auth->user('id');
				if ($this->Costumer->save($this->request->data)) {
					$this->Session->setFlash(__('Your costumer has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your costumer.'));
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid postumer'));
            }
	
            $x = $this->Costumer->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid postumer'));
            }
            $this->set('costumer_view',$x);

	}


    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invaled postumer'));
        }
            
        $x = $this->Costumer->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid costumer'));
        }
            
        if ($this->request->is(array('costumer','put'))) {
        	$this->Costumer->id = $id;
        	if ($this->Costumer->save($this->request->data)) {
            	$this->Session->setFlash(__('Your costumer has been updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your costumer.'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Costumer->delete($id)) {
        	$this->Session->setFlash(__('The costumer with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }

    
    
    /**               NOW INCLUDED IN THE INDEX
     public function add() {
     if ($this->request->is('post')) {
     $this->Costumer->create();
     $this->request->data['Costumer']['user_id'] = $this->Auth->user('id');
     if ($this->Costumer->save($this->request->data)) {
     $this->Session->setFlash(__('Your costumer has been saved.'));
     return $this->redirect(array('action' => 'index'));
     }
     $this->Session->setFlash(__('Unable to add your postumer.'));
     }
     }
     **/
  	
  	
}
