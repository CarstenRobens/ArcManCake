<?php

class HomePicture extends AppModel{
	
	public $belongsTo = array(
			'MyUser' => array(
					'className' => 'User',
					'foreignKey' => 'user_id'
			)
	);
	
	
    public $validate=array(
    		'title'=>array('rule'=>'notEmpty'),
    		'upload'=>array(
            	'rule'=>'uploadError',
    			'message'=> 'Etwas hat nicht funktioniert. Bitte versuchen Sie es erneut.',
    			'allowEmpty'=>false
			)
    );
    

}
