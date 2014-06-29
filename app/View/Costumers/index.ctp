<h3>Costumers</h3>



<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Supervisor</th>
        <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $costumers array, printing out costumer info --> 
	<?php foreach($costumers_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Costumer']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['Costumer']['name'].' '.$x['Costumer']['surname'], array('controller'=>'Costumers','action'=>'view',$x['Costumer']['id'])); ?></td>
		<td> <?php echo $this->Html->link($x['Costumer']['user_id'], array('controller'=>'Users','action'=>'view',$x['Costumer']['user_id'])); ?></td>
        <td> <?php 
        	echo $this->Html->link('Create Proposal',array('controller' => 'Proposals','action' => 'add',$x['Costumer']['id'])).' ';
            echo $this->Html->link('Edit',array('action' => 'edit',$x['Costumer']['id'])).' ';
            echo $this->Form->postLink('Delete',array('controller' => 'Costumers','action' => 'delete',$x['Costumer']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
		<td> <?php echo $x['Costumer']['created']; ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($costumer); ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add costumer</h3>

	<?php 
	echo $this->Form->create('Costumer');
	echo $this->Form->input('name');
	echo $this->Form->input('surname');
	echo $this->Form->input('notes');
	echo $this->Form->input('phone');
	echo $this->Form->input('email');
	echo $this->Form->end('Save costumer');
}?>


