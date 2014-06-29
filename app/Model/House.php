<?php

class House extends AppModel{
    public $validate=array(
    		'name'=>array(
            	'rule'=>'notEmpty'
    		),
    		'type'=>array(
    				'rule'=>'notEmpty'
    		),
    		'size'=>array(
            	'rule'=>'notEmpty'
			),
    		'stores'=>array(
            	'rule'=>'notEmpty'
			),
    		'price'=>array(
    				'rule'=>'notEmpty'
    		)
    );
    

}
