<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>



<div class="CategorieTitleBox">
	<div id="Proposal">
		<?php echo __('Select your extras:');?>
	</div>
</div>


<!---------------------------------------------Categories---------------------------------------------------->
<div class="row">

<div class="col-md-6"> <!-----------------------------LEFT------------------------>
<?php foreach ($list_categories_view as $index=>$category){ ?>
	<?php if (($index % 2) ==1){ ?>
		<div class="panel panel-primary">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo $category;?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($extras_view as $x) {
	if ($x['MyCategory']['name']==$category){ ?>
	
	<div class="row">
		<div class="col-md-2">
			
		</div>
		
		<div class="col-md-6"> 
			<?php echo $x['MyExtra']['name'];?>
		</div>
		
		<div class="col-md-2"> </div>
		
		<div class="col-md-2"></div>
	</div>
	
	<?php }
} ?>

	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	<?php } ?> 
<?php } ?> 
</div>
	
<div class="col-md-6"> <!-----------------------------RIGHT------------------------>
<?php foreach ($list_categories_view as $index=>$category){ ?>
	<?php if (($index % 2) ==0){ ?>
		<div class="panel panel-primary">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo $category;?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
<?php foreach($extras_view as $x) {
	if ($x['MyCategory']['name']==$category){ ?>
	
	<div class="row">
		<div class="col-md-2">
			
		</div>
		
		<div class="col-md-6"> 
			<?php echo $x['MyExtra']['name'];?>
		</div>
		
		<div class="col-md-2"> </div>
		
		<div class="col-md-2"></div>
	</div>
	
	<?php }
} ?>


	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	<?php } ?>
<?php } ?>
</div>

</div>

	<div class="row">
		<div class="CategorieTitleBox" align=center>
			<div id="AddExtra">
        		<?php echo $this->Html->link(__('Add extras'),array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?>
       			&middot;
       			<?php echo $this->Html->link(__('Add custom extra'),array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?>
        	</div>
   		</div>
   	</div>