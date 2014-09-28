<?php

class Land extends AppModel{
	
	public $belongsTo = array(
			'MyCustomer' => array(
					'className' => 'Customer',
					'foreignKey' => 'customer_id'
			),
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $hasMany = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'land_id'
			)
	);
	
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty'
    		),
    		'land_size'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the size of the land in m2',
    			'allowEmpty'=>false
			),
    		'land_price_per_m2'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the price per m2',
    			'allowEmpty'=>false
			),
    		'dev_size'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the size of the dev in m2',
    			'allowEmpty'=>false
			),
    		'dev_cost_per_m2'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the cost of the dev per m2',
    			'allowEmpty'=>false
			),
    		'notary_cost'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the cost of the notary (in %)',
    			'allowEmpty'=>false
			),
    		'land_agent_cost'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the cost of the land agent',
    			'allowEmpty'=>false
			),
    		'land_tax'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter the tax over the land (in %)',
    			'allowEmpty'=>false
			)
    );
    
    public function set_ownership ($land_id,$customer_id){
    	if (!$land_id) {
    		return ;
    	}
    	$this->id = $land_id;
    	$this->saveField('customer_id', $customer_id);
    }
    
    public function isOwnedBy ($owned_land_id,$owner_id){
    	return $this->field('id', array('id'=>$owned_land_id, 'user_id'=>$owner_id))!==FALSE;
    }
}
