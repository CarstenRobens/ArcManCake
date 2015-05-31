<h3>PDF mit zusätzlichen Informationen hinzufügen</h3>

<?php echo $this->Html->link('Zurück', array('controller'=>'Houses','action'=>'index')) ?>


<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('House', array('enctype'=>'multipart/form-data','class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('PDF hinzufügen'); ?>
						</legend>
						
						<?php 
						echo $this->Form->input('upload', array('type' => 'file'));
						?>	
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>	</div>
		
	</div>
	</div>
</div>