<?php
class OfferController extends AppController {

	var $name = 'Offer';
	var $components = array('Email','RequestHandler');
	var $helpers = array('GoogleMap','Number');
	var $uses = null;
	
	var $paginate = array(
		'limit' => 10,
        'order' => array(
			'News.date_posted' => 'desc',  
			//'Post.date_posted' => 'asc'
		)
	);
	function beforeFilter()
    {
		$this->Auth->allow('index','view','verify','region');
        parent::beforeFilter();
		$this->Session->write('menue.active','Offer');
		$this->set("title_for_layout",'Immobilienscout Kaufobjekte; ');
	}
	
	
	
	function region($Region_id=0,$sort=0) {
		

		
		$this->set('sort', $sort);
		$this->set('Region_id', $Region_id);
		
		$lasthouse = array();
		
		$lasthouse['menue'] = 'Kaufobjekte';
		$lasthouse['house_name'] = $Region_id;
		
		$this->Session->write('lasthouse', $lasthouse);
		
		/**
		 * Immocaster SDK laden.
		 */
		require_once('Immocaster/Sdk.php');
		
		/**
		 * Verbindung zum Service von ImmobilienScout24 aufbauen.
		 * Die Daten (Key und Secret) erhält man auf 
		 * http://developer.immobilienscout24.de.
		 */
		
		$sImmobilienScout24Key    = 'Kundenwebsite-tc-architectKey'; // Hier den Key für ImmobilienScout24 einsetzen
		$sImmobilienScout24Secret = 'GreDmJJfqMFQ5waBqSTd'; // Hier Secret für ImmobilienScout24 einsetzen
		$oImmocaster              = Immocaster_Sdk::getInstance('is24',$sImmobilienScout24Key,$sImmobilienScout24Secret);
		$oImmocaster->setReadingType('curl');
		/**
		 * Auf Live-System arbeiten.
		 * Für die Arbeit mit Livedaten, muss man von
		 * ImmobilienScout24 extra freigeschaltet werden.
		 * Standardmäßig wird auf der Sandbox gearbeitet!
		 */
		App::uses('ConnectionManager', 'Model');
		$dataSource = ConnectionManager::getDataSource('default');
		$username = $dataSource->config['login'];
		$password = $dataSource->config['password'];
		$host = $dataSource->config['host'];
		$database = $dataSource->config['database'];
		 
		$oImmocaster->setRequestUrl('live');
		$aDatabase = array(
		  'mysql',
		  $host,
		  $username,
		  $password,
		  $database
		);
		$oImmocaster->setDataStorage($aDatabase);
		
		$this->set('oImmocaster', $oImmocaster);
		
		
		/**
		 * Region ermitteln.
		 */
		$aParameter = array('q'=>'Düsseldorf');
		$RegionArrayXML        = $oImmocaster->getRegions($aParameter);
		$this->set('RegionArrayXML', $RegionArrayXML);
		
		
		
		/*
		$type = "housebuy"; 
		$aParameter = array('geocoordinates'=>' 51.13;6.37;2000' ,
		'realestatetype'=>$type, 'username'=>'89991', 
		'channel'=>'hp'); 
		$res        = $oImmocaster->radiusSearch($aParameter); 
		$this->set('OffersArrayXML', $res);
		*/
		$type = "housebuy"; 
		$aParameter = array('geocodes'=>$Region_id ,
		'realestatetype'=>$type, 'username'=>'89991', 
		'channel'=>'hp'); 
		$res        = $oImmocaster->regionSearch($aParameter); 
		$this->set('OffersArrayXML', $res);
	}
	
	
	function index() {
		
		$lasthouse['menue'] = 'Kaufobjekte';
		$this->Session->write('lasthouse', $lasthouse);
		
		/**
		 * Immocaster SDK laden.
		 */
		require_once('Immocaster/Sdk.php');
		
		/**
		 * Verbindung zum Service von ImmobilienScout24 aufbauen.
		 * Die Daten (Key und Secret) erhält man auf 
		 * http://developer.immobilienscout24.de.
		 */
		
		$sImmobilienScout24Key    = 'Kundenwebsite-tc-architectKey'; // Hier den Key für ImmobilienScout24 einsetzen
		$sImmobilienScout24Secret = 'GreDmJJfqMFQ5waBqSTd'; // Hier Secret für ImmobilienScout24 einsetzen
		$oImmocaster              = Immocaster_Sdk::getInstance('is24',$sImmobilienScout24Key,$sImmobilienScout24Secret);
		$oImmocaster->setReadingType('curl');
		/**
		 * Auf Live-System arbeiten.
		 * Für die Arbeit mit Livedaten, muss man von
		 * ImmobilienScout24 extra freigeschaltet werden.
		 * Standardmäßig wird auf der Sandbox gearbeitet!
		 */
		App::uses('ConnectionManager', 'Model');
		$dataSource = ConnectionManager::getDataSource('default');
		$username = $dataSource->config['login'];
		$password = $dataSource->config['password'];
		$host = $dataSource->config['host'];
		$database = $dataSource->config['database'];
		 
		$oImmocaster->setRequestUrl('live');
		$aDatabase = array(
		  'mysql',
		  $host,
		  $username,
		  $password,
		  $database
		);
		$oImmocaster->setDataStorage($aDatabase);
		
		$this->set('oImmocaster', $oImmocaster);
		
		$regionarray = array(1276010010,1276010012,1276010017,1276010027,1276010029,1276010034,1276010037,1276010051,1276010053);
		
		
		
		for ($idx = 0; $idx < sizeof($regionarray) ; $idx++) {
			$type = "housebuy"; 
			$aParameter = array('geocodes'=>$regionarray[$idx] ,
			'realestatetype'=>$type, 'username'=>'89991', 
			'channel'=>'hp'); 
			$res        = $oImmocaster->regionSearch($aParameter); 
			$OffersArray = Xml::toArray(Xml::build($res));
			$numoffers[$regionarray[$idx]]=$OffersArray['resultlist']['resultlistEntries']['@numberOfHits'];
			
			
		}
		$this->set('numoffers', $numoffers);
		
		
		
		
		
		
		
		
		
		
		
	}
	
	
	
	function view($id=0,$Region_id=0) {
		if(empty($this->data) && $id==0){
			$this->redirect(array('action'=>'index', 'Immobilienscout', 'Kaufobjekte'));
		}
		if($Region_id==0){
			$lasthouse['house_name'] = 'allregions';
			$lasthouse['menue'] = 'Kaufobjekte';
			$this->Session->write('lasthouse', $lasthouse);
		}else{
			$lasthouse['menue'] = 'Kaufobjekte';
			$lasthouse['house_name'] = $Region_id;
			$this->Session->write('lasthouse', $lasthouse);
		}
		
		
		
		
		$this->set('Region_id', $Region_id);
		/**
		 * Immocaster SDK laden.
		 */
		require_once('Immocaster/Sdk.php');
		
		/**
		 * Verbindung zum Service von ImmobilienScout24 aufbauen.
		 * Die Daten (Key und Secret) erhält man auf 
		 * http://developer.immobilienscout24.de.
		 */
		
		$sImmobilienScout24Key    = 'Kundenwebsite-tc-architectKey'; // Hier den Key für ImmobilienScout24 einsetzen
		$sImmobilienScout24Secret = 'GreDmJJfqMFQ5waBqSTd'; // Hier Secret für ImmobilienScout24 einsetzen
		$oImmocaster              = Immocaster_Sdk::getInstance('is24',$sImmobilienScout24Key,$sImmobilienScout24Secret);
		$oImmocaster->setReadingType('curl');
		/**
		 * Auf Live-System arbeiten.
		 * Für die Arbeit mit Livedaten, muss man von
		 * ImmobilienScout24 extra freigeschaltet werden.
		 * Standardmäßig wird auf der Sandbox gearbeitet!
		 */
		App::uses('ConnectionManager', 'Model');
		$dataSource = ConnectionManager::getDataSource('default');
		$username = $dataSource->config['login'];
		$password = $dataSource->config['password'];
		$host = $dataSource->config['host'];
		$database = $dataSource->config['database'];
		 
		$oImmocaster->setRequestUrl('live');
		$aDatabase = array(
		  'mysql',
		  $host,
		  $username,
		  $password,
		  $database
		);
		$oImmocaster->setDataStorage($aDatabase);
		
		$this->set('oImmocaster', $oImmocaster);
		
		
		Controller::loadModel('Contact');
		$this->set('user', $this->Session->read('Auth.User'));
		
		if (!empty($this->data)) {
			
			/**
			* Expose über die ID auslesen.
			*/	
			$aParameter = array('exposeid'=>$this->data['Contact']['expose_id']); // Expose-ID hinterlegen
			$ExposeArrayXML        = $oImmocaster->getExpose($aParameter);
			//echo '<div class="codebox"><textarea>'.$res.'</textarea></div>';
			$this->set('ExposeArrayXML', $ExposeArrayXML);
			/**
			* Attachment auslesen.
			*/
			$aParameter = array('exposeid'=>$this->data['Contact']['expose_id']); // Expose-ID hinterlegen
			$ExposeAttArrayXML        = $oImmocaster->getAttachment($aParameter);
			$this->set('ExposeAttArrayXML', $ExposeAttArrayXML);
			//debug( $this->Session->read('Auth.User'));
			
			
			$this->data['Contact']['title'] = 'Anfrage zu Angebot: '.$this->data['Contact']['expose_id'];
			if ($this->Session->read('Auth.User')){
				 $this->data['Contact']['email'] = $this->Session->read('Auth.User.email');
				 $this->data['Contact']['name'] = $this->Session->read('Auth.User.name');
			} 
			$this->Contact->set($this->data);
				 
				
			if ($this->Contact->validates()) {
				$this->_sendNewUserMail( $this->data['Contact']['name'],$this->data['Contact']['email'],$this->data['Contact']['title'], $this->data['Contact']['body'],$this->data['Contact']['expose_id']  );
				$this->Session->setFlash(__('Anfrage wurde versendet', true), 'alert-box', array('class'=>'alert-success'));
				$this->redirect(array('action'=>'view', $this->data['Contact']['expose_id']));
			}
		} else {
		
			
			/**
			* Expose über die ID auslesen.
			*/	
			$aParameter = array('exposeid'=>$id); // Expose-ID hinterlegen
			$ExposeArrayXML        = $oImmocaster->getExpose($aParameter);
			//echo '<div class="codebox"><textarea>'.$res.'</textarea></div>';
			$this->set('ExposeArrayXML', $ExposeArrayXML);
			/**
			* Attachment auslesen.
			*/
			$aParameter = array('exposeid'=>$id); // Expose-ID hinterlegen
			$ExposeAttArrayXML        = $oImmocaster->getAttachment($aParameter);
			$this->set('ExposeAttArrayXML', $ExposeAttArrayXML);
			//debug( $this->Session->read('Auth.User'));
		}
	}
	
	
	
	function verify() {
		$this->Session->write('lasthouse', 'Verify');
		
		
		/**
		 * Immocaster SDK laden.
		 */
		require_once('Immocaster/Sdk.php');
		
		/**
		 * Verbindung zum Service von ImmobilienScout24 aufbauen.
		 * Die Daten (Key und Secret) erhält man auf 
		 * http://developer.immobilienscout24.de.
		 */
		
		$sImmobilienScout24Key    = 'Kundenwebsite-tc-architectKey'; // Hier den Key für ImmobilienScout24 einsetzen
		$sImmobilienScout24Secret = 'GreDmJJfqMFQ5waBqSTd'; // Hier Secret für ImmobilienScout24 einsetzen
		$oImmocaster              = Immocaster_Sdk::getInstance('is24',$sImmobilienScout24Key,$sImmobilienScout24Secret);
		$oImmocaster->setReadingType('curl');
		
		
		/**
		 * Auf Live-System arbeiten.
		 * Für die Arbeit mit Livedaten, muss man von
		 * ImmobilienScout24 extra freigeschaltet werden.
		 * Standardmäßig wird auf der Sandbox gearbeitet!
		 */
		$oImmocaster->setRequestUrl('live');
		$aDatabase = array(
		  'mysql',
		  (Configure::read('__ImmocasterDB.Host')),
		  (Configure::read('__ImmocasterDB.Benutzer')),
		  (Configure::read('__ImmocasterDB.Passwort')),
		  (Configure::read('__ImmocasterDB.Datenbankname'))
		);
		$oImmocaster->setDataStorage($aDatabase);
		
		$this->set('oImmocaster', $oImmocaster);
		
		
		
		
	}
	
	

	
}
?>