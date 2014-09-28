<?php
/*
 * Controllers/EventTypesController.php
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
 
class EventTypesController extends FullCalendarAppController {

	var $name = 'EventTypes';

	var $paginate = array(
		'limit' => 15
	);
	

	function index() {
		$this->EventType->recursive = 0;
		$this->set('eventTypes', $this->paginate());
	}


	function add() {
		if (!empty($this->data)) {
			$this->EventType->create();
			if ($this->EventType->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved.'), 'alert-box', array('class'=>'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventType->save($this->data)) {
				$this->Session->setFlash(__('The category has been saved.'), 'alert-box', array('class'=>'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for category.'), 'alert-box', array('class'=>'alert-danger'));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventType->delete($id)) {
			$this->Session->setFlash(__('Category deleted.'), 'alert-box', array('class'=>'alert-success'));
			$this->redirect(array('action'=>'index'));
		}else{
			$this->Session->setFlash(__('The category was not deleted.'), 'alert-box', array('class'=>'alert-danger'));
			$this->redirect(array('action' => 'index'));
		}
	}
}
?>
