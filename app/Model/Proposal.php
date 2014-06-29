<?php

class Proposal extends AppModel{
	
	public $belongsTo = array(
			'MyCostumer' => array(
					'className' => 'Costumer',
					'foreignKey' => 'costumer_id'
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
	
	
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty'
    		),
    		'surname'=>array(
            	'rule'=>'notEmpty'
			),
    		'phone'=>array(
            	'rule'=>'notEmpty'
			)
    );
    
    public function isOwnedBy ($owned_proposal,$owner){
        return $this->field('id', array('id'=>$owned_proposal, 'user_id'=>$owner))!==FALSE;
    }
}
