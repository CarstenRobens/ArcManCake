			
			<?php Configure::load('Blog_config'); 
			$level = Configure::read('Level');
			?>
			
			<?php echo $this->Html->Link(
				$this->Html->image('Miss.jpg', array('alt' => 'CakePHP')),
				'http://www.google.com', array('escape' => false)
			); ?>
			

			<div>
			<?php 
				if(empty($current_user)){
					 echo $this->Html->link('Log in',array('controller' => 'users','action' => 'login'),array('escape' => false));
				}else{
					echo 'Hello '.$current_user['id'].' '.$current_user['username'];
					echo ' ('.$level[$current_user['role']].') ';
					echo '  '.$this->Html->link('Log out',array('controller' => 'users','action' => 'logout'));
				}
			?>
			</div>
			
			<div>
			<?php
				echo $this->Html->link('Users',array('controller' => 'Users','action' => 'index')); 
				echo '  ';
				echo $this->Html->link('Costumers',array('controller' => 'Costumers','action' => 'index'));
				echo '  ';
				echo $this->Html->link('Proposals',array('controller' => 'Proposals','action' => 'index'));
				echo '   |   ';
				echo $this->Html->link('Houses',array('controller' => 'Houses','action' => 'index'));
			?>
			</div>
