<?php
class CategoriesController extends AppController{
	public $helper = array('Html','Form');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Session->write('menue.active','Categories');
	}
	
	public function isAuthorized($logged_user) {

		if ($logged_user['role']>2) {
			$this->Session->setFlash(__('Acces denied: Low cleareance access'));
			return FALSE; # Overseers have the same privileges as visitors
		}elseif(in_array($this->action, array('index','edit','delete'))){
			return TRUE;
		}
		
		return parent::isAuthorized($logged_user);
	}
	
	
	public function index() {
		$logged_user = $this->Auth->user();
		$this->set('categories_view',$this->paginate());
		
		// add
		if ($logged_user['role']<3 && !empty($logged_user)){
			if ($this->request->is('post')) {
				$this->Category->create();
				$this->request->data['Category']['user_id'] = $this->Auth->user('id');
				if ($this->Category->save($this->request->data)) {
					$this->Session->setFlash(__('New category has been saved.'));
					return $this->redirect(array('action' => 'index'));
				}
				$this->Session->setFlash(__('Unable to add the category.'));
			}
		}
	}


	public function view($id=null) {
            if(!$id){
                throw new NotFoundException(__('Invalid category'));
            }
	
            $x = $this->Category->findById($id);
            if (!$x) {
                throw new NotFoundException(__('Invalid category'));
            }
            $this->set('category_view',$x);

	}

	public function edit($id = NULL) {
		if (!$id) {
			throw new NotFoundException(__('Invalid category'));
		}
	
		$x = $this->Category->findById($id);
		if (!$x) {
			throw new NotFoundException (__('Invalid category'));
		}
	
		if ($this->request->is(array('category','put'))) {
			$this->Category->id = $id;
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Category has been updated'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update category.'));
		}
		if (!$this->request->data) {
			$this->request->data=$x;
		}
	}
        
	
    public function delete($id) {
    	if ($this->request->is('get')) {
        	throw new MethodNotAllowedException();
        }
        if ($this->Category->delete($id)) {
        	$this->Session->setFlash(__('Categoy with id: %s has been deleted',h($id)));
            return $this->redirect(array('action'=>'index'));
        }
    }
   
  	
}
