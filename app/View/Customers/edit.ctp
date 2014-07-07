<h1>Edit Post</h1>

<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>

<?php
echo $this->Form->create('Customer');

echo $this->Form->input('name');
echo $this->Form->input('surname');
echo $this->Form->input('notes');
echo $this->Form->input('phone');
echo $this->Form->input('email');
echo $this->Form->input('address1');
echo $this->Form->input('address2');
echo $this->Form->input('zipcode');
echo $this->Form->input('city');

echo $this->Form->end('Save customer');
?>