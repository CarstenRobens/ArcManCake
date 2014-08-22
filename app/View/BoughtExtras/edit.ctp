<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('BoughtExtra');?>	
						<legend>
							<?php 
							echo __('Change the price of: ');
							echo $bought_extra['MyExtra']['name']; ?>
						</legend>
						
						<?php 
							echo $this->Form->create('BoughtExtra', array('class' => 'form'));
							echo $this->Form->input('price',array('label' => __('Price')));
							echo $this->Form->input('factor',array('label' => __('Factor')));
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
</div>