



        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
				<a class="navbar-brand" href="#">
					<?php echo $this->Html->image('Logo.png', array('width' => '40'), array('class' => 'img-responsive'));?>
					
				</a>
			  <?php echo $this->Html->link(__('ArcManCake 0.1'), array('plugin'=>NULL,'controller' => 'HomePictures', 'action' => 'home'),array('class' => 'navbar-brand')); ?>
            </div>
            <div class="navbar-collapse collapse">
				
				<ul class="nav navbar-nav">
				<?php if($this->Session->read('menue.active')=='Home'){ ?>
					<li class="active">	<?php }else{ ?>	<li>
				<?php } ?>
				<?php echo $this->Html->link(__('Home'), array('plugin'=>NULL,'controller' => 'HomePictures', 'action' => 'home')); ?></li>
				
				<?php if (!empty($current_user)) {?>
					<?php if($this->Session->read('menue.active')=='Customers'){ ?>
						<li class="active">	<?php }else{ ?>	<li>
					<?php } ?>
					<?php echo $this->Html->link(__('Customers'), array('plugin'=>NULL,'controller' => 'Customers', 'action' => 'index')); ?></li>
					
					<?php if($this->Session->read('menue.active')=='Proposals'){ ?>
						<li class="active"> <?php }else{ ?>	<li>
					<?php } ?>
					<?php echo $this->Html->link(__('Proposals'), array('plugin'=>NULL,'controller' => 'Proposals', 'action' => 'index')); ?></li>
					
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Houses'){ ?>
					<li class="active"> <?php }else{ ?> <li>
				<?php } ?>
				<?php echo $this->Html->link(__('Houses'),array('plugin'=>NULL,'controller'=>'Houses','action'=>'index'))?></li>
				
				<?php if (!empty($current_user)) {?>
				
					<?php if($this->Session->read('menue.active')=='Lands'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Lands'),array('plugin'=>NULL,'controller'=>'Lands','action'=>'index'))?></li>
					
					<?php if($this->Session->read('menue.active')=='Extras'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Extras'),array('plugin'=>NULL,'controller'=>'Extras','action'=>'index'))?></li>
					
					<?php if($this->Session->read('menue.active')=='FullCalendar'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Calendar'),array('plugin'=>'full_calendar','controller'=>'FullCalendar'))?></li>
				
				<?php } ?>
				
				<?php if($this->Session->read('menue.active')=='Offer'){ ?>
					<li class="active"> <?php }else{ ?> <li>
				<?php } ?>
				<?php echo $this->Html->link(__('Offers'),array('plugin'=>NULL,'controller'=>'Offer','action'=>'index'))?></li>
				
				<li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo __('TESTING Houses') ?> <b class="caret"></b></a>
	              <ul class="dropdown-menu">
	                <li><?php echo $this->Html->link(__('index'),array('controller'=>'Houses','action'=>'index'))?></li>
	                <li><a href="#">Another action</a></li>
	                <li><a href="#">Something else here</a></li>
	              </ul>
	            </li>
				
                
              </ul>
				
			</div>
          </div>
        </div>
	
			
