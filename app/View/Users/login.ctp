


<div class="container">

<div class="contactwrapper">
<div class="view">

<div class="PostBox">
<div class="ThreadTitleBox">
	<div class="ThreadTitleContent">
		<h2><?php __('Login');?></h2>
	</div> 
	
	<p style="clear: both;">  </p>  
</div>
</div>

<div class="PostBox">
	<div class="PostHeader">
        <h3></h3>
        <p style="clear: both;">  </p>
    </div> 
	<div class="PostContent">
		<div class="PostContentBox">
			<div class="PostMainContentbox">
					<?php echo $this->Form->create('User');?>	
					<legend>
						<?php echo __('Please enter your username and password'); ?>
					</legend>
					
					<?php 
					echo $this->Form->input('username');
					echo $this->Form->input('password'); ?>			
			</div>
		</div>
		<p style="clear: both;"> </p>
	</div>
	<div class="PostFooter">
    	<div class="bottomaction"> <?php echo $this->Form->end(__('Login')); ?> <p style="clear: both;">  </p></div>
       
		<p style="clear: both;">  </p>
	</div>
</div>

</div>

</div>
</div> <!-- /container -->