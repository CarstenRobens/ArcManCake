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
    				'message'=> 'Bitte geben Sie einen Vornamen an.'
    		),
    		'surname'=>array(
    				'rule'=>'notEmpty',
    				'message'=> 'Bitte geben Sie einen Nachnamen an.'
    		),
    		'phone_private'=>array(
    				'rule'=>'notEmpty',
    				'message'=> 'Bitte geben Sie eine Telefonnummer an'
    		),
    		'address1'=>array(
    				'rule'=>'notEmpty',
    				'message'=> 'Bitte geben Sie eine Adresse an.'
    		),
    		'zipcode'=>array(
    				'rule'=>'decimal',
    				'message'=> 'Bitte geben Sie eine gültige Postleitzahl an.'
    		),'city'=>array(
    				'rule'=>'notEmpty',
    				'message'=> 'Bitte geben Sie eine Stadt an.'
    		),
    		'email'=>array(
    				'rule'=>'email',
    				'message'=> 'Bitte geben Sie eine gültige eMail Adresse an.'
    		)
    
    );
    
    public function isOwnedBy ($owned_customer,$owner){
        return $this->field('id', array('id'=>$owned_customer, 'user_id'=>$owner))!==FALSE;
    }
}
