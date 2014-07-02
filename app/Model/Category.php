<?php

class Category extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $hasMany = array(
			'MyExtra' => array(
					'className' => 'Extra',
					'foreignKey' => 'category_id'
			)
	);
	
	
    public $validate=array(
    		'name'=>array('rule'=>'notEmpty')
    );
    

}
