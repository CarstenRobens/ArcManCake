<?php

class Proposal extends AppModel{
	
	public $belongsTo = array(
			'MyCustomer' => array(
					'className' => 'Customer',
					'foreignKey' => 'customer_id'
			),
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			),
			'MyHouse' => array(
					'className' => 'House',
					'foreignKey' => 'house_id'
			),
			'MyLand' => array(
					'className' => 'Land',
					'foreignKey' => 'land_id'
			)
	);
	
	public $hasMany = array(
			'MyBoughtExtra' => array(
					'className' => 'BoughtExtra',
					'foreignKey' => 'proposal_id'
			)
	);
	
	
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty'
    		)
    );
    
    
    public function check_lock($prop_id){
    	$this->id=$prop_id;
    	return $this->field('bool_locked');
    }
}
