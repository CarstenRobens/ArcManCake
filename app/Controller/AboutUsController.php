<?php
class AboutUsController extends AppController {

	var $name = 'AboutUs';
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
		$this->Session->write('menue.active','AboutUs');
		$this->Auth->allow('Unternehmen','unserePartner');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Ihre Vorteile; '.$company['keywords']);
		
	}
	
	function Unternehmen() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Unternehmen; '.$company['keywords']);
    	$this->Session->write('menue.active','AboutUs');
	}
	
	function unserePartner() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'unsere Partner; '.$company['keywords']);
    	$this->Session->write('menue.active','AboutUs');
	}
	
	
	
}
?>