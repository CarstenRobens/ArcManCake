<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author elgatil
 */


class UsersController extends AppController{
    
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
		$this->Session->write('menue.active','Users');
        // Allow users to login and logout.
        $this->Auth->allow('logout', 'login');
		$company = Configure::read('company');
		$this->set("title_for_layout",'Benutzer; '.$company['keywords']);
    }
	
	public function isAuthorized($logged_user) {
    	if (in_array($this->action, array('index','view'))){
    		return TRUE;
    	}
    
    
    	return parent::isAuthorized($logged_user);
    }
    

    
    public function index() {
    	$logged_user = $this->Auth->user();
    	
    	$this->User->recursive = 0;
    	$this->Paginator->settings = $this->paginate;
    	$this->set('users_view',$this->Paginator->paginate());
    	
        
        if ($logged_user['role']<2){
        	if ($this->request->is('post')) {
        		$this->User->create();
        		if ($this->User->save($this->request->data)) {
        			$this->Session->setFlash(__('User has been created.'), 'alert-box', array('class'=>'alert-success'));
        			return $this->redirect(array('action' => 'index'));
        		}
        		$this->Session->setFlash(__('Unable to add user.'), 'alert-box', array('class'=>'alert-error'));
        	}
        } 
    }


    public function view($id=null) {

        $this->User->id=$id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user_view', $this->User->read(NULL,$id));

    }
    
    public function edit($id = NULL) {
        $this->User->id=$id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        
            
        if ($this->request->is('post') ||  $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('User info has been updated'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('action'=>'index'));
            }
            $this->Session->setFlash(__('Unable to update user.'), 'alert-box', array('class'=>'alert-error'));
        } else {
            $this->request->data=  $this->User->read(NULL,$id);
            unset($this->request->data['User']['password']);
        }
    }
    
        
    
    public function delete($id=NULL) {
        /* $this->request->onlyAllow('user'); */
                
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
            
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user with id: %s has been deleted',h($id)), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect(array('action'=>'index'));
        }
        
        $this->Session->setFlash(__('User was not deleted'), 'alert-box', array('class'=>'alert-error'));
        return $this->redirect(array('action'=>'index'));
    }
    
    
    
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Invalid username or password, try again'), 'alert-box', array('class'=>'alert-error'));
        }
    }
    
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }
}
