



        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
			  <a href="../" class="navbar-brand">ArcManCake 0.1</a> 
			  
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
				<?php if($this->Session->read('menue.active')=='Home'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Home'), array('controller' => 'home', 'action' => 'index')); ?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Home'), array('controller' => 'home', 'action' => 'index')); ?></li>
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Customers'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Customers'), array('controller' => 'Customers', 'action' => 'index')); ?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Customers'), array('controller' => 'Customers', 'action' => 'index')); ?></li>
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Proposals'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Proposals'), array('controller' => 'Proposals', 'action' => 'index')); ?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Proposals'), array('controller' => 'Proposals', 'action' => 'index')); ?></li>
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Houses'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Houses'),array('controller'=>'Houses','action'=>'index'))?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Houses'),array('controller'=>'Houses','action'=>'index'))?></li>
				<?php } ?>
				
				
				<?php if($this->Session->read('menue.active')=='Lands'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Lands'),array('controller'=>'Lands','action'=>'index'))?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Lands'),array('controller'=>'Lands','action'=>'index'))?></li>
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Extras'){ ?>
					<li class="active"><?php echo $this->Html->link(__('Extras'),array('controller'=>'Extras','action'=>'index'))?></li>
				<?php }else{ ?>
					<li><?php echo $this->Html->link(__('Extras'),array('controller'=>'Extras','action'=>'index'))?></li>
				<?php } ?>
				
				
                
              </ul>
				
            </div>
          </div>
        </div>
	
			
