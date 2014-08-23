<?php

class GalleryPicture extends AppModel{
	
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
    			'message'=> 'Something went wrong while updating',
    			'allowEmpty'=>false
			)
    );
    

}
