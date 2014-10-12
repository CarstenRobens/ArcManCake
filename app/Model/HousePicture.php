<?php

class HousePicture extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			),
			'MyHouse' => array(
					'className' => 'House',
					'foreignKey' => 'house_id'
			)
	);
	
	
    public $validate=array(
    		'name'=>array('rule'=>'notEmpty'),
    		'upload'=>array(
            	'rule'=>'uploadError',
    			'message'=> 'Etwas hat nicht funktioniert. Bitte versuchen Sie es erneut.',
    			'allowEmpty'=>false
			),
    		'house_id'=>array(
    			'rule'=>'notEmpty',
            	'message'=> 'Bitte geben Sie eine ein gültiges Haus an.'
    		),
    		'type_flag'=>array('rule'=>'notEmpty')
    );
    

}
