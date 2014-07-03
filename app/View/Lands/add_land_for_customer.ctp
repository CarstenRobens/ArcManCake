<h3>Private land for <?php echo $customer_view['MyCustomer']['name'].' '.$customer_view['MyCustomer']['surname']; ?></h3>

<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>


<?php 
	echo $this->Form->create('Land');
	
	echo $this->Form->input('name');
	echo $this->Form->input('notes');
	echo $this->Form->input('land_size');
	echo $this->Form->input('land_price_per_m2');
	echo $this->Form->input('dev_size');
	echo $this->Form->input('dev_cost_per_m2');
	echo $this->Form->input('notary_cost');
	echo $this->Form->input('land_agent_cost');
	echo $this->Form->input('land_tax');
	
	echo $this->Form->end('Save Land');
?>
