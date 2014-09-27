<?php
class ProposalsController extends AppController{
	
	public $helper = array('Html','Form','Number');
	
	public $components = array('RequestHandler','Paginator','Mpdf');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Proposals');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Kundenspezifische Angebote; '.$company['keywords']);
		
	}
	
	public $paginate = array(
        'limit' => 25,
        'order' => array(
            'Proposal.customer_id' => 'asc'
        )
    );
	

	
	public function isAuthorized($logged_user) {
		
		
		if ($logged_user['role']<3 ){
			if (in_array($this->action, array('index','view','download_file','toggle_lock'))){
				return TRUE;
			}
			
			$proposal_id=(int) $this->request->params['pass'][0];
			if($this->Proposal->check_lock($proposal_id) && in_array($this->action, array('edit','delete','edit_house','selected_house','edit_default_picture','selected_default_picture','gen_summary','gen_bank_receipt','gen_contract'))){
				$this->Session->setFlash(__('The proposal is locked'), 'alert-box', array('class'=>'alert-error'));
				return FALSE;
			}
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		/**
		 * Shows in a tabular, squematic way all existent proposals.
		 * Not in the logic thread of the user workflow (admin only).
		 */
		$logged_user = $this->Auth->user();
		$this->Paginator->settings = $this->paginate;
		if ($logged_user['role']<2){
			$this->set('proposals_view',$this->Paginator->paginate());
		}else{
			$this->set('proposals_view',$this->Paginator->paginate('Proposal',array('Proposal.user_id LIKE'=>$logged_user['id'])));
		}
	}
    #Proposal->find('all',Array('conditions'=>Array('user_id'=>$logged_user['id']))));

	public function view($id=null) {
		/**
		 * It shows all relevant information related with a proposal
		 */
		if(!$id){
			throw new NotFoundException(__('Invalid proposal'));
		}

		$x = $this->Proposal->findById($id);

		$y = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>0)));
		$ybase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(-1,-2))));
		$yfloor = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(1,2,3,4))));
		$ysidenobase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(5))));

		$z = $this->Proposal->MyBoughtExtra->find('all',array(
				'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false)));
		$zexternal = $this->Proposal->MyBoughtExtra->find('all',array(
				'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>true)));

		if (!$x) {
			throw new NotFoundException(__('Invalid proposal'));
		}

		$this->set('proposal_view',$x);

		$this->set('normal_house_pictures_view',$y);
		$this->set('basement_house_pictures_view',$ybase);
		$this->set('floorplan_house_pictures_view',$yfloor);
		$this->set('sideview_nobasement_house_pictures_view',$ysidenobase);

		$this->set('bought_extras_view',$z);
		$this->set('bought_external_extras_view',$zexternal);
		
		$enlargement=0;
		$bool_basement=0;
		$bool_standalone=0;
		foreach($z as $index=>$x){
			if($x['MyExtra']['size_dependent_flag']>0){
				if($x['MyBoughtExtra']['price']>0){
					$direction=1;
				}else{
					$direction=-1;
				}
				$enlargement=$direction*$x['MyExtra']['size_dependent_flag'];
			}elseif ($x['MyExtra']['type']==2){
				$bool_basement=1;
			}elseif ($x['MyExtra']['type']==3){
				$bool_standalone=1;
			}
		}
		$this->set('enlargement',$enlargement);
		$this->set('bool_basement',$bool_basement);
		$this->set('bool_standalone',$bool_standalone);
		
		
		
	}


	public function add($customer_id=NULL) {
		/**
		 * Creates an empty proposal for the customer with id $customer_id 
		 */
		if (!$customer_id) {
			throw new NotFoundException(__('Invalid customer'));
		}
		
		
		$this->set('customer_view',$this->Proposal->MyCustomer->findById($customer_id));
		$this->set('list_lands_view',$this->Proposal->MyLand->find('list',array(
			'conditions'=>array('MyLand.customer_id' => array(0 ,$customer_id))
		)));
		$this->set('list_houses_view',$this->Proposal->MyHouse->find('list'));
				
		
        if ($this->request->is('post')) {
        	
        	$this->Proposal->create();
            $this->request->data['Proposal']['user_id'] = $this->Auth->user('id');
            $this->request->data['Proposal']['customer_id']=$customer_id;
            if ($this->Proposal->save($this->request->data)) {
            	
            	/* Add all external extras */
            	 
            	$ext_extras=$this->Proposal->MyBoughtExtra->MyExtra->find('list',array('conditions'=>array('bool_external' => 1)));
            	 
            	foreach($ext_extras as $index=>$x){
            		if(!$this->Proposal->MyBoughtExtra->add_default_extra($this->Proposal->getLastInsertId(),$index)){
            			$this->Session->setFlash(__('Unable to add the'. $x['MyExtra']['name'] .' extra to your proposal.'), 'alert-box', array('class'=>'alert-error'));
            		}
            	}
            	 
            	 
            	/* done */
            	
            	$this->Session->setFlash(__('Your proposal has been saved.'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('controller'=>'Proposals','action' => 'edit_house',$this->Proposal->getLastInsertID()));
            }
            $this->Session->setFlash(__('Unable to add the proposal.'), 'alert-box', array('class'=>'alert-error'));
     	}
	}
        
	
    public function edit($id = NULL) {
    	/**
    	 * Let the user modify all fields of the proposal (Admin only)
    	 */
    	
    	if (!$id) {
        	throw new NotFoundException(__('Invalid proposal'));
        }
            
        $x = $this->Proposal->findById($id);
        $this->set('proposal_view',$x);
        
        if (!$x) {
        	throw new NotFoundException (__('Invalid proposal'));
        }
            
        if ($this->request->is(array('proposal','put'))) {
        	$this->Proposal->id = $id;
        	if ($this->Proposal->save($this->request->data)) {
            	$this->Session->setFlash(__('Your proposal has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your proposal.'), 'alert-box', array('class'=>'alert-error'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
	
	public function selected_land(){
		/**
		 * This action is part of an API to change Proposal.land_id in the DB using ajax.
		 * It receive via POST the land_id we want to set and the proposal_id we want to apply to, and it makes the corresponding changes in the DB.
		 * It creates a JSON view with a success message.
		 * 
		 */
		
		$proposal_id=$this->request->data['proposal_id'];
		$land_id=$this->request->data['land_id'];
		
		if ($this->Proposal->check_lock($proposal_id)){
			$this->Session->setFlash(__('The proposal is locked.'), 'alert-box', array('class'=>'alert-error'));
			return $this->redirect(array('action'=>'view',$proposal_id));
		}
		
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		$x = $this->Proposal->findById($proposal_id);
		$old_land_id=$x['Proposal']['land_id'];
	
		#Check how many Proposals are using the old land:
		$count=sizeof($this->Proposal->find('list',array('conditions'=>array('land_id' => $old_land_id))));
		
		$x['Proposal']['land_id']=$land_id;
	
		if ($this->Proposal->save($x)) {
			$this->Proposal->MyLand->set_ownership($land_id,$x['Proposal']['customer_id']);
			if ($count==1 && $land_id!=$old_land_id){ //if this proposal was the last one using that land, we set the land OPEN
				$this->Proposal->MyLand->set_ownership($old_land_id,0);
			}
			$this->set('confirmation','Land has been changed');
			$this->set('_serialize',array('confirmation'));
		}else{
			$this->set('confirmation','Unable to update your proposal.');
			$this->set('_serialize',array('confirmation'));
		}
	}
	
	
	public function edit_house($id = NULL) {
		/**
		 * This action let the user select house he wants for the proposal with id $id, using a user-friendly interface.
		 * 
		 */
		if (!$id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
	
		$this->set('proposal_id_view',$id);
		$this->set('houses_view',$this->Proposal->MyHouse->find('all'));
		
	}
	
	public function selected_house($proposal_id = NULL, $house_id = NULL, $side=NULL) {
		
		/**
		 * This action changes Proposal.house_id in the DB.
		 * It receives via GET the house_id we want to set and the proposal_id we want to apply to, and it makes the corresponding changes in the DB.
		 *
		 */
		
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		
		
		$prop = $this->Proposal->findById($proposal_id);
		$house = $this->Proposal->MyHouse->findById($house_id);
		
		if (($house['MyHouse']['bool_duplex'] && $side==NULL)||(!$house['MyHouse']['bool_duplex'] && $side!=NULL)) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		
		if (!$house_id) {
			throw new NotFoundException(__('Invalid house'));
		}
		
		foreach ($prop['MyBoughtExtra'] as $bextra){
			$extra=$this->Proposal->MyBoughtExtra->MyExtra->findById($bextra['extra_id']);
			if($extra['MyExtra']['depends_on_house']!=$house['MyHouse']['id'] && $extra['MyExtra']['depends_on_house']!=0){
				$this->Proposal->MyBoughtExtra->delete_extra($bextra['id']);
			}else{
				$price = $this->Proposal->MyHouse->extra_price($house['MyHouse']['type'],$extra['MyExtra']);
				$this->Proposal->MyBoughtExtra->edit_extra($bextra,$price, $bextra['factor']);
			}
		}
		
		$prop['Proposal']['house_id']=$house_id;
		$prop['Proposal']['duplex_side']=$side;
		
		if ($this->Proposal->save($prop)) {
			$this->Session->setFlash(__('Your proposal has been updated'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action'=>'edit_default_picture',$proposal_id));
		}
		$this->Session->setFlash(__('Unable to update your proposal.'), 'alert-box', array('class'=>'alert-error'));
	}
	
	
	public function edit_default_picture($id = NULL) {
		/**
		 * This action let the user select the default picture he wants for the proposal with id $id, using a user-friendly interface.
		 */
		
		if (!$id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
	
		$x = $this->Proposal->findById($id);
		$this->set('proposal_id_view',$id);
		
		$house_pictures=$this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id'=>$x['MyHouse']['id'],'type_flag'=>0)
				));
		if(empty($house_pictures)){
			return $this->redirect(array('action'=>'view',$id));
		}
		$this->set('house_pictures_view',$house_pictures);
	
	
		if (!$x) {
			throw new NotFoundException (__('Invalid proposal'));
		}
	
		if ($this->request->is(array('proposal','put'))) {
			$this->Proposal->id = $id;
			if ($this->Proposal->save($this->request->data)) {
				$this->Session->setFlash(__('Your proposal has been updated'), 'alert-box', array('class'=>'alert-success'));
				return $this->redirect(array('action'=>'view',$id));
			}
			$this->Session->setFlash(__('Unable to select the picture.'), 'alert-box', array('class'=>'alert-error'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
		
	}
	
	public function selected_default_picture($proposal_id = NULL, $default_house_picture_id = NULL) {
	
		/**
		 * This action changes Proposal.default_house_picture_id in the DB.
		 * It receives via GET the default_house_picture_id we want to set and the proposal_id we want to apply to, and it makes the corresponding changes in the DB.
		 *
		 */
	
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
	
		$x = $this->Proposal->findById($proposal_id);
	
		if (!$default_house_picture_id) {
			throw new NotFoundException(__('Invalid house picture'));
		}
	
		$x['Proposal']['default_house_picture_id']=$default_house_picture_id;
	
		if ($this->Proposal->save($x)) {
			$this->Session->setFlash(__('Your proposal has been updated'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action'=>'view',$proposal_id));
		}
		$this->Session->setFlash(__('Unable to update your proposal.'), 'alert-box', array('class'=>'alert-error'));
	}
        
	
    public function delete($id) {
    	/**
    	 * Deletes the proposal with id $id from the DB and deletes the pdf files related to it
    	 */
    	
    	$proposal=$this->Proposal->findById($id);
    	$count=sizeof($this->Proposal->find('list',array('conditions'=>array('land_id' => $proposal['Proposal']['land_id']))));
    	
        if ($this->Proposal->delete($id)) {
        	foreach ($proposal['MyBoughtExtra'] as $bextra){
        		$this->Proposal->MyBoughtExtra->delete_extra($bextra['id']);
        	}
        	if (!empty($proposal['Proposal']['summary'])){
        		unlink(WWW_ROOT.$proposal['Proposal']['summary']);
        	}
        	if (!empty($proposal['Proposal']['bank_receipt'])){
        		unlink(WWW_ROOT.$proposal['Proposal']['bank_receipt']);
        	}
        	if (!empty($proposal['Proposal']['contract'])){
        		unlink(WWW_ROOT.$proposal['Proposal']['contract']);
        	}
        	
        	if ($count==1){
        		$this->Proposal->MyLand->set_ownership($proposal['Proposal']['land_id'],0);
        	}
        	
        	$this->Session->setFlash(__('The proposal with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('controller'=>'Customers','action'=>'view',$proposal['MyCustomer']['id']));
        }
    }
    
    public function delete_custom_extra($bought_extra_id){
    	/**
    	 * This action it is used to delete a custom extra from a proposal.
    	 * Since custom extras are uniquely binded to a proposal, this action deletes the BoughtExtra from the DB and calls an action to also delete the related Extra.
    	 */
    	$x = $this->Proposal->MyBoughtExtra->findById($bought_extra_id);
    	if ($this->Proposal->MyBoughtExtra->MyExtra->delete($x['MyExtra']['id']) && $this->Proposal->MyBoughtExtra->delete($x['MyBoughtExtra']['id'])) {
    		$this->Session->setFlash(__('Deleted'), 'alert-box', array('class'=>'alert-success'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyBoughtExtra']['proposal_id']));
    	}
    }
    
    public function toggle_lock($prop_id = NULL) {
    	if (!$prop_id) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
    
    	$x = $this->Proposal->findById($prop_id);
    	if (!$x) {
    		throw new NotFoundException (__('Invalid proposal'));
    	}
    
    	$x['Proposal']['bool_locked']=!$x['Proposal']['bool_locked'];
    
    	$this->request->data=$x;
    
    	if ($this->Proposal->save($this->request->data)) {
    		$this->Session->setFlash(__('The proposal has been updated'), 'alert-box', array('class'=>'alert-success'));
    		return $this->redirect($this->referer());
    	}
    	$this->Session->setFlash(__('Unable to update the proposal.'), 'alert-box', array('class'=>'alert-error'));
    }
    
    
    
    
    
    
    
    
    
    
    
    public function gen_summary($id) {
    	/**
    	 * Generates a PDF with the summary of the proposal.
    	 */
    	
    	/**
    	 * Generates a PDF with a contract.
    	 */
    	if(!$id){
    		throw new NotFoundException(__('Invalid proposal'));
    	}
		


    	$x = $this->Proposal->findById($id);
    	$y = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>0)));
		$ybase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(-1,-2))));
		$yfloor = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(1,2,3,4))));
		$ysidenobase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(5))));
					
		$order = array("MyExtra.category_id" => "asc", "MyExtra.name" => "asc");
		
    	$z = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false , 'MyExtra.size_dependent_flag <'=>' 1'),
				'order'=>$order,
				'recursive'=>2));
		$zenlarge = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false, 'MyExtra.size_dependent_flag >'=>' 0')));
    	$zexternal = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>true)));
    	
    	if (!$x) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
		
		
    	
		$bool_basement=0;
		$bool_standalone=0;
		foreach($z as $index=>$abc){
			if($abc['MyExtra']['size_dependent_flag']>0){
				if($abc['MyBoughtExtra']['price']>0){
					$direction=1;
				}else{
					$direction=-1;
				}
			}elseif ($abc['MyExtra']['type']==2){
				$bool_basement=1;
			}elseif ($abc['MyExtra']['type']==3){
				$bool_standalone=1;
			}
		}
		$this->set('bool_basement',$bool_basement);
		$this->set('bool_standalone',$bool_standalone);
		
		
		
    	$this->set('proposal_view',$x);
    	
		$this->set('normal_house_pictures_view',$y);
		$this->set('basement_house_pictures_view',$ybase);
		$this->set('floorplan_house_pictures_view',$yfloor);
		$this->set('sideview_nobasement_house_pictures_view',$ysidenobase);
		
    	$this->set('bought_extras_view',$z);
		$this->set('bought_enlagement',$zenlarge);
    	$this->set('bought_external_extras_view',$zexternal);
    	
    	
    	$this->layout='pdf';
    	
    	$folder=__DIR__.'/../files/';
    	$filename = 'Summary'.$x['Proposal']['id'].'.pdf';
    	
    	
    	// initializing mPDF
    	$this->Mpdf->init();  // L - landscape, P - portrait

    	
		
  
    	$this->Mpdf->SetHTMLFooter('
    			<div style="width:100%" >
    			<div style="width:33%;float:left"><span ><img src="img/Logo.png" alt="IZ Haus" width="25"></span></div>
    			<div style="width:33%;float:left; text-align: center;">IZ Haus GmbH {DATE j-m-Y}</div>
    			<div style="width:33%;float:left; text-align: right; ">{PAGENO}/{nbpg}</div>
    			</div>
    			');
    	// setting filename of output pdf file
    	$this->Mpdf->setFilename($folder.$filename);
    
    	// setting output to I, D, F, S
    	$this->Mpdf->setOutput('F');
    
    	// you can call any mPDF method via component, for example:
    	$this->Mpdf->SetWatermarkText("Draft");
    	
    	
    	$x['Proposal']['summary'] = $filename;
    	$this->Proposal->save($x);
    }
    
    public function gen_contract($id) {
    	/**
    	 * Generates a PDF with a contract.
    	 */
    	if(!$id){
    		throw new NotFoundException(__('Invalid proposal'));
    	}
		


    	$x = $this->Proposal->findById($id);
    	$y = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>0)));
		$ybase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(-1,-2))));
		$yfloor = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(1,2,3,4))));
		$ysidenobase = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id' => $x['Proposal']['house_id'],'type_flag'=>array(5))));
					
		$order = array("MyExtra.category_id" => "asc", "MyExtra.name" => "asc");
		
    	$z = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false , 'MyExtra.size_dependent_flag <'=>' 1'),
				'order'=>$order,
				'recursive'=>2));
		$zenlarge = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false, 'MyExtra.size_dependent_flag >'=>' 0')));
    	$zexternal = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>true)));
    	
    	if (!$x) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
		
		
    	
		$bool_basement=0;
		$bool_standalone=0;
		foreach($z as $index=>$abc){
			if($abc['MyExtra']['size_dependent_flag']>0){
				if($abc['MyBoughtExtra']['price']>0){
					$direction=1;
				}else{
					$direction=-1;
				}
			}elseif ($abc['MyExtra']['type']==2){
				$bool_basement=1;
			}elseif ($abc['MyExtra']['type']==3){
				$bool_standalone=1;
			}
		}
		$this->set('bool_basement',$bool_basement);
		$this->set('bool_standalone',$bool_standalone);
		
		
		
    	$this->set('proposal_view',$x);
    	
		$this->set('normal_house_pictures_view',$y);
		$this->set('basement_house_pictures_view',$ybase);
		$this->set('floorplan_house_pictures_view',$yfloor);
		$this->set('sideview_nobasement_house_pictures_view',$ysidenobase);
		
    	$this->set('bought_extras_view',$z);
		$this->set('bought_enlagement',$zenlarge);
    	$this->set('bought_external_extras_view',$zexternal);
    	
    	
    	$this->layout='pdf';
    	
    	$folder=__DIR__.'/../files/';
    	$filename = 'Contract'.$x['Proposal']['id'].'.pdf';
    	
    	
    	// initializing mPDF
    	$this->Mpdf->init();  // L - landscape, P - portrait

    	
		
  
    	$this->Mpdf->SetHTMLFooter('
    			<div style="width:100%" >
    			<div style="width:33%;float:left"><span ><img src="img/Logo.png" alt="IZ Haus" width="25"></span></div>
    			<div style="width:33%;float:left; text-align: center;">IZ Haus GmbH {DATE j-m-Y}</div>
    			<div style="width:33%;float:left; text-align: right; ">{PAGENO}/{nbpg}</div>
    			</div>
    			');
    	// setting filename of output pdf file
    	$this->Mpdf->setFilename($folder.$filename);
    
    	// setting output to I, D, F, S
    	$this->Mpdf->setOutput('F');
    
    	// you can call any mPDF method via component, for example:
    	$this->Mpdf->SetWatermarkText("Draft");
    	
    	
    	$x['Proposal']['contract'] = $filename;
    	$this->Proposal->save($x);
    	
    	 
    }
    
    
    public function gen_bank_receipt($id) {
    	/**
    	 * It shows all relevant information related with a proposal
    	 */
    	if(!$id){
    		throw new NotFoundException(__('Invalid proposal'));
    	}
    	
    	$x = $this->Proposal->findById($id);
    	$y = $this->Proposal->MyHouse->MyHousePicture->find('all',array(
    			'conditions'=>array('house_id' => $x['Proposal']['house_id'])));
    	$z = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>false)));
    	$zexternal = $this->Proposal->MyBoughtExtra->find('all',array(
    			'conditions'=>array('proposal_id' => $x['Proposal']['id'], 'MyExtra.bool_external'=>true)));
    	
    	if (!$x) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
    	
    	$this->set('proposal_view',$x);
    	$this->set('house_pictures_view',$y);
    	$this->set('bought_extras_view',$z);
    	$this->set('bought_external_extras_view',$zexternal);
    	
    	
    	$this->layout='pdf';
    	
    	$folder=__DIR__.'/../files/';
    	$filename = 'BankReceipt'.$x['Proposal']['id'].'.pdf';
    	
    	
    	// initializing mPDF
    	$this->Mpdf->init();
    	
  
    	$this->Mpdf->SetHTMLFooter('
    			<div style="width:100%" >
    			<div style="width:33%;float:left"><span ><img src="img/Logo.png" alt="IZ Haus" width="25"></span></div>
    			<div style="width:33%;float:left; text-align: center;">IZ Haus GmbH {DATE j-m-Y}</div>
    			<div style="width:33%;float:left; text-align: right; ">{PAGENO}/{nbpg}</div>
    			</div>
    			');
    
    	// setting filename of output pdf file
    	$this->Mpdf->setFilename($folder.$filename);
    
    	// setting output to I, D, F, S
    	$this->Mpdf->setOutput('F');
    
    	// you can call any mPDF method via component, for example:
    	$this->Mpdf->SetWatermarkText("Draft");
    	
    	
    	$x['Proposal']['bank_receipt'] = $filename;
    	$this->Proposal->save($x);
    	
    	
    }
    
    public function download_file($type_flag,$proposal_id){
    	// type_flag: 1=Summary, 2=BankReceipt, 3=Contract
    	
    	$prop=$this->Proposal->findById($proposal_id);
    	$filename='';
    	if ($type_flag==1){
    		$filename=$prop['Proposal']['summary'];
    	}elseif ($type_flag==2){
    		$filename=$prop['Proposal']['bank_receipt'];
    	}elseif ($type_flag==3){
    		$filename=$prop['Proposal']['contract'];
    	}
		
		$folder=__DIR__.'/../files/';
    	$file = $folder.$filename;
    	
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Content-Transfer-Encoding: binary');
			header('Connection: Keep-Alive');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			
			ob_end_flush();   // <--- instead of ob_clean()
			
			set_time_limit(0);
			readfile($file);
			exit;
		}else{
			$this->Session->setFlash(__('The requested file is not available'.': '.$filename), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action'=>'view',$proposal_id));
		}
	}
}
