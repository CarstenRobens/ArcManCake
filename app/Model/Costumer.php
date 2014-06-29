<?php

class Costumer extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $hasMany = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'costumer_id'
			),
			'MyLand' => array(
					'className' => 'Land',
					'foreignKey' => 'costumer_id'
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
    
    public function isOwnedBy ($owned_costumer,$owner){
        return $this->field('id', array('id'=>$owned_costumer, 'user_id'=>$owner))!==FALSE;
    }
}
