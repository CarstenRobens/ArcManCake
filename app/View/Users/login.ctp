


<div class="container">
<div class="contactwrapper">
<div class="view">

<div class="PostBox">
	<div class="PostContent">
		<div class="PostContentBox">
			<div class="PostMainContentbox">
					<?php echo $this->Form->create('User');?>	
					<legend>
						<?php echo __('Please enter your username and password'); ?>
					</legend>
					
					<?php 
					echo $this->Form->input(__('username'),array('placeholder' => __('Enter a Username'),'label' => __('Username'),'div' => 'form-group has-success'));
					echo $this->Form->input(__('password'),array('placeholder' => __('Enter a Password'),'label' => __('Password'),'div' => 'form-group has-success')); ?>	
					
			</div>						
		</div>
	</div>
	<?php echo $this->Form->end(array('label' => __('Login'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
	<p style="clear: both;">  </p>
</div>
	
</div>
</div>
</div> <!-- /container -->
