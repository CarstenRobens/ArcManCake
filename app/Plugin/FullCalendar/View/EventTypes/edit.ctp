<?php
/*
 * Views/EventTypes/edit.ctp
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
<?php echo $this->Html->link('Back', array('plugin' => 'full_calendar', 'action' => 'index')) ?>
</div>

<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
					<legend>
						<?php echo __('Edit calendar category');?>
					</legend>
					
					<?php 
					echo $this->Form->create('EventType');
					
					echo $this->Form->input('id');
					echo $this->Form->input('name',array('placeholder'=>'Enter the category name','label' => __('Name'),'div' => 'form-group has-success'));
					echo $this->Form->input('color',
							array('options' => array(
									'Blue' => 'Blue',
									'Red' => 'Red',
									'Pink' => 'Pink',
									'Purple' => 'Purple',
									'Orange' => 'Orange',
									'Green' => 'Green',
									'Gray' => 'Gray',
									'Black' => 'Black',
									'Brown' => 'Brown'),
									'div' => 'form-group has-success'
							));
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