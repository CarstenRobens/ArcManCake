<?php

class HousePicture extends AppModel{
	
	public $belongsTo = array(
			'MyHouse' => array(
					'className' => 'House',
					'foreignKey' => 'house_id'
			),
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	
    public $validate=array(
    		'name'=>array('rule'=>'notEmpty')
    		#'picture'=>array('rule'=>'notEmpty')
    );
    

}
