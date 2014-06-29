<?php

class Land extends AppModel{
	
	public $belongsTo = array(
			'MyCostumer' => array(
					'className' => 'Costumer',
					'foreignKey' => 'costumer_id'
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
    		'price'=>array(
            	'rule'=>'notEmpty'
			)
    );
    
    public function isOwnedBy ($owned_land,$owner){
        return $this->field('id', array('id'=>$owned_land, 'user_id'=>$owner))!==FALSE;
    }
}
