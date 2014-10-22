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
            	'rule'=>'notEmpty',
				'message'=> 'Bitte geben Sie einen Namen für das Haus an.'
    		),
    		'description'=>array(
    				'rule'=>'notEmpty',
					'message'=> 'Bitte geben Sie eine Beschreibung für das Haus an.'
    		),
    		'type'=>array(
    			'rule'=>array('inList',array(1,2,3)),
            	'message'=> 'Bitte geben Sie einen Haustyp an.',
            	'allowEmpty'=>false
    		),
    		'size'=>array(
            	'rule'=>'decimal',
            	'message'=> 'Bitte geben Sie eine gültige Wohnfläche an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
            	'allowEmpty'=>false
			),
			'size_din'=>array(
            	'rule'=>'decimal',
            	'message'=> 'Bitte geben Sie eine gültige Hauptnutzfläche an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
            	'allowEmpty'=>false
			),
    		'floors'=>array(
            	'rule'=>'notEmpty',
            	'message'=> 'Bitte geben Sie die Anzahl der Etagen an.',
            	'allowEmpty'=>false
			),
    		'price'=>array(
    			'rule'=>'decimal',
            	'message'=> 'Bitte geben Sie eine gültigen Preis an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
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
