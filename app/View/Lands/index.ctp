
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
	echo $this->Form->create('Land', array('class' => 'form-horizontal'));
	
	echo $this->Form->input('name');
	echo $this->Form->input('notes');
	echo $this->Form->input('land_size');
	echo $this->Form->input('land_price_per_m2');
	echo $this->Form->input('dev_size');
	echo $this->Form->input('dev_cost_per_m2');
	echo $this->Form->input('notary_cost');
	echo $this->Form->input('land_agent_cost');
	echo $this->Form->input('land_tax');
	echo $this->Form->input('customer',array('default' => 0));?>
	<legend>
		<?php echo __('Building Information'); ?>
	</legend>
	<?php 
	echo $this->Form->input('built_region',array('placeholder' => __('Enter the building region'),'label' => __('Building Region'),'div' => 'form-group has-success'));
	echo $this->Form->input('built_address',array('placeholder' => __('Enter the building address'),'label' => __('Building Post Address'),'div' => 'form-group has-success'));
	echo $this->Form->input('built_zipcode',array('placeholder' => __('Enter the building zipcode'),'label' => __('Building Zipcode'),'div' => 'form-group has-success'));
	echo $this->Form->input('built_city',array('placeholder' => __('Enter the building City'),'label' => __('Building City'),'div' => 'form-group has-success'));
	echo $this->Form->input('construction_office',array('placeholder' => __('Enter the corresponding Construction Office'),'label' => __('Construction Office'),'div' => 'form-group has-success'));
	?>
	
	
	<?php
	echo $this->Form->end('Save Land');
}?>


