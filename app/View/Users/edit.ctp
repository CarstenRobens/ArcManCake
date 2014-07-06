

<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('User');?>	
						<legend>
							<?php echo __('Edit User'); ?>
						</legend>
						
						<?php 
						echo $this->Form->create('User', array('class' => 'form'));
							echo $this->Form->input('username',array('placeholder' => __('Enter a Username'),'label' => __('Username')));
							echo $this->Form->input('password',array('placeholder' => __('Enter a Password'),'label' => __('Password')));
							echo $this->Form->input('role',array('options'=> $level,'label' => __('Role')));
							echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name')));
							echo $this->Form->input('surname',array('placeholder' => __('Enter a Surname'),'label' => __('Surname')));
							echo $this->Form->input('phone',array('placeholder' => __('Enter a Phone Number'),'label' => __('Phone Number')));
							echo $this->Form->input('email', array('placeholder' => __('Enter an E-Mail Address'),'type' => 'email','label' => __('E-Mail Address')));
						?>	
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>

		<div class="PostFooter">
			<div class="bottomaction"> <?php echo $this->Form->end(array('label' => __('Update'),'text' => 'test','class' => 'btn btn-success')); ?> <p style="clear: both;">  </p></div>
			<p style="clear: both;">  </p>
		</div>
	</div>
		
	</div>
	</div>
	</div> <!-- /container -->