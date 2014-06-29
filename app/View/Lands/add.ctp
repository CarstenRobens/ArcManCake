<h1>Add proposal</h1>

<?php echo $this->Html->link('Back', array('controller'=>'Costumers','action'=>'index')) ?>

<?php echo 'Costumer: '.$costumer_id_view; ?>

<?php 
echo $this->Form->create('Proposal');
echo $this->Form->input('name');
echo $this->Form->input('notes');
echo $this->Form->input('house_id');
echo $this->Form->input('land_id');
echo $this->Form->end('Save proposal');
?>
