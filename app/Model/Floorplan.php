<?php

class Floorplan extends AppModel{
    public $validate=array(
    		'name'=>array('rule'=>'notEmpty'),
    		'picture'=>array('rule'=>'notEmpty')
    );
    

}
