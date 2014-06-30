<?php

class Customer extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $hasMany = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'customer_id'
			),
			'MyLand' => array(
					'className' => 'Land',
					'foreignKey' => 'customer_id'
			)
	);
	
	
	
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty',
                'message'=> 'A name is required'
    		),
    		'surname'=>array(
            	'rule'=>'notEmpty',
                'message'=> 'A surname is required'
			),
    		'phone'=>array(
            	'rule'=>'notEmpty',
                'message'=> 'A phone number is required'
			),
    		'address1'=>array(
            	'rule'=>'notEmpty',
                'message'=> 'Address is required'
			),
    		'zipcode'=>array(
            	'rule'=>'decimal',
                'message'=> 'Enter a valid zipcode'
			),
    		'phone'=>'phone',
    		'email'=>'email'
    		
    );
    
    public function isOwnedBy ($owned_customer,$owner){
        return $this->field('id', array('id'=>$owned_customer, 'user_id'=>$owner))!==FALSE;
    }
}
