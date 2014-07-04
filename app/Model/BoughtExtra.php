<?php

class BoughtExtra extends AppModel{
	
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
    
    public function idFromKeys ($proposal_id,$extra_id){
    	return $id=$this->BoughtExtra->find('list',array(
        		'conditions'=>array('proposal_id' => $proposal_id, 'extra_id' => $extra_id)
        ));
    }
    

}
