<h3>Customers</h3>



<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('MyUser.username','Created By'); ?></th>
        <th>Action</th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>

<!-- Here is where we loop through our $customers array, printing out customer info --> 
	<?php foreach($customers_view as $x ){ ?>
	<tr> 
		<td> <?php echo $x['Customer']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['Customer']['name'].' '.$x['Customer']['surname'], array('controller'=>'Customers','action'=>'view',$x['Customer']['id'])); ?></td>
		<td> <?php echo $this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['Customer']['user_id'])); ?></td>
        <td> <?php 
        	echo $this->Html->link('Create Proposal',array('controller' => 'Proposals','action' => 'add',$x['Customer']['id'])).' | ';
        	echo $this->Html->link('Add Land',array('controller' => 'Lands','action' => 'add_land_for_customer',$x['Customer']['id'])).' | ';
            echo $this->Html->link('Edit',array('action' => 'edit',$x['Customer']['id'])).' | ';
            echo $this->Form->postLink('Delete',array('controller' => 'Customers','action' => 'delete',$x['Customer']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
		<td> <?php echo $x['Customer']['created']; ?></td>
	</tr>
	<?php } ?>
	<?php echo $this->Paginator->numbers(); ?>
	<?php unset($customer); ?>
</table>


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
						echo $this->Form->input('phone',array('placeholder' => __('Enter the customer phone number'),'label' => __('Phone'),'div' => 'form-group has-success'));
						echo $this->Form->input('email',array('placeholder' => __('Enter the customer email address'),'label' => __('eMail'),'div' => 'form-group has-success'));
						echo $this->Form->input('address1',array('placeholder' => __('Enter the customer post address'),'label' => __('Post Address'),'div' => 'form-group has-success'));
						echo $this->Form->input('address2',array('placeholder' => __('additional post address information'),'label' => __('Post Address 2'),'div' => 'form-group has-success'));
						echo $this->Form->input('zipcode',array('placeholder' => __('Enter the customer zipcode'),'label' => __('Zipcode'),'div' => 'form-group has-success'));
						echo $this->Form->input('city',array('placeholder' => __('Enter the customer City'),'label' => __('City'),'div' => 'form-group has-success'));
						echo $this->Form->input('notes',array('placeholder' => __('additional notes if required'),'label' => __('Notes'),'div' => 'form-group has-success'));
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

		

