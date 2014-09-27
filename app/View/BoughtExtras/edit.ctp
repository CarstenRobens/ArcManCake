<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>

<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
					<legend>
						<?php echo __('Change the price of: ').$bought_extra['MyExtra']['name'];?>
					</legend>
					
					<?php 
					echo $this->Form->create('BoughtExtra', array('class' => 'form-horizontal'));
					
					echo $this->Form->input('price',array('label' => __('Price').' ('.$extra_unit['price'][$bought_extra['MyExtra']['units']].')','div' => 'form-group has-success'));
					if ($bought_extra['MyExtra']['units']!=0){
						echo $this->Form->input('factor',array('label' => $extra_unit['factor'][$bought_extra['MyExtra']['units']],'div' => 'form-group has-success'));
					}
					echo $this->Form->input('comment',array('label' => __('Comment'),'placeholder'=>__('Enter your comment:'),'div' => 'form-group has-success'));
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