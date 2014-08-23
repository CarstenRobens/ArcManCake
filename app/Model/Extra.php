<?php

class Extra extends AppModel{
	
	public $belongsTo = array(
		'MyHouse' => array(
				'className' => 'House',
				'foreignKey' => 'depends_on_house'
		),
		'MyExtra' => array(
				'className' => 'Extra',
				'foreignKey' => 'depends_on'
		),
		'MyCategory' => array(
				'className' => 'Category',
				'foreignKey' => 'category_id'
		),
		'MyUser' => array(
				'className' => 'User',
				'foreignKey' => 'user_id'
		)
	);
	
	public $hasMany = array(
			'MyBoughtExtra' => array(
					'className' => 'BoughtExtra',
					'foreignKey' => 'extra_id'
			)
	);
	
	/** public $hasAndBelongsToMany = array(
		'House'=>array(
			'className'=>'House',
			'joinTable'=>'extras_houses',
			'foreignKey'=>'extra_id',
			'associationForeignKey'=>'house_id'
		)
	); **/
	
	
	public $validate=array(
			'name'=>array('rule'=>'notEmpty'),
			'default_priceA'=>array(
					'rule'=>'decimal',
					'message'=> 'Please enter a valid price',
					'allowEmpty'=>false
			),
			'default_priceB'=>array(
					'rule'=>'decimal',
					'message'=> 'Please enter a valid price',
					'allowEmpty'=>false
			),
			'default_priceC'=>array(
					'rule'=>'decimal',
					'message'=> 'Please enter a valid price',
					'allowEmpty'=>false
			),
			'category_id'=>array('rule'=>'notEmpty')
	);


}
