<h3>Edit Category</h3>

<?php echo $this->Html->link('Back', array('controller'=>'Categories','action'=>'index')) ?>

<?php
echo $this->Form->create('Category');
echo $this->Form->input('name');
echo $this->Form->end('Save customer');
?>