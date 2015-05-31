<?php
class HousesController extends AppController{
	public $helper = array('Html','Form','Number');

	public function beforeFilter() {
		parent::beforeFilter();
		// Allow visitors to view houses
	
		$this->Auth->allow('index','view');
		$this->Session->write('menue.active','Houses');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Hausausstellung; '.$company['keywords']);
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'), 'alert-box', array('class'=>'alert-danger'));
			return FALSE; # Overseers have the same privileges as visitors
		}elseif(in_array($this->action, array('edit','delete'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		$this->set('houses_view',$this->paginate());
		
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->House->create();
				$this->request->data['House']['user_id'] = $this->Auth->user('id');
				if ($this->House->save($this->request->data)) {
					$this->Session->setFlash(__('The house has been saved.'), 'alert-box', array('class'=>'alert-success'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add your house.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid customer'));
            }
	
            $x = $this->House->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid customer'));
            }
            $this->set('house_view',$x);
            
            $this->set('house_pictures_view',$x['MyHousePicture']);

	}

	
    public function edit($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invalid house'));
        }
            
        $x = $this->House->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid house'));
        }
            
        if ($this->request->is(array('house','put'))) {
        	$this->House->id = $id;
        	if ($this->House->save($this->request->data)) {
            	$this->Session->setFlash(__('The house has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update the house.'), 'alert-box', array('class'=>'alert-danger'));
 		}
        if (!$this->request->data) {
        	$this->request->data=$x;
        }
	}
	
	
	public function add_pdf($id = NULL) {
    	if (!$id) {
        	throw new NotFoundException(__('Invalid house'));
        }
            
        $x = $this->House->findById($id);
        if (!$x) {
        	throw new NotFoundException (__('Invalid house'));
        }
		$logged_user = $this->Auth->user();
			
		
        if ($logged_user['role']<3 && !empty($logged_user)){    
		
			if ($this->request->is(array('house','put'))) {
				$this->House->id = $id;
				$house=$this->House->findById($id);
				$this->request->data['House'] = array_merge($house['House'],$this->request->data['House']);
				debug($this->request->data);
				
					
					if(!empty($this->request->data['House']['upload']['name']))
					{
						$file = $this->request->data['House']['upload']; //put the data into a var for easy use
					
						$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
						$arr_ext = array('pdf'); //set allowed extensions
					
						//only process if the extension is valid
						if(in_array($ext, $arr_ext))
						{
							//do the actual uploading of the file. First arg is the tmp name, second arg is
							//where we are putting it
							move_uploaded_file($file['tmp_name'], WWW_ROOT . '../files/' . $file['name']);
					
							//prepare the filename for database entry
							
							$this->request->data['House']['spec_pdf'] = $file['name'];
							
							
						}else{
							$this->Session->setFlash(__('Nur Dateien mit der Endung .pdf sind erlaubt.'), 'alert-box', array('class'=>'alert-danger'));
						}
					} 
					if ($this->House->save($this->request->data)) {
						$this->Session->setFlash(__('PDF gespeichert.'), 'alert-box', array('class'=>'alert-success'));
						return $this->redirect(array('action' => 'index'));
					}
					
				$this->Session->setFlash(__('Unable to update the house.'), 'alert-box', array('class'=>'alert-danger'));
			}
			if (!$this->request->data) {
				$this->request->data=$x;
			}
		} 
	}
	
	public function delete_pdf($id) {
	
        $x=$this->House->findById($id);
		$house = $x['House'];
		$house['spec_pdf'] = '';
        unlink(WWW_ROOT.'../files/'.$x['House']['spec_pdf']);
		if ($this->House->save($house)) {
			$this->Session->setFlash(__('PDF gelöscht.'), 'alert-box', array('class'=>'alert-success'));
			return $this->redirect(array('action' => 'index'));
		}
		return $this->redirect(array('action' => 'index'));
    }
        
		
	public function download_file($house_id){
    	
    	$house=$this->House->findById($house_id);
    	$filename=$house['House']['spec_pdf'];
    	
		
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
			return $this->redirect(array('action'=>'view',$house_id));
		}
	}
	
    public function delete($id) {
    	
        $house=$this->House->findById($id);
        
        
        if ($this->House->delete($id)) {
        	foreach ($house['MyHousePicture'] as $x){
        		if ($this->House->MyHousePicture->delete($x['id'])){
        			unlink(WWW_ROOT.'img/uploads/houses/'.$x['picture']);
        		}
        	}
        	$this->Session->setFlash(__('House with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
