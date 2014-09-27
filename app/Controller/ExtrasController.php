<?php
class ExtrasController extends AppController{
	public $helper = array('Html','Form','Number');

	public $components = array('RequestHandler','Paginator');
	
	public $paginate = array(
			'limit' => 25,
			'order' => array('Extra.category_id' => 'asc', 'Extra.name' => 'asc')
	);
	
	
	public function beforeFilter() {
		parent::beforeFilter();
		// Allow visitors to view extras
		$this->Session->write('menue.active','Extras');
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']==2 && in_array($this->action, array('index','view'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		
		
		
		$this->Paginator->settings = $this->paginate;
		
		$this->set('extras_view',$this->Paginator->paginate());
		
		
		if ($logged_user['role']<3){
			
			$this->set('list_categories_view',$this->Extra->MyCategory->find('list'));
			
			$houses_list_view=$this->Extra->MyBoughtExtra->MyProposal->MyHouse->find('list');
			$houses_list_view[0]=__('None');
			$this->set('houses_list_view',$houses_list_view);
			
			$list_extras=$this->Extra->find('list',array('conditions'=>array('bool_external'=>false,'bool_custom'=>false),'order'=>'name'));
			$list_extras[0]=__('None');
			$this->set('list_extras_view',$list_extras);
			
			
			if ($this->request->is('post')) {
				$this->Extra->create();
				
				$this->Extra->save($this->request->data); //To the an ID
				$this->request->data['Extra']['id']=$this->Extra->getLastInsertID();
				//Check if image has been uploaded
				if(!empty($this->request->data['Extra']['upload']['name'])){
					
					$file = $this->request->data['Extra']['upload']; //put the data into a var for easy use
				
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
					
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						$new_filename='Extra_'.$this->request->data['Extra']['id'];
						//do the actual uploading of the file. First arg is the tmp name, second arg is
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/extras/' .$new_filename);
				
						//prepare the filename for database entry
						
						$this->request->data['Extra']['picture'] = $new_filename;
						
					}else{
						$this->Session->setFlash(__('File not saved, you must use a picture.'), 'alert-box', array('class'=>'alert-error'));
					}
				}
				$this->request->data['Extra']['bool_custom'] = 0;
				$this->request->data['Extra']['user_id'] = $this->Auth->user('id');
				$this->request->data['Extra']['size_dependent_flag'] = -1*$this->request->data['Extra']['size_dependent_check'];
				if ($this->Extra->save($this->request->data)) {
					$this->Session->setFlash(__('The extra has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('Unable to add your extra.'), 'alert-box', array('class'=>'alert-error'));
				}
			}
		}
	}

	
	public function add_custom_extra($proposal_id=NULL,$bool_external) {
	
		if (!$proposal_id) {
			throw new NotFoundException(__('Invalid Proposal'));
		}
		
		if ($this->Extra->MyBoughtExtra->MyProposal->check_lock($proposal_id)){
			$this->Session->setFlash(__('The proposal is locked.'), 'alert-box', array('class'=>'alert-error'));
			return $this->redirect(array('controller'=>'Proposals','action'=>'view',$proposal_id));
		}
		
		$this->set('list_categories_view',$this->Extra->MyCategory->find('list'));
		$this->set('proposal_id_view',$proposal_id);
		
		$list_extras=$this->Extra->find('list',array('conditions'=>array('bool_external'=>false,'bool_custom'=>false),'order'=>'name'));
		$list_extras[0]=__('None');
		$this->set('list_extras_view',$list_extras);
		
		if ($this->request->is('post')) {
			$this->Extra->create();
			//No Picture for custom Extras
			$this->request->data['Extra']['default_priceA'] = $this->request->data['Extra']['default_price'];
			$this->request->data['Extra']['default_priceB'] = $this->request->data['Extra']['default_price'];
			$this->request->data['Extra']['default_priceC'] = $this->request->data['Extra']['default_price'];
			$this->request->data['Extra']['bool_custom'] = 1;
			$this->request->data['Extra']['bool_external'] = $bool_external;
			$this->request->data['Extra']['user_id'] = $this->Auth->user('id');
			$this->request->data['Extra']['size_dependent_flag'] = -1*$this->request->data['Extra']['size_dependent_check'];
			if ($this->Extra->save($this->request->data)) {
				$this->Session->setFlash(__('Custom extra added.'));
				if ($this->Extra->MyBoughtExtra->add_default_extra($proposal_id,$this->Extra->getLastInsertId())) {
					$this->Session->setFlash(__('Extra added to proposal.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
				}else {
					$this->Session->setFlash(__('Unable to add extra to your proposal.'), 'alert-box', array('class'=>'alert-error'));
					return $this->redirect(array('controller'=>'Proposals', 'action'=>'view',$proposal_id));
				}
				
			}else{
				$this->Session->setFlash(__('Unable to add your extra.'), 'alert-box', array('class'=>'alert-error'));
			}
		}
	}
	
	
    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invalid extra'));
        }
            
        $x = $this->Extra->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid extra'));
        }
            
        $this->set('list_categories_view',$this->Extra->MyCategory->find('list'));
        
        $houses_list_view=$this->Extra->MyBoughtExtra->MyProposal->MyHouse->find('list');
		$houses_list_view[0]=__('None');
		$this->set('houses_list_view',$houses_list_view);
       
        $list_extras=$this->Extra->find('list',array('conditions'=>array('bool_external'=>false,'bool_custom'=>false),'order'=>'name'));
        $list_extras[0]=__('None');
        $this->set('list_extras_view',$list_extras);
        
        
        if ($this->request->is(array('extra','put'))) {
        	$this->Extra->id = $id;
        	
        	if(!empty($this->request->data['Extra']['upload']['name'])){
        			
        		if(!empty($x['Extra']['picture'])){
        			unlink(WWW_ROOT.'img/uploads/extras/'.$x['Extra']['picture']);
        		}
        		
        		$file = $this->request->data['Extra']['upload']; //put the data into a var for easy use
        	
        		$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
        		$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
        			
        		//only process if the extension is valid
        		if(in_array($ext, $arr_ext))
        		{
        			$new_filename='Extra_'.$id;
        			//do the actual uploading of the file. First arg is the tmp name, second arg is
        			//where we are putting it
        			move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/extras/' . $new_filename);
        	
        			//prepare the filename for database entry
        	
        			$this->request->data['Extra']['picture'] = $new_filename;
        	
        		}else{
        			$this->Session->setFlash(__('File not saved, you must use a picture.'), 'alert-box', array('class'=>'alert-error'));
        		}
        	}
        	
			$this->request->data['Extra']['size_dependent_flag'] = -1*$this->request->data['Extra']['size_dependent_check'];
			
			
        	
        	
        	
        	if ($this->Extra->save($this->request->data)) {
            	$this->Session->setFlash(__('The extra has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update the extra.'), 'alert-box', array('class'=>'alert-error'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        	$this->request->data['Extra']['size_dependent_check'] = -1*$this->request->data['Extra']['size_dependent_flag'];
        }
	}
	
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        $x = $this->Extra->findById($id);
        if(!empty($x['Extra']['picture'])){
        	unlink(WWW_ROOT.'img/uploads/extras/'.$x['Extra']['picture']);
        }
        if ($this->Extra->delete($id)) {
        	$this->Session->setFlash(__('Extra with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
    
    public function add_enlarge_extra(){
    	/**
    	 * This action is part of an API to create the custom extra enlarge_house in the DB using ajax.
    	 * It receive via POST all the relevant information.
    	 * It creates a JSON view with a success message.
    	 *
    	 */
    
    	$proposal_id=$this->request->data['proposal_id'];
    	
    	if ($this->Extra->MyBoughtExtra->MyProposal->check_lock($proposal_id)){
    		$this->Session->setFlash(__('The proposal is locked.'), 'alert-box', array('class'=>'alert-error'));
    		return $this->redirect(array('controller'=>'Proposals','action'=>'view',$proposal_id));
    	}
    
    	if (!$proposal_id) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
    	
    	
    	$x['Extra']['name']=__('Enlarge house');
    	$x['Extra']['description']=__('Enlargement of the house by ').$this->request->data['enlargement'].__(' m<sup>2</sup> per floor.');
    	$price=Configure::read('price_enlargement');
    	$x['Extra']['default_priceA']=$price;
    	$x['Extra']['default_priceB']=$price;
    	$x['Extra']['default_priceC']=$price;
    	$x['Extra']['units']=2;
    	$x['Extra']['size_dependent_flag']=$this->request->data['enlargement'];
    	$x['Extra']['bool_custom']=1;
    	$x['Extra']['type']=0;
    	$x['Extra']['bool_external']=0;
    	$x['Extra']['category_id']=1;
    	$x['Extra']['user_id']=$this->Auth->user('id');
    
    	if ($this->Extra->save($x)) {
    		$this->Extra->MyBoughtExtra->add_default_extra($proposal_id,$this->Extra->getLastInsertId());
    		$this->set('confirmation',__('Enlargement added'));
    		$this->set('_serialize',array('confirmation'));
    	}else{
    		$this->set('confirmation',__('Unable to update your proposal.'));
    		$this->set('_serialize',array('confirmation'));
    	}
    }
  	
    public function add_shrink_extra(){
    	/**
    	 * This action is part of an API to create the custom extra shrink_house in the DB using ajax.
    	 * It receive via POST all the relevant information.
    	 * It creates a JSON view with a success message.
    	 *
    	 */
    
    	$proposal_id=$this->request->data['proposal_id'];
    	if ($this->Extra->MyBoughtExtra->MyProposal->check_lock($proposal_id)){
    		$this->Session->setFlash(__('The proposal is locked.'), 'alert-box', array('class'=>'alert-error'));
    		return $this->redirect(array('controller'=>'Proposals','action'=>'view',$proposal_id));
    	}
    
    	if (!$proposal_id) {
    		throw new NotFoundException(__('Invalid proposal'));
    	}
    	 
    	 
    	$x['Extra']['name']=__('Shrink house');
    	$x['Extra']['description']=__('Shrinking of the house by ').$this->request->data['shrinking'].__(' m<sup>2</sup> per floor.');
    	$price=Configure::read('price_shrinking');
    	$x['Extra']['default_priceA']=$price;
    	$x['Extra']['default_priceB']=$price;
    	$x['Extra']['default_priceC']=$price;
    	$x['Extra']['units']=2;
    	$x['Extra']['size_dependent_flag']=$this->request->data['shrinking'];
    	$x['Extra']['bool_custom']=1;
    	$x['Extra']['type']=0;
    	$x['Extra']['bool_external']=0;
    	$x['Extra']['category_id']=1;
    	$x['Extra']['user_id']=$this->Auth->user('id');
    
    	if ($this->Extra->save($x)) {
    		$this->Extra->MyBoughtExtra->add_default_extra($proposal_id,$this->Extra->getLastInsertId());
    		$this->set('confirmation',__('Shrinking added'));
    		$this->set('_serialize',array('confirmation'));
    	}else{
    		$this->set('confirmation',__('Unable to update your proposal.'));
    		$this->set('_serialize',array('confirmation'));
    	}
    }
    
}
