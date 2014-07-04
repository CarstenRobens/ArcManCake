<h3>Edit Category</h3>

<?php echo $this->Html->link('Back', array('controller'=>'Proposal','action'=>'index')) ?>

<?php
$list_extras_view[0]=' ';

echo $this->Form->create('BoughtExtra');

echo $this->Form->input('extra_id',array('options'=> $list_extras_view, 'default' => 0));
echo $this->Form->input('price');
echo $this->Form->input('factor', array('default' => 1));

echo $this->Form->end('Save customer');
?>