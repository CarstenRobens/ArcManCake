<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author elgatil
 */

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{
    
	public $hasMany = array(
			'MyCustomer' => array(
					'className' => 'Customer',
					'foreignKey' => 'user_id'
			),
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'user_id'
			),
			'MyEvent' => array(
					'className' => 'FullCalendar.Event',
					'foreignKey' => 'user_id',
					'dependent' => false,
			)
	);

	
    public $validate=array(
		'username'=>array(
        	    'required'=>array(
            	    'rule'=>array('notEmpty'),
                	'message'=> 'A username is required'
                )
		),
        'password'=>array(
            'required'=>array(
                'rule'=>array('notEmpty'),
                'message'=> 'A password is required'
            )
		),
    	'role'=>array(
     		'valid'=>array(
        		#'rule'=>array('inList',array('admin','owner','employee','visitor')),
            	'rule'=>array('inList',array(0,1,2,3)),
            	'message'=> 'Please enter a valid role',
            	'allowEmpty'=>false
    		)
		),
        'name'=>array(
            'required'=>array(
                'rule'=>array('notEmpty'),
                'message'=> 'A name is required'
            )
		),
        'surname'=>array(
            'required'=>array(
                'rule'=>array('notEmpty'),
                'message'=> 'A surname is required'
            )
		),
        'phone'=>array(
            'required'=>array(
                'rule'=>'decimal',
                'message'=> 'A phone is required'
            )
        ),
        'email'=>'email'
    		
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
                );
        }
        return TRUE;
    }
    

    
}
