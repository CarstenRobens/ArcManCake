<h3>Customers</h3>



<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Supervisor</th>
        <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $customers array, printing out customer info --> 
	<?php foreach($customers_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Customer']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['Customer']['name'].' '.$x['Customer']['surname'], array('controller'=>'Customers','action'=>'view',$x['Customer']['id'])); ?></td>
		<td> <?php echo $this->Html->link($x['Customer']['user_id'], array('controller'=>'Users','action'=>'view',$x['Customer']['user_id'])); ?></td>
        <td> <?php 
        	echo $this->Html->link('Create Proposal',array('controller' => 'Proposals','action' => 'add',$x['Customer']['id'])).' ';
            echo $this->Html->link('Edit',array('action' => 'edit',$x['Customer']['id'])).' ';
            echo $this->Form->postLink('Delete',array('controller' => 'Customers','action' => 'delete',$x['Customer']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
		<td> <?php echo $x['Customer']['created']; ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($customer); ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add customer</h3>

	<?php 
	echo $this->Form->create('Customer');
	echo $this->Form->input('name');
	echo $this->Form->input('surname');
	echo $this->Form->input('notes');
	echo $this->Form->input('phone');
	echo $this->Form->input('email');
	echo $this->Form->end('Save customer');
}?>


