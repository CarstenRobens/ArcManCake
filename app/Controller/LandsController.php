<?php
class LandsController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Lands');
	}
	
	public function isAuthorized($logged_user) {
		
		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'));
			return FALSE; # Overseers are not allowed to interact with customer data
		} else{
			return TRUE;
		}
		
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		$this->set('lands_view',$this->paginate());
	

		if ($logged_user['role']<3){
			if ($this->request->is('post')) {
				$this->Land->create();
				$this->request->data['Land']['user_id'] = $this->Auth->user('id');
				$this->request->data['Land']['customer_id'] = $this->request->data['Land']['customer'];
				if ($this->Land->save($this->request->data)) {
					$this->Session->setFlash(__('The land has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the land.'));
			}
		}
	}

	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid land'));
            }
	
            $x = $this->Land->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid land'));
            }
            $this->set('land_view',$x);

	}


	public function add_land_for_customer($customer_id) {
		if (!$customer_id) {
			throw new NotFoundException(__('Invalid land'));
		}
		
		$this->set('customer_view',$this->Land->MyCustomer->findById($customer_id));
        if ($this->request->is('post')) {
        	$this->Land->create();
            $this->request->data['Land']['user_id'] = $this->Auth->user('id');
            $this->request->data['Land']['customer_id']=$customer_id;
            if ($this->Land->save($this->request->data)) {
            	$this->Session->setFlash(__('Your land has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your customer.'));
     	}
	}
        
	
    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invaled land'));
        }
            
        $x = $this->Land->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid land'));
        }
            
        if ($this->request->is(array('land','put'))) {
        	$this->Land->id = $id;
        	if ($this->Land->save($this->request->data)) {
            	$this->Session->setFlash(__('Your land has been updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update your land.'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Land->delete($id)) {
        	$this->Session->setFlash(__('The land with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
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
