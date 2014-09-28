<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('action'=>'index')) ?>
</div>
	


<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('JobOffer',array('class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Edit job offer'); ?>
						</legend>
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter the name of the job offer'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						?>
						
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>	
