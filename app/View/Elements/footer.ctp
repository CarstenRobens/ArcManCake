

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8"><p style="clear: both;">  </p></div>
		<div class="col-md-2"></div>
    </div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8"><p style="clear: both;">  </p></div>
		<div class="col-md-2"></div>
    </div>
	<hr>
     <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a>
		
			
		</p>
		
		<p>
		&copy; 2014 C. Robens and R. Gomez &middot; 
		<?php echo $this->Html->link('Impressum',array('controller'=>'pages','action'=>'impressum'))?> &middot; 
		<?php 
			if($this->Session->read('Auth.User.power')<2){
				echo $this->Html->link('Users',array('controller'=>'Users','action'=>'index'));
				?>
				&middot; 
				<?php
			}
		?> 
		<?php 
			if($this->Session->read('Auth.User.power')<2){
				echo $this->Html->link('Homepictures',array('controller'=>'HomePictures','action'=>'index'));
				?>
				&middot; 
				<?php
			}
		?> 
		<?php 
			if($this->Session->check('Auth.User')){
				echo 'Hello '.$current_user['username'].'!  '.$this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
			} else {
				echo $this->Html->link('Login',array('controller'=>'users','action'=>'login'));
			}
		?>
		</p>
		<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
    </footer>
</div><!-- /.container -->