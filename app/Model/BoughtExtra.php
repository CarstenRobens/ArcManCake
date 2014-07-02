<?php

class BoughtPlan extends AppModel{
	
	public $belongsTo = array(
			'MyProposal' => array(
					'className' => 'Proposal',
					'foreignKey' => 'proposal_id'
			),
			'MyExtra' => array(
					'className' => 'Extra',
					'foreignKey' => 'extra_id'
			)
	);
	
	
    public $validate=array(
    		'price'=>array(
            	'rule'=>'decimal',
    			'message'=> 'Please enter a valid price',
    			'allowEmpty'=>false
			),
    		'factor'=>array(
    			'rule'=>'decimal',
    			'message'=> 'Please enter a valid factor',
    			'allowEmpty'=>false
    		)
    		
    );
    

}
