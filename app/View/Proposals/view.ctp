	<div class="CategorieTitleBox">
        <div id="Proposal">
        	<?php echo __( $proposal_view['Proposal']['name'].'<small> for '.$proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'].'</small>',false);?>
        </div>
    </div>

    
	<hr >
	
	
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'House: '.$proposal_view['MyHouse']['name']);?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT-------------->			
	<div class="row"id=" ">
	  <?php if(true){?>
        
		<div class="col-md-6">
			<?php debug($proposal_view); 
			echo $this->Html->image('uploads/houses/'.$proposal_view['MyHouse'][0]['picture'], array('class' => 'featurette-image img-responsive')); ?>
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-4">
					<p > <?php echo __('Name:'); ?> </p>
					<p > <?php echo __('Surname:'); ?> </p>
					<p > <?php echo __('Notes:'); ?> </p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>			
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	</div>
	
	<legend>
		<?php echo __( 'House: '.$proposal_view['MyHouse']['name']);?>
	</legend>
	
	
    <div class="row"id=" ">
	  <?php if(true){?>
        
		<div class="col-md-2">
		</div>
		
		<div class="col-md-2">
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-4">
					<p > <?php echo __('Name:'); ?> </p>
					<p > <?php echo __('Surname:'); ?> </p>
					<p > <?php echo __('Notes:'); ?> </p>
				</div>
			</div>
		</div>
		<?php } ?>
	</div>
    

	<hr>



<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'index')) ?>

<h3><big><b><?php echo $proposal_view['Proposal']['name']; ?> </b></big></h3>

<p><small>Created: <?php echo $proposal_view['Proposal']['created'].' by '.$proposal_view['MyUser']['username']; ?> </small></p>

<p> <b>Customer: </b><?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname']; ?> </p>
<p> <b>Land: </b><?php echo $proposal_view['MyLand']['name']; ?> </p>
<p> <b>House: </b><?php echo $proposal_view['MyHouse']['name']; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $proposal_view['Proposal']['notes']; ?> </p>
