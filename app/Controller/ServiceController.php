<?php
class ServiceController extends AppController {

	var $name = 'Service';
	var $uses = null;
	
	public $helper = array('Html','Form');

	public $components = array('Paginator');
	
	var $paginate = array(
		'limit' => 10,
        'order' => array(
			'News.date_posted' => 'desc',  
			//'Post.date_posted' => 'asc'
		)
	);
	function beforeFilter()
    {
		parent::beforeFilter();
		$this->Session->write('menue.active','Service');
		$this->Auth->allow('index','schutzbriefe','finanzierung');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Service; '.$company['keywords']);
		
	}
	
	function index() {
		
	}
	
	public function schutzbriefe() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Schutzbriefe; '.$company['keywords']);
    	$this->Session->write('menue.active','Service');
    }
	
	public function finanzierung() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Finanzierung; '.$company['keywords']);
    	$this->Session->write('menue.active','Service');
    }

	
}
?>