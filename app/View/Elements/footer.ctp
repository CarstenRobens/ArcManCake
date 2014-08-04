

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
		<?php 
			if($this->Session->check('Auth.User')){
				echo 'Hello <b>'.$current_user['username'].'</b> ('.$level[$current_user['role']].') &middot; '.$this->Html->link('Logout',array('controller'=>'users','action'=>'logout'));
				
				
				if($current_user['role']<3){
					?> &middot; <?php
					echo $this->Html->link(__('Users'),array('controller'=>'Users','action'=>'index'));
					?> &middot; <?php
					echo $this->Html->link(__('Proposals'),array('controller'=>'Proposals','action'=>'index'));
				}
				
				if($current_user['role']<2){
					?> &middot; <?php
					echo $this->Html->link(__('Extra categories'),array('controller'=>'Categories','action'=>'index'));
				}
				
				if($current_user['role']<2){
					?> &middot; <?php
					echo $this->Html->link(__('Home pictures'),array('controller'=>'HomePictures','action'=>'index'));
				}
				
				if($current_user['role']<3){
					?> &middot; <?php
					echo $this->Html->link(__('House pictures'),array('controller'=>'HousePictures','action'=>'index'));
				}
				
				
			} else {
				echo $this->Html->link(__('Login'),array('controller'=>'users','action'=>'login'));
				
			}
		?>
		</p>
		
		
		<p>
		&copy; 2014 C. Robens and R. Gomez &middot; 
		<?php echo $this->Html->link('Impressum',array('controller'=>'pages','action'=>'impressum'))?> 
		
		
		</p>
		<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> __('CakePHP: the rapid development php framework', true), 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
		?>
    </footer>
</div><!-- /.container -->