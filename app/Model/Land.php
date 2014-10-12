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
				'message'=> 'Bitte geben Sie die Grundstücksgröße (in Quadratmetern) an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'allowEmpty'=>false
			),
    		'land_price_per_m2'=>array(
            	'rule'=>'decimal',
				'message'=> 'Bitte geben Sie die Preis pro Quadratmeter an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'message'=> 'Please enter the price per m2',
    			'allowEmpty'=>false
			),
    		'dev_size'=>array(
            	'rule'=>'decimal',
				'message'=> 'Bitte geben Sie die Erschließungsgröße (in Quadratmetern) an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'allowEmpty'=>false
			),
    		'dev_cost_per_m2'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie die den Preis für die Erschließung pro Quadratmeter an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
    			'allowEmpty'=>false
			),
    		'notary_cost'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie die Notarkosten an (in Prozent).',
    			'allowEmpty'=>false
			),
    		'land_agent_cost'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie die Marklergebühren an (in Prozent).',
    			'allowEmpty'=>false
			),
    		'land_tax'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Bitte geben Sie die Bauzinsen an (in Prozent).',
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
