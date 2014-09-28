<?php
class HomeController extends AppController {

	var $name = 'Home';
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
		$this->Session->write('menue.active','HomePictures');
		$this->Auth->allow('index','contact','impressum');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Home; '.$company['keywords']);
		
	}
	
	function index() {
		Controller::loadModel('HomePicture');
		$this->set('home_pictures_view',$this->HomePicture->find('all'));
	}
	
	public function contact() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Kontakt; '.$company['keywords']);
    	$this->Session->write('menue.active','Contact');
    }
	
	public function impressum() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Impressum; '.$company['keywords']);
    	$this->Session->write('menue.active','Impressum');
    }

	
}
?>