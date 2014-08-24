<?php
/*
 * View/Events/edit.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="row"><br>
<?php echo $this->Html->link('Back', array('plugin' => 'full_calendar', 'controller' => 'events','action'=>'index')) ?>
</div>

<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
					<legend>
						<?php echo __('Edit appointment');?>
					</legend>
					
					<?php 
					echo $this->Form->create('Event');
					
					echo $this->Form->input('id', array('label' => __('Appointment'),'div' => 'form-group has-success'));
					echo $this->Form->input('event_type_id', array('label' => __('Category'),'div' => 'form-group has-success'));
					echo $this->Form->input('title',array('label' => __('Title'),'div' => 'form-group has-success'));
					echo $this->Form->input('details',array('label' => __('Details'),'placeholder'=>__('Enter your details:'),'div' => 'form-group has-success'));
					echo $this->Form->input('start',array('dateFormat'=>'DMY','timeFormat'=>'24','label' => __('Starting:'),'div' => 'form-group has-success'));
					echo $this->Form->input('end',array('dateFormat'=>'DMY','timeFormat'=>'24','label' => __('Ending:'),'div' => 'form-group has-success'));
					echo $this->Form->input('all_day',array('label' => __('All day?:'),'div' => 'form-group has-success'));
					echo $this->Form->input('status', array('options' => array(
						'Scheduled' => 'Scheduled','Confirmed' => 'Confirmed','In Progress' => 'In Progress',
						'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
					)
					,'label' => __('Status:'),'div' => 'form-group has-success'));
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
