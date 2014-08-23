<?php
class CustomersController extends AppController{
	public $helper = array('Html','Form');
	
	public $components = array('Paginator');
	
	public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Customer.name' => 'asc'
        )
    );

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Customers');
	}
	
	public function isAuthorized($logged_user) {
		if (isset($logged_user['role']) && $logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'), 'alert-box', array('class'=>'alert-error'));
			return FALSE;
		} # Overseers are not allowed to interact with customer data

		if (in_array($this->action, array('index'))){
			return TRUE;
		}
	
		if (in_array($this->action, array('edit','delete','view'))){
			$customerId=(int) $this->request->params['pass'][0];
			if ($this->Customer->isOwnedBy($customerId,$logged_user['id'])){
				return TRUE;
			}
		}
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		
		$this->Paginator->settings = $this->paginate;
		if ($logged_user['role']!=2){
			$this->set('customers_view',$this->Paginator->paginate());
		}else{
			$this->set('customers_view',$this->Paginator->paginate('Customer',array('Customer.user_id LIKE'=>$logged_user['id'])));
		}
		
		
		if ($logged_user['role']<3){
			if ($this->request->is('post')) {
				$this->Customer->create();
				$this->request->data['Customer']['user_id'] = $this->Auth->user('id');
				if ($this->Customer->save($this->request->data)) {
					$this->Session->setFlash(__('Your customer has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your customer.'), 'alert-box', array('class'=>'alert-error'));
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid pustomer'));
            }
	
            $x = $this->Customer->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid pustomer'));
            }
            $this->set('customer_view',$x);

	}


    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invalid customer'));
        }
            
        $x = $this->Customer->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid customer'));
        }
            
        if ($this->request->is(array('customer','put'))) {
        	$this->Customer->id = $id;
        	if ($this->Customer->save($this->request->data)) {
            	$this->Session->setFlash(__('Your customer has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your customer.'), 'alert-box', array('class'=>'alert-error'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Customer->delete($id)) {
        	$this->Session->setFlash(__('The customer with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }

    
  	
}
