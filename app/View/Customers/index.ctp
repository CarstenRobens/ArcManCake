
<div class="row">
	<br>
	<h3><?php echo __('Customers'); ?></h3>
</div>
	
<div class="row">
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('id',__('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('name',__('Surname')); ?></th>
			<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			<th><?php echo __('Action'); ?></th>
		</tr>

	<!-- Here is where we loop through our $customers array, printing out customer info --> 
		<?php foreach($customers_view as $x ){ ?>
		<tr> 
			<td> <?php echo $x['Customer']['id']; ?> </td> 
			<td> <?php echo $this->Html->link($x['Customer']['name'], array('controller'=>'Customers','action'=>'view',$x['Customer']['id'])); ?></td>
			<td> <?php echo $this->Html->link($x['Customer']['surname'], array('controller'=>'Customers','action'=>'view',$x['Customer']['id'])); ?></td>
			
			<td> <?php echo $x['Customer']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['Customer']['user_id'])); ?></td>
			<td> <?php 
				echo $this->Html->link('Create Proposal',array('controller' => 'Proposals','action' => 'add',$x['Customer']['id'])).' | ';
				echo $this->Html->link('Add Land',array('controller' => 'Lands','action' => 'add_land_for_customer',$x['Customer']['id'])).' | ';
				echo $this->Html->link('Edit',array('action' => 'edit',$x['Customer']['id'])).' | ';
				echo $this->Form->postLink('Delete',array('controller' => 'Customers','action' => 'delete',$x['Customer']['id']),array('confirm'=>'Are you sure?'));
			?></td>
			
		</tr>
		<?php } ?>
		<?php echo $this->Paginator->numbers(); ?>
		<?php unset($customer); ?>
	</table>
</div>



<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>
	<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<legend>
							<?php echo __('Add a Customer'); ?>
						</legend>
						
						<?php 
						echo $this->Form->create('Customer', array('class' => 'form-horizontal'));
						
						echo $this->Form->input('name',array('placeholder' => __('Enter the customer name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('surname',array('placeholder' => __('Enter the customer surname'),'label' => __('Surname'),'div' => 'form-group has-success'));
						echo $this->Form->input('phone_private',array('placeholder' => __('Enter the customer private phone number'),'label' => __('Private Phone'),'div' => 'form-group has-success'));
						echo $this->Form->input('phone_work',array('placeholder' => __('Enter the customer work phone number'),'label' => __('Work Phone'),'div' => 'form-group has-success'));
						echo $this->Form->input('email',array('placeholder' => __('Enter the customer email address'),'label' => __('eMail'),'div' => 'form-group has-success'));
						echo $this->Form->input('address1',array('placeholder' => __('Enter the customer post address'),'label' => __('Post Address'),'div' => 'form-group has-success'));
						echo $this->Form->input('address2',array('placeholder' => __('additional post address information'),'label' => __('Post Address 2'),'div' => 'form-group has-success'));
						echo $this->Form->input('zipcode',array('placeholder' => __('Enter the customer zipcode'),'label' => __('Zipcode'),'div' => 'form-group has-success'));
						echo $this->Form->input('city',array('placeholder' => __('Enter the customer City'),'label' => __('City'),'div' => 'form-group has-success'));
						echo $this->Form->input('birthday',array('placeholder' => __('Enter the customers Birthday'),'label' => __('Birthday'),'div' => 'form-group has-success','minYear' => date('Y') - 110,'maxYear' => date('Y') - 18));
					
						echo $this->Form->input('notes',array('placeholder' => __('additional notes if required'),'label' => __('Notes'),'div' => 'form-group has-success'));
						?>
						<legend>
							<?php echo __('Second Customer'); ?>
						</legend>
						<?php 
						echo $this->Form->input('2nd_name',array('placeholder' => __('Enter the 2nd customer name'),'label' => __('2nd Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_surname',array('placeholder' => __('Enter the 2nd customer surname'),'label' => __('2nd Surname'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_maiden_surname',array('placeholder' => __('Enter the 2nd customer surname'),'label' => __('2nd Surname'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_birtday',array('placeholder' => __('Enter the 2nd customers Birthday'),'label' => __('2nd Birthday'),'div' => 'form-group has-success','minYear' => date('Y') - 110,'maxYear' => date('Y') - 18));
						?>
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
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
	</div>
	</div> <!-- /container -->
	
	

	<?php 
}?>

		

