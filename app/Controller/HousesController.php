<?php
class HousesController extends AppController{
	public $helper = array('Html','Form','Number');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow visitors to view houses
	
		$this->Auth->allow('index','view');
		$this->Session->write('menue.active','Houses');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Hausausstellung; '.$company['keywords']);
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'), 'alert-box', array('class'=>'alert-danger'));
			return FALSE; # Overseers have the same privileges as visitors
		}elseif(in_array($this->action, array('edit','delete'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		$this->set('houses_view',$this->paginate());
		
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->House->create();
				$this->request->data['House']['user_id'] = $this->Auth->user('id');
				if ($this->House->save($this->request->data)) {
					$this->Session->setFlash(__('The house has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your house.'), 'alert-box', array('class'=>'alert-danger'));
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
            
            $this->set('house_pictures_view',$x['MyHousePicture']);

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
            	$this->Session->setFlash(__('The house has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update the house.'), 'alert-box', array('class'=>'alert-danger'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	
        $house=$this->House->findById($id);
        
        
        if ($this->House->delete($id)) {
        	foreach ($house['MyHousePicture'] as $x){
        		if ($this->House->MyHousePicture->delete($x['id'])){
        			unlink(WWW_ROOT.'img/uploads/houses/'.$x['picture']);
        		}
        	}
        	$this->Session->setFlash(__('House with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
