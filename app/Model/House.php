<?php

class House extends AppModel{
	
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $hasMany = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'house_id'
			),
			'MyHousePicture' => array(
					'className' => 'HousePictures',
					'foreignKey' => 'house_id'
			)
			
	);
	
	/** public $hasAndBelongsToMany = array(
			'Extra'=>array(
					'className'=>'Extra',
					'joinTable'=>'extras_houses',
					'foreignKey'=>'house_id',
					'associationForeignKey'=>'extra_id'
			)
	);**/
	
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty'
    		),
    		'description'=>array(
    				'rule'=>'notEmpty'
    		),
    		'type'=>array(
    			'rule'=>array('inList',array(0,1,2,3)),
            	'message'=> 'Please enter a valid role',
            	'allowEmpty'=>false
    		),
    		'size'=>array(
            	'rule'=>'decimal',
            	'message'=> 'Please enter a valid size',
            	'allowEmpty'=>false
			),
    		'floors'=>array(
            	'rule'=>'decimal',
            	'message'=> 'Please enter a valid number of floors',
            	'allowEmpty'=>false
			),
    		'price'=>array(
    			'rule'=>'decimal',
            	'message'=> 'Please enter a valid price',
            	'allowEmpty'=>false
    		)
    );
    
    public function extra_price($house_type,$extra){
    	$price=0;
    	if($house_type==1){
    		$price=$extra['default_priceA'];
    	}elseif($house_type==2 || empty($house_type)){
    		$price=$extra['default_priceB'];
    	}elseif($house_type==3){
    		$price=$extra['default_priceC'];
    	}
    	return $price;
    
    }
    
    

}
