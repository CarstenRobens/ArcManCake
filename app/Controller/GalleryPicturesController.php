<?php
class GalleryPicturesController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','HomePictures');
		$this->Auth->allow('index');
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
		$logged_user = $this->Auth->user();
		$this->set('gallery_pictures_view',$this->paginate());
		
		// add
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->GalleryPicture->create();
				//Check if image has been uploaded
				if(!empty($this->request->data['GalleryPicture']['upload']['name']))
				{
					$file = $this->request->data['GalleryPicture']['upload']; //put the data into a var for easy use
				
					$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
					$arr_ext = array('jpg', 'jpeg', 'gif','png'); //set allowed extensions
				
					//only process if the extension is valid
					if(in_array($ext, $arr_ext))
					{
						//do the actual uploading of the file. First arg is the tmp name, second arg is
						//where we are putting it
						move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/uploads/gallery/' . $file['name']);
				
						//prepare the filename for database entry
						
						$this->request->data['GalleryPicture']['picture'] = $file['name'];
						
						
					}else{
						$this->Session->setFlash(__('File not saved, you must use a picture.'), 'alert-box', array('class'=>'alert-error'));
					}
				}
				
				$this->request->data['GalleryPicture']['user_id'] = $this->Auth->user('id');
				
				if ($this->HomePicture->save($this->request->data)) {
					$this->Session->setFlash(__('Picture saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the picture.'), 'alert-box', array('class'=>'alert-error'));
			}
		}
	}
	

        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        $x=$this->GalleryPicture->findById($id);
        unlink(WWW_ROOT.'img/uploads/gallery/'.$x['GalleryPicture']['picture']);
        if ($this->GalleryPicture->delete($id)) {
        	$this->Session->setFlash(__('Picture with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
