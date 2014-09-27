<?php
class HomePicturesController extends AppController{
	public $helper = array('Html','Form');

	public $components = array('Paginator');
	
	public $paginate = array(
			'limit' => 25,
			'order' => array(
					'Users.username' => 'asc'
			)
	);
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','HomePictures');
		$this->Auth->allow('home','contact');
		
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'), 'alert-box', array('class'=>'alert-error'));
			return FALSE; # Overseers have the same privileges as visitors
		}elseif(in_array($this->action, array('index','view','edit','delete'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$company = Configure::read('company');
		$this->set("title_for_layout",$company['name']);
		$logged_user = $this->Auth->user();
		$this->Paginator->settings = $this->paginate;
		$this->set('home_pictures_view',$this->Paginator->paginate());
		
		// add
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->HomePicture->create();
				//Check if image has been uploaded
				if(!empty($this->request->data['HomePicture']['upload']['name']))
				{
					$file = $this->request->data['HomePicture']['upload']; //put the data into a var for easy use
				
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
				
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/home/' . $file['name']);
				
						//prepare the filename for database entry
						
						$this->request->data['HomePicture']['picture'] = $file['name'];
						
						
					}else{
						$this->Session->setFlash(__('File not saved, you must use a picture.'), 'alert-box', array('class'=>'alert-error'));
					}
				}
				
				$this->request->data['HomePicture']['user_id'] = $this->Auth->user('id');
				
				if ($this->HomePicture->save($this->request->data)) {
					$this->Session->setFlash(__('Picture saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the picture.'), 'alert-box', array('class'=>'alert-error'));
			}
		}
	}
	
	public function home() {
		$this->set('home_pictures_view',$this->HomePicture->find('all'));
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid picture'));
            }
	
            $x = $this->HomePicture->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid picture'));
            }
            $this->set('home_picture_view',$x);

	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        $x=$this->HomePicture->findById($id);
        unlink(WWW_ROOT.'img/uploads/home/'.$x['HomePicture']['picture']);
        if ($this->HomePicture->delete($id)) {
        	$this->Session->setFlash(__('Picture with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
    
   
    public function contact() {
    	$this->Session->write('menue.active','Contact');
    }
	
	public function impressum() {
    	$this->Session->write('menue.active','Impressum');
    }
  	
}
