
<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('Proposal',array('class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add proposal for').' '.$customer_view['MyCustomer']['name'].' '.$customer_view['MyCustomer']['surname']; ?>
						</legend>

						<?php 
						$list_lands_view[0]=' ';
						$list_houses_view[0]=' ';

						echo $this->Form->input('name',array('placeholder' => __('Enter the name of the proposal'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('notes',array('placeholder' => __('Something to point out?'),'label' => __('Notes'),'div' => 'form-group has-success'));
						?>

					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>
