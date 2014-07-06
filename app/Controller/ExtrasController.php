<?php
class ExtrasController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow visitors to view extras
		$this->Session->write('menue.active','Extras');
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'));
			return FALSE; # Overseers have the same privileges as visitors
		} else {
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		
		$this->set('extras_view',$this->paginate());
		
		
		if ($logged_user['role']<3){
			
			$this->set('list_categories_view',$this->Extra->MyCategory->find('list'));
			
			if ($this->request->is('post')) {
				$this->Extra->create();
				//Check if image has been uploaded
				if(!empty($this->request->data['Extra']['upload']['name']))
				{
					$file = $this->request->data['Extra']['upload']; //put the data into a var for easy use
				
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
					
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/extras/' . $file['name']);
				
						//prepare the filename for database entry
						
						$this->request->data['Extra']['picture'] = $file['name'];
						
					}else{
						$this->Session->setFlash(__('File not saved, you must use a picture.'));
					}
				}
				
				$this->request->data['Extra']['user_id'] = $this->Auth->user('id');
				debug($this->request->data);
				if ($this->Extra->save($this->request->data)) {
					$this->Session->setFlash(__('The extra has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}else{
					$this->Session->setFlash(__('Unable to add your extra.'));
				}
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid customer'));
            }
	
            $x = $this->Extra->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid customer'));
            }
            $this->set('extra_view',$x);

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
        
        if ($this->request->is(array('extra','put'))) {
        	$this->Extra->id = $id;
        	if ($this->Extra->save($this->request->data)) {
            	$this->Session->setFlash(__('The extra has been updated'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update the extra.'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Extra->delete($id)) {
        	$this->Session->setFlash(__('Extra with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
