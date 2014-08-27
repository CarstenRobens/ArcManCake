<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Categories','action'=>'index')) ?>
</div>

<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('Category',array('class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add Category'); ?>
						</legend>

						<?php echo $this->Form->input('name',array('placeholder' => __('Enter category name'),'label' => __('Name'),'div' => 'form-group has-success'));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>