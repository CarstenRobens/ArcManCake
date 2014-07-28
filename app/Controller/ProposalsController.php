<?php
class ProposalsController extends AppController{
	public $components = array('RequestHandler');
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Proposals');
	}
	
	public function isAuthorized($logged_user) {
		
		if ($this->action==='index'){
			return TRUE;
		}
		if ($logged_user['role']==2){
			if ($this->action==='add'){
				return TRUE;
			}
			if(in_array($this->action, array('edit','delete','view'))){
				#if ($this->Proposal->isOwnedBy($proposalId,$logged_user['id'])){
					return TRUE;
				#}
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
		if ($logged_user['role']!=2){
			$this->set('proposals_view',$this->paginate());
		}else{
			$this->set('proposals_view',$this->paginate('Proposal',array('Proposal.user_id LIKE'=>$logged_user['id'])));
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
	}


	public function add($customer_id=NULL) {
		/**
		 * Creates an empty proposal for the customer with id $customer_id 
		 */
		if (!$customer_id) {
			throw new NotFoundException(__('Invaled customer'));
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
            	$this->Session->setFlash(__('Your proposal has been saved.'));
                return $this->redirect(array('controller'=>'Customer','action' => 'view',$customer_id));
            }
            $this->Session->setFlash(__('Unable to add the proposal.'));
     	}
	}
        
	
    public function edit($id = NULL) {
    	/**
    	 * Let the user modify all fields of the proposal (Admin only)
    	 */
    	if (!$id) {
        	throw new NotFoundException(__('Invaled proposal'));
        }
            
        $x = $this->Proposal->findById($id);
        $this->set('proposal_view',$x);
        $this->set('list_lands_view',$this->Proposal->MyLand->find('list',array(
        		'conditions'=>array('MyLand.customer_id' => array(0 ,$x['MyCustomer']['id']))
        )));
        $this->set('list_houses_view',$this->Proposal->MyHouse->find('list'));
        $this->set('list_extras_view',$this->Proposal->MyBoughtExtra->MyExtra->find('list'));
        if (!$x) {
        	throw new NotFoundException (__('Invalid proposal'));
        }
            
        if ($this->request->is(array('proposal','put'))) {
        	$this->Proposal->id = $id;
        	if ($this->Proposal->save($this->request->data)) {
            	$this->Session->setFlash(__('Your proposal has been updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your proposal.'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
	
	public function edit_land($id = NULL) {
		/**
		 * DEPRECATED!
		 */
		if (!$id) {
			throw new NotFoundException(__('Invaled proposal'));
		}
	
		$x = $this->Proposal->findById($id);
		$this->set('proposal_id_view',$id);
		$this->set('list_lands_view',$this->Proposal->MyLand->find('list',array(
				'conditions'=>array('MyLand.customer_id' => array(0 ,$x['MyCustomer']['id']))
		)));
		
		if (!$x) {
			throw new NotFoundException (__('Invalid proposal'));
		}
	
		if ($this->request->is(array('proposal','put'))) {
			$this->Proposal->id = $id;
			if ($this->Proposal->save($this->request->data)) {
				$this->Session->setFlash(__('Your proposal has been updated'));
				return $this->redirect(array('action'=>'view',$id));
			}
			$this->Session->setFlash(__('Unable to update your proposal.'));
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
		
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		$x = $this->Proposal->findById($proposal_id);
	
		if (!$land_id) {
			throw new NotFoundException(__('Invalid land'));
		}
		$x['Proposal']['land_id']=$land_id;
	
		if ($this->Proposal->save($x)) {
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
	
	public function selected_house($proposal_id = NULL, $house_id = NULL) {
		
		/**
		 * This action changes Proposal.house_id in the DB.
		 * It receives via GET the house_id we want to set and the proposal_id we want to apply to, and it makes the corresponding changes in the DB.
		 *
		 */
		
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
		
		$x = $this->Proposal->findById($proposal_id);
		
		if (!$house_id) {
			throw new NotFoundException(__('Invalid house'));
		}
		
		$x['Proposal']['house_id']=$house_id;
		
		if ($this->Proposal->save($x)) {
			$this->Session->setFlash(__('Your proposal has been updated'));
			return $this->redirect(array('action'=>'select_default_picture',$proposal_id));
		}
		$this->Session->setFlash(__('Unable to update your proposal.'));
	}
	
	
	public function select_default_picture($id = NULL) {
		/**
		 * This action let the user select the default picture he wants for the proposal with id $id, using a user-friendly interface.
		 */
		
		if (!$id) {
			throw new NotFoundException(__('Invalid proposal'));
		}
	
		$x = $this->Proposal->findById($id);
		$this->set('proposal_id_view',$id);
		$this->set('house_pictures_view',$this->Proposal->MyHouse->MyHousePicture->find('all',array(
				'conditions'=>array('house_id'=>$x['MyHouse']['id'])
		)));
	
	
		if (!$x) {
			throw new NotFoundException (__('Invalid proposal'));
		}
	
		if ($this->request->is(array('proposal','put'))) {
			$this->Proposal->id = $id;
			if ($this->Proposal->save($this->request->data)) {
				$this->Session->setFlash(__('Your proposal has been updated'));
				return $this->redirect(array('action'=>'view',$id));
			}
			$this->Session->setFlash(__('Unable to select the picture.'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
        
	
    public function delete($id) {
    	/**
    	 * Deletes the proposal with id $id from the DB
    	 */
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Proposal->delete($id)) {
        	$this->Session->setFlash(__('The proposal with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
    
    public function delete_custom_extra($bought_extra_id){
    	/**
    	 * This action it is used to delete a custom extra from a proposal.
    	 * Since custom extras are uniquely binded to a proposal, this action deletes the BoughtExtra from the DB and calls an action to also delete the related Extra.
    	 */
    	$x = $this->Proposal->MyBoughtExtra->findById($bought_extra_id);
    	if ($this->Proposal->MyBoughtExtra->MyExtra->delete($x['MyExtra']['id']) && $this->Proposal->MyBoughtExtra->delete($x['MyBoughtExtra']['id'])) {
    		$this->Session->setFlash(__('Deleted'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyBoughtExtra']['proposal_id']));
    	}
    }
    
    
    public function gen_summary($id) {
    	/**
    	 * Generates a PDF with the summary of the proposal.
    	 */
    	require("/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/myPDF.php");
    	
    	$pdf = new myPDF();
    	
    	$pdf->title='Summary';
    	$pdf->AddPage();
    	$pdf->SetFont('helvetica','B',16);
    	$pdf->Cell(0,10,'Summary','B',1,'C');
    	$pdf->Cell(1,10,'Ssrfgjk',0,1);
    	$pdf->SetFont('helvetica','',16);
    	$pdf->Cell(1,10,'dgdbfd',0,1);
    	$pdf->Cell(1,10,'aaaaaaaaa',0,1);
    	$pdf->AddPage();
    	$pdf->Cell(1,10,'anuuuuuuuuuu',0,1);
    	$pdf->Output('/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/Summary','F');
    	
    	$this->Session->setFlash(__('Summary generated'));
    	return $this->redirect(array('action'=>'index'));
    	
    }
    
    public function gen_contract() {
    	/**
    	 * Generates a PDF with a contract.
    	 */
    	require("/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/myPDF.php");
    	
    	$pdf = new myPDF();
    	 
    	$pdf->title='Contract';
    	$pdf->AddPage();
    	$pdf->SetFont('helvetica','B',16);
    	$pdf->Cell(0,10,'Contract',1,0,'C');
    	$pdf->Cell(1,30,'Ssrfgjk',0,1,'L');
    	$pdf->Output('/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/Contract','F');
    	
    	$this->Session->setFlash(__('Contract generated'));
    	return $this->redirect(array('action'=>'index'));
    	 
    }
    
    public function gen_bank_receipt() {
    	/**
    	 * Generates a PDF with a bank receipt for this proposal.
    	 */
    	require("/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/myPDF.php");
    	
    	$pdf = new myPDF();
    	 
    	$pdf->title='Bank Receipt';
    	$pdf->AddPage();
    	$pdf->SetFont('helvetica','B',16);
    	$pdf->Cell(0,10,'Summary',1,0,'C');
    	$pdf->Cell(1,30,'Ssrfgjk',0,1,'L');
    	$pdf->Output('/home/elgatil/Development/CakePHP/Blog/plugins/fpdf17/Bank_Receipt','F');
    	$this->Session->setFlash(__('Bank Receipt generated'));
    	return $this->redirect(array('action'=>'index'));
    	 
    }
  	
}
