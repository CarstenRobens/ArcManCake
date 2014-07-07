
<h3>Land</h3>


<table>
	<tr>
		<th>Id</th>
		<th>Costumer</th>
		<th>Name</th>
		<th>Supervisor</th>
        <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $lands array, printing out land info --> 
	<?php foreach($lands_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Land']['id']; ?> </td> 
		<td> <?php 
		if ($x['Land']['customer_id'] == 0) {
			echo 'Open';
		}else{
			echo $this->Html->link($x['MyCustomer']['name'].' '.$x['MyCustomer']['surname'], array('controller'=>'Customers','action'=>'view',$x['MyCustomer']['id']));
		} ?></td>
		<td> <?php echo $this->Html->link($x['Land']['name'], array('controller'=>'Lands','action'=>'view',$x['Land']['id'])); ?></td>
		<td> <?php echo $this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?></td>
        <td> <?php 
                echo $this->Html->link('Edit ',array('action' => 'edit',$x['Land']['id'])).' | ';
                echo $this->Form->postLink('Delete',array('controller' => 'Lands','action' => 'delete',$x['Land']['id']),array('confirm'=>'Are you sure?'));
        ?></td>

		<td> <?php echo $x['Land']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add Land</h3>

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
	echo $this->Form->input('customer',array('default' => 0));
	
	echo $this->Form->end('Save Land');
}?>
