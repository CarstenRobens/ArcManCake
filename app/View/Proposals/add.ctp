<h1>Add proposal</h1>

<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>

<?php echo 'Customer: '.$customer_id_view; ?>

<?php 
echo $this->Form->create('Proposal');
echo $this->Form->input('name');
echo $this->Form->input('notes');
echo $this->Form->input('house_id');
echo $this->Form->input('land_id');
echo $this->Form->end('Save proposal');
?>
