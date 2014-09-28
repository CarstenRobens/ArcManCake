<?php
class JobOffersController extends AppController{
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
		$this->Auth->allow('index','check_open');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Job Angebote; '.$company['keywords']);
	}
	
	public function index() {
		$this->Session->write('menue.active','JobOffers');
		$current_user = $this->Auth->user();
	
		$this->Paginator->settings = $this->paginate;
		if ($current_user['role']<2){
			$this->set('job_offers_view',$this->Paginator->paginate());
		}else{
			$this->set('job_offers_view',$this->Paginator->paginate('JobOffer',array('bool_active'=>1)));
		}
	
	
		if ($current_user['role']<2){
			if ($this->request->is('post')) {
				$this->JobOffer->create();
				$this->request->data['JobOffer']['user_id'] = $this->Auth->user('id');
				$this->request->data['JobOffer']['bool_active'] = 1;
				if ($this->JobOffer->save($this->request->data)) {
					$this->Session->setFlash(__('The job offer has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the job offer.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
	}
	
	
	public function edit($id = NULL) {
		$this->Session->write('menue.active','JobOffers');
		if (!$id) {
			throw new NotFoundException(__('Invalid job offer'));
		}
	
		$x = $this->JobOffer->findById($id);
		if (!$x) {
			throw new NotFoundException (__('Invalid job offer'));
		}
	
		if ($this->request->is(array('job_offer','put'))) {
			$this->JobOffer->id = $id;
			if ($this->JobOffer->save($this->request->data)) {
				$this->Session->setFlash(__('The job offer has been updated'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update your job offer.'), 'alert-box', array('class'=>'alert-danger'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
	
	public function toggle_activation($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invalid job offer'));
		}
	
		$x = $this->JobOffer->findById($id);
		if (!$x) {
			throw new NotFoundException (__('Invalid job offer'));
		}
		
		$x['JobOffer']['bool_active']=!$x['JobOffer']['bool_active'];
		
		$this->request->data=$x;
		
		if ($this->JobOffer->save($this->request->data)) {
			$this->Session->setFlash(__('The job offer has been updated'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Unable to update your job offer.'), 'alert-box', array('class'=>'alert-danger'));
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->JobOffer->delete($id)) {
			$this->Session->setFlash(__('Deleted'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action'=>'index'));
		}
	}
	
	public function check_open() {
		$check_open = $this->JobOffer->find('count', array('conditions' => array('JobOffer.bool_active' => true)));
		return $check_open;
	}
	
	
}