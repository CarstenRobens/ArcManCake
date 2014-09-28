

	<?php $check_open = $this->requestAction('/JobOffers/check_open'); ?>

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
			
			<a  class="navbar-brand">
					<?php echo $this->Html->image('Logo.png', array('width' => '40'), array('class' => 'img-responsive'));?>
			</a>
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
				
			  <?php echo $this->Html->link(__('IZ-Haus'), array('plugin'=>NULL,'controller' => 'Home', 'action' => ''),array('class' => 'navbar-brand')); ?>
            </div>
            <div class="navbar-collapse collapse">
				
				<?php if (!empty($current_user)) {?>
				
				<ul class="nav navbar-nav">
				
					<?php if($current_user['role']<3){?>
						<?php if($this->Session->read('menue.active')=='Customers'){ ?>
							<li class="active">	<?php }else{ ?>	<li>
						<?php } ?>
						<?php echo $this->Html->link(__('Customers'), array('plugin'=>NULL,'controller' => 'Customers', 'action' => 'index')); ?></li>
					
						<?php if($this->Session->read('menue.active')=='Lands'){ ?>
							<li class="active"> <?php }else{ ?> <li>
						<?php } ?>
						<?php echo $this->Html->link(__('Lands'),array('plugin'=>NULL,'controller'=>'Lands','action'=>'index'))?></li>
					<?php }elseif ($current_user['role']==3){?>
						<?php if($this->Session->read('menue.active')=='Proposals'){ ?>
							<li class="active"> <?php }else{ ?> <li>
						<?php } ?>
						<?php echo $this->Html->link(__('Proposals'),array('plugin'=>NULL,'controller'=>'Proposals','action'=>'index'))?></li>
					<?php }?>
				
					<?php if($this->Session->read('menue.active')=='FullCalendar'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Calendar'),array('plugin'=>'full_calendar','controller'=>'FullCalendar'))?></li>
				
					<?php if($this->Session->read('menue.active')=='Houses'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Houses'),array('plugin'=>NULL,'controller'=>'Houses','action'=>'index'))?></li>
							
					<?php if($this->Session->read('menue.active')=='Extras'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Extras'),array('plugin'=>NULL,'controller'=>'Extras','action'=>'index'))?></li>
					
				
					<?php if($this->Session->read('menue.active')=='Offer'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Offers'),array('plugin'=>NULL,'controller'=>'Offer','action'=>'index'))?></li>
					
					<?php if($this->Session->read('menue.active')=='GalleryPictures'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Portfolio'),array('plugin'=>NULL,'controller'=>'GalleryPictures','action'=>'index'))?></li>
					
				</ul>
				<?php } else {?>
				<ul class="nav navbar-nav">
				
					<?php if($this->Session->read('menue.active')=='Offer'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Offers'),array('plugin'=>NULL,'controller'=>'Offer','action'=>'index'))?></li>
					
					<?php if($this->Session->read('menue.active')=='Houses'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Houses'),array('plugin'=>NULL,'controller'=>'Houses','action'=>'index'))?></li>
					
					<?php if($this->Session->read('menue.active')=='GalleryPictures'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Portfolio'),array('plugin'=>NULL,'controller'=>'GalleryPictures','action'=>'index'))?></li>
					
					<?php if ($check_open>0) {
						if($this->Session->read('menue.active')=='JobOffers'){ ?>
							<li class="active"> <?php }else{ ?> <li>
						<?php } 
						echo $this->Html->link(__('Job offers'),array('plugin'=>NULL,'controller'=>'JobOffers','action'=>'index'))?></li>
					<?php } ?>
					
					<?php if($this->Session->read('menue.active')=='Contact'){ ?>
						<li class="active"> <?php }else{ ?> <li>
					<?php } ?>
					<?php echo $this->Html->link(__('Contact'),array('plugin'=>NULL,'controller'=>'Home','action'=>'contact'))?></li>
					
				</ul>
				
				<?php } ?>
			</div>
          </div>
        </div>
	
			
