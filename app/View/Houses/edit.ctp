<h3>Edit House</h3>

<?php echo $this->Html->link('Back', array('controller'=>'Houses','action'=>'index')) ?>


<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('House', array('class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Add a House'); ?>
						</legend>
						
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a Description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('size',array('placeholder' => __('Enter a Size in Squaremeter'),'label' => __('Size'),'div' => 'form-group has-success'));
						echo $this->Form->input('size_din',array('placeholder' => __('Enter a DIN 277 Size in Squaremeter'),'label' => __('DIN 277 Size'),'div' => 'form-group has-success'));
						echo $this->Form->input('floors',array('placeholder' => __('Enter how many floors'),'label' => __('Foors'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_duplex',array('label' => __('Duplex?'),'div' => 'form-group has-success'));
						echo $this->Form->input('type',array('options'=>$house_type,'placeholder' => __('Choose type:'),'label' => __('Type'),'div' => 'form-group has-success'));
						echo $this->Form->input('price',array('placeholder' => __('Enter a Price'),'label' => __('Price'),'div' => 'form-group has-success'));?>	
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>	</div>
		
	</div>
	</div>
</div>