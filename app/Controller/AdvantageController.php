<?php
class AdvantageController extends AppController {

	var $name = 'Advantage';
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
		$this->Session->write('menue.active','Advantage');
		$this->Auth->allow('bauenMitIZHaus','unsereLeistungen');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Ihre Vorteile; '.$company['keywords']);
		
	}
	
	function bauenMitIZHaus() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Bauen mit IZ Haus; '.$company['keywords']);
    	$this->Session->write('menue.active','Advantage');
	}
	
	
	public function unsereLeistungen() {
		$company = Configure::read('company');
		$this->set("title_for_layout",'Unsere Leistungen; '.$company['keywords']);
    	$this->Session->write('menue.active','Advantage');
    }
	
}
?>