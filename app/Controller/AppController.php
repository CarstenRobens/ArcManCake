<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $helpers = array(
		'Form' => array('className' => 'Bs3Form')
	);
	
    public $components=array(
        'Session',
        'Auth'=>array(
            'loginRedirect'=>array('plugin'=>NULL,'controller'=>'Houses','action'=>'index'),
            'logoutRedirect'=>array('plugin'=>NULL,'controller'=>'Houses','action'=>'index'),
            'authorize'=>array('Controller')
        ),
    );
    
    public function beforeFilter() {
		$this->set('current_user',$this->Auth->user());
		Configure::load('ArcManCake_config');
		$this->set('level',Configure::read('Level') );
		$this->set('house_pic_type',Configure::read('HousePictureType'));
		$this->set('house_type',Configure::read('HouseType'));
		$this->set('house_side',Configure::read('HouseSide'));
		$this->set('extra_type',Configure::read('ExtraType'));
		$this->set('extra_unit',Configure::read('ExtraUnit'));
		$this->set('doc_type',Configure::read('DocType'));
		$this->set('eMail',Configure::read('eMail'));
		$this->set('info',Configure::read('Info'));
		$this->set('company',Configure::read('company'));
		
    }
    
    public function isAuthorized($logged_user) {
        if (isset($logged_user['role']) && $logged_user['role']<2) {
            return TRUE;
        }
        
        
        
        $this->Session->setFlash(__('Acces denied'), 'alert-box', array('class'=>'alert-error'));
        return FALSE;
    }
}

    
