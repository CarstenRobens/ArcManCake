<?php
class ProposalsController extends AppController{
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
		$logged_user = $this->Auth->user();
		if ($logged_user['role']!=2){
			$this->set('proposals_view',$this->paginate());
		}else{
			$this->set('proposals_view',$this->paginate('Proposal',array('Proposal.user_id LIKE'=>$logged_user['id'])));
		}
	}
    #Proposal->find('all',Array('conditions'=>Array('user_id'=>$logged_user['id']))));

	public function view($id=null) {
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
	
	public function edit_house($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invaled proposal'));
		}
	
		$x = $this->Proposal->findById($id);
		$this->set('proposal_id_view',$id);
		$this->set('list_houses_view',$this->Proposal->MyHouse->find('list'));
		
	
		if (!$x) {
			throw new NotFoundException (__('Invalid proposal'));
		}
	
		if ($this->request->is(array('proposal','put'))) {
			$this->Proposal->id = $id;
			if ($this->Proposal->save($this->request->data)) {
				$this->Session->setFlash(__('Your proposal has been updated'));
				return $this->redirect(array('action'=>'select_default_picture',$id));
			}
			$this->Session->setFlash(__('Unable to update your proposal.'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
	
	public function select_default_picture($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invaled proposal'));
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
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Proposal->delete($id)) {
        	$this->Session->setFlash(__('The proposal with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
    
    public function delete_custom_extra($bought_extra_id){
    	$x = $this->Proposal->MyBoughtExtra->findById($bought_extra_id);
    	if ($this->Proposal->MyBoughtExtra->MyExtra->delete($x['MyExtra']['id']) && $this->Proposal->MyBoughtExtra->delete($x['MyBoughtExtra']['id'])) {
    		$this->Session->setFlash(__('Deleted'));
    		return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$x['MyBoughtExtra']['proposal_id']));
    	}
    }
    
    
    public function gen_summary($id) {
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
    
    /**public function gen_contract() {
    	require("/home/elgatil/Development/CakePHP/Blog/plugins/PHPWord_0.6.2_Beta/PHPWord.php");
    	 
    	
		$PHPWord = new PHPWord();

		$section = $PHPWord->createSection();

		$section->addText('Hello world!');


		$objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save('helloWorld.docx');
    
    }**/

    public function gen_bank_receipt() {
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
