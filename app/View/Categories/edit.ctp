
<?php echo $this->Html->link('Back', array('controller'=>'Categories','action'=>'index')) ?>

<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Category',array('enctype'=>'multipart/form-data'));?>	
						<legend>
							<?php echo __('Edit Category'); ?>
						</legend>
						
						<?php 
							echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name')));
						?>
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>

		<div class="PostFooter">
			<div class="bottomaction"> <?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success')); ?> <p style="clear: both;">  </p></div>
			<p style="clear: both;">  </p>
		</div>
	</div>
		
	</div>
	</div>
</div>