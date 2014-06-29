<h3>Edit House</h3>

<?php echo $this->Html->link('Back', array('controller'=>'Houses','action'=>'index')) ?>

<?php
echo $this->Form->create('House');
echo $this->Form->input('name');
echo $this->Form->input('notes');
echo $this->Form->input('size');
echo $this->Form->input('stores');
echo $this->Form->input('type');
echo $this->Form->input('price');
echo $this->Form->end('Save house');
?>