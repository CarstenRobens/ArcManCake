<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Users','action'=>'index')) ?>
</div>

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
							if ($current_user['role']<2){
								echo $this->Form->input('role',array('options'=> $level,'label' => __('Role')));
							}
							echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name')));
							echo $this->Form->input('surname',array('placeholder' => __('Enter a Surname'),'label' => __('Surname')));
							echo $this->Form->input('phone',array('placeholder' => __('Enter a Phone Number'),'label' => __('Phone Number')));
							echo $this->Form->input('email', array('placeholder' => __('Enter an E-Mail Address'),'type' => 'email','label' => __('E-Mail Address')));
						?>	
						
				</div>						
			</div>
		</div>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
	</div>
</div> <!-- /container -->