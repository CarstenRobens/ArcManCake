<?php
class LandsController extends AppController{
	
	public $components = array('RequestHandler');
	public $helper = array('Html','Form');

	public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Land.name' => 'asc'
        )
    );
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Lands');
	}
	
	public function isAuthorized($logged_user) {
		
		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'), 'alert-box', array('class'=>'alert-error'));
			return FALSE; # Overseers are not allowed to interact with customer data
		} else{
			return TRUE;
		}
		
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		/**
		 * Shows all existing lands.
		 * Also allows you to created a new land in the DB, free from any customer (Land.customer_id=0)
		 */
		$logged_user = $this->Auth->user();
		$this->set('lands_view',$this->paginate());
	

		if ($logged_user['role']<3){
			if ($this->request->is('post')) {
				$this->Land->create();
				$this->request->data['Land']['notary_cost'] = 2.5;
				$this->request->data['Land']['land_tax'] = 5;
				$this->request->data['Land']['building_tax'] = 1.25;
				$this->request->data['Land']['customer_id'] = 0;
				$this->request->data['Land']['user_id'] = $this->Auth->user('id');
				if ($this->Land->save($this->request->data)) {
					$this->Session->setFlash(__('The land has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the land.'), 'alert-box', array('class'=>'alert-error'));
			}
		}
	}

	public function view($id=null) {
		/**
		 * Shows all details of the land with id $id
		 */
            if(!$id){
                throw new NotFoundException(__('Invalid land'));
            }
	
            $x = $this->Land->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid land'));
            }
            $this->set('land_view',$x);

	}


	public function add_land_for_customer($customer_id) {
		/**
		 * Creates a new entry of land in the DB associated with a customer (Land.customer=$customer_id).
		 */
		if (!$customer_id) {
			throw new NotFoundException(__('Invalid land'));
		}
		
		$this->set('customer_view',$this->Land->MyCustomer->findById($customer_id));
        if ($this->request->is('post')) {
        	$this->Land->create();
			$this->request->data['Land']['notary_cost'] = 2.5;
			$this->request->data['Land']['land_tax'] = 5;
			$this->request->data['Land']['building_tax'] = 1.25;
            $this->request->data['Land']['user_id'] = $this->Auth->user('id');
            $this->request->data['Land']['customer_id']=$customer_id;
            if ($this->Land->save($this->request->data)) {
            	$this->Session->setFlash(__('Your land has been saved.'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your customer.'), 'alert-box', array('class'=>'alert-error'));
     	}
	}
        
	
    public function edit($id = NULL) {
    	/**
    	 * Allows the user to manipulate the data in the entry of the land with id $id.
    	 */
    	if (!$id) {
        	throw new NotFoundException(__('Invaled land'));
        }
            
        $x = $this->Land->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid land'));
        }
            
        if ($this->request->is(array('land','put'))) {
        	$this->Land->id = $id;
        	if ($this->Land->save($this->request->data)) {
            	$this->Session->setFlash(__('Your land has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your land.'), 'alert-box', array('class'=>'alert-error'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	/**
    	 * Deletes the land with id $id from the DB.
    	 */
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Land->delete($id)) {
        	$this->Session->setFlash(__('The land with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
    
    
    public function all_names() {
    	/**
		 * Creates a JSON view with an array of pairs id-land.
		 * All lands are included (It has to be modified)
    	 */
    	$customer_id=$this->request->data['customer_id'];
    	if (!$customer_id) {
    		throw new NotFoundException (__('Invalid customer'));
    	}
    	
    	$lands=$this->Land->find('list',array(
				'conditions'=>array('customer_id' => array(0 ,$customer_id))
    	));
    	$lands2=array();
    	foreach ($lands as $index=>$land){
    		$lands2[]=array($index,$land);
    	}
    	$this->set('land_list_view',$lands2);
    	$this->set('_serialize',array('land_list_view'));
    }
  	
}
