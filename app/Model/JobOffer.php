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
					'message'=> 'Bitte geben Sie einen einen Jobtitel an.'
			),
			'description'=>array(
					'rule'=>'notEmpty',
					'message'=> 'Bitte geben Sie einen eine Jobbeschreibung an.'
			)
	);
	
}