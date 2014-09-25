<?php
class JobOffer extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	public $validate=array(
			'name'=>array(
					'rule'=>'notEmpty',
					'message'=> 'A name is required'
			),
			'description'=>array(
					'rule'=>'notEmpty',
					'message'=> 'Description is required'
			)
	);
	
}