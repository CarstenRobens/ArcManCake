<?php

class Extra extends AppModel{
	
	public $belongsTo = array(
		'MyHouseDep' => array(
				'className' => 'House',
				'foreignKey' => 'depends_on_house'
		),
		'MyExtraDep' => array(
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
					'message'=> 'Bitte geben Sie einen gültigen Preis an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
					'allowEmpty'=>false
			),
			'default_priceB'=>array(
					'rule'=>'decimal',
					'message'=> 'Bitte geben Sie einen gültigen Preis an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
					'allowEmpty'=>false
			),
			'default_priceC'=>array(
					'rule'=>'decimal',
					'message'=> 'Bitte geben Sie einen gültigen Preis an (beachten Sie, dass Sie einen "." und kein "," benutzen müssen).',
					'allowEmpty'=>false
			),
			'units'=>array('rule'=>'notEmpty'),
			'category_id'=>array('rule'=>'notEmpty')
	);


}
