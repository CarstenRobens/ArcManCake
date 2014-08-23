<div class="row">
	<br>
	<h3><?php echo __('Land'); ?></h3>
</div>
	

<div class="row">
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('id',__('ID')); ?></th>
			
			<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('customer_id',__('belongs to Costumer')); ?></th>
			<th><?php echo $this->Paginator->sort('user_id',__('belongs to Supervisor')); ?></th>
			<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			<th><?php echo __('Action'); ?></th>
			
		</tr>

	<!-- Here is where we loop through our $lands array, printing out land info --> 
		<?php foreach($lands_view as $x ): ?>
		<tr> 
			<td> <?php echo $x['Land']['id']; ?> </td> 
			
			<td> <?php echo $this->Html->link($x['Land']['name'], array('controller'=>'Lands','action'=>'view',$x['Land']['id'])); ?></td>
			<td> <?php 
			if ($x['Land']['customer_id'] == 0) {
				echo 'Open';
			}else{
				echo $this->Html->link($x['MyCustomer']['name'].' '.$x['MyCustomer']['surname'], array('controller'=>'Customers','action'=>'view',$x['MyCustomer']['id']));
			} ?></td>
			<td> <?php echo $this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?></td>
			

			<td> <?php echo $x['Land']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
			<td> 
			<a href=<?php echo $this->Html->url(array('action' => 'edit',$x['Land']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			
			<?php
			echo ' ';
			
				echo $this->Form->postLink($this->Html->tag('i', '',
										array('class' => 'glyphicon glyphicon-remove')),
										array('action' => 'delete',$x['Land']['id']) ,
										array('escape' => false), __('Are you sure you want to delete this Customer?'));
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
</div>

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


