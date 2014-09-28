
<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Customers','action'=>'index')) ?>
</div>
	


<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Customer',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Edit Customer'); ?>
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
						echo $this->Form->input('birthday',array('dateFormat'=>'DMY','placeholder' => __('Enter the customers Birthday'),'label' => __('Birthday'),'div' => 'form-group has-success','minYear' => date('Y') - 110,'maxYear' => date('Y') - 18));
					
						echo $this->Form->input('notes',array('placeholder' => __('additional notes if required'),'label' => __('Notes'),'div' => 'form-group has-success'));
						?>
						<legend>
							<?php echo __('Second Customer'); ?>
						</legend>
						<?php 
						echo $this->Form->input('2nd_name',array('placeholder' => __('Enter the 2nd customer name'),'label' => __('2nd Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_surname',array('placeholder' => __('Enter the 2nd customer surname'),'label' => __('2nd Surname'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_maiden_surname',array('placeholder' => __('Enter the 2nd maiden surname'),'label' => __('2nd Maiden Surname'),'div' => 'form-group has-success'));
						echo $this->Form->input('2nd_birthday',array('empty' => true,'dateFormat'=>'DMY','placeholder' => __('Enter the 2nd customers Birthday'),'label' => __('2nd Birthday'),'div' => 'form-group has-success','minYear' => date('Y') - 110,'maxYear' => date('Y') - 18));
						?>	
						
				</div>						
			</div>
		</div>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
</div>
