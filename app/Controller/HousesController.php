<?php
class HousesController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow visitors to view houses
	
		$this->Auth->allow('index','view');
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'));
			return FALSE; # Overseers have the same privileges as visitors
		}elseif(in_array($this->action, array('edit','delete','view'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		
		if ($logged_user['role']<2){
			$this->set('houses_view',$this->House->find('all'));
		}else{
			$this->set('houses_view',$this->House->find('all',Array('conditions'=>Array('user_id'=>$logged_user['id']))));
		}
		
		
		
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->House->create();
				if ($this->House->save($this->request->data)) {
					$this->Session->setFlash(__('The house has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your house.'));
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid customer'));
            }
	
            $x = $this->House->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid customer'));
            }
            $this->set('house_view',$x);

	}

	
    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invalid house'));
        }
            
        $x = $this->House->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid house'));
        }
            
        if ($this->request->is(array('house','put'))) {
        	$this->House->id = $id;
        	if ($this->House->save($this->request->data)) {
            	$this->Session->setFlash(__('The house has been updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update the house.'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->House->delete($id)) {
        	$this->Session->setFlash(__('House with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
