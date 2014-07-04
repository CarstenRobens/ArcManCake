<h3><big><b>Add proposal</b></big> for <?php echo $customer_view['MyCustomer']['name'].' '.$customer_view['MyCustomer']['surname']; ?></h3>

<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>

<?php 
$list_lands_view[0]=' ';
$list_houses_view[0]=' ';

echo $this->Form->create('Proposal');

echo $this->Form->input('name');
echo $this->Form->input('notes');
echo $this->Form->input('land_id',array('options'=> $list_lands_view, 'default' => 0));
echo $this->Form->input('house_id',array('options'=> $list_houses_view, 'default' => 0));

echo $this->Form->end('Save proposal');
?>
