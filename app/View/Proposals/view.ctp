	
	
	<div class="CategorieTitleBox">
        <div id="Proposal">
        	<?php echo __( $proposal_view['Proposal']['name'].'<small> for '.$proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'].'</small>',false);?>
        </div>
    </div>
    
    
    	
<?php if (!empty($proposal_view['Proposal']['notes'])){ ?>
    <div class="row">
		
		<div class="col-md-1" align=right>
			<b><?php echo __('Notes'); ?></b>
		</div>
		
		<div class="col-md-10">
			<?php echo $proposal_view['Proposal']['notes']; ?>
		</div>
		
		<div class="col-md-1">
		</div>
    </div>
<?php } ?>
    
    
	<hr >
	
	<p align=right>
	<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'view',$proposal_view['MyCustomer']['id'])) ?>
	</p>
	
	
<!---------------------------------------------HOUSE---------------------------------------------------->
	
<?php if (!empty($proposal_view['MyHouse']['id'])){ ?>	
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'House');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT-------------->			
	<div class="row"id=" ">
	<?php if(true){?>
        
        <div class="col-md-2">
			<div class="row">
				<?php echo $this->Html->image('uploads/houses/'.$house_pictures_view[1]['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
			</div>
				
			<div class="row">
				<?php echo $this->Html->image('uploads/houses/'.$house_pictures_view[2]['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
			</div>
				
			<div class="row">
				<?php echo $this->Html->image('uploads/houses/'.$house_pictures_view[3]['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
			</div>
        </div>
        
		<div class="col-md-5">
			<div class="row">
				<?php echo $this->Html->image('uploads/houses/'.$house_pictures_view[0]['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
			</div>
		</div>
		
		<div class="col-md-5">
			<div class="row">
				<div class="col-xs-4">  </div>  
				<div class="col-xs-8"> <u><b><?php echo $proposal_view['MyHouse']['name']; ?> </u></b></div>
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Type:'); ?> </div>  
				<div class="col-xs-8"> <?php echo $proposal_view['MyHouse']['type']; ?> </div>
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Size:'); ?> </div>  
				<div class="col-xs-8"> <?php echo __($proposal_view['MyHouse']['size'].' m<sup>2</sup> in '.$proposal_view['MyHouse']['floors'].' floors.'); ?> </div>
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Description:'); ?> </div>  
				<div class="col-xs-8"> <?php echo $proposal_view['MyHouse']['description']; ?> </div>
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Price:'); ?> </div>  
				<div class="col-xs-8"> <?php echo $proposal_view['MyHouse']['price'].' €'; ?> </div>
			</div>
		</div>
		<?php } ?>
	</div>			
	
	
	<div class="row">
		<div class="col-md-11" align=right>
			<?php echo $this->Html->link(__('Edit'),array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']));?>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	
	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	</div>
	
<?php }else{ ?>
	<div class="row">
		<div class="CategorieTitleBox" align=center>
        	<div id="AddHouse">
       			<?php echo $this->Html->link(__('Add house'),array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']));?>
       		</div>
   		</div>
	</div>
<?php } ?>
   
    	

	
	
	



<!---------------------------------------------LAND------------------------------------------------------>
	
<?php if (!empty($proposal_view['MyLand']['id'])){ ?>		
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Land');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-10">
			<u><b><?php echo $proposal_view['MyLand']['name']; ?></b></u>
		</div>
	</div>
	
	<?php if(!empty($proposal_view['MyLand']['notes'])){ ?>
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-3">
			<?php echo __('Notes:'); ?>
		</div>
		
		<div class="col-md-5">
			<?php echo $proposal_view['MyLand']['notes']; ?>
		</div>
		
		<div class="col-md-2"> </div>
		
	</div>
	<?php } ?>
	
	
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4">
					<b><?php echo __('Land Size'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['land_size'].' m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					<b><?php echo __('Land Price'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['land_price_per_m2'].' €/m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					.
					<p align=right><?php echo $proposal_view['MyLand']['land_price_per_m2']*$proposal_view['MyLand']['land_size'].' €'; ?></p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<b><?php echo __('Dev. Size'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['dev_size'].' m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					<b><?php echo __('Dev. Cost'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['dev_cost_per_m2'].' €/m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					.
					<p align=right><?php echo $proposal_view['MyLand']['dev_cost_per_m2']*$proposal_view['MyLand']['dev_size'].' €'; ?></p>
				</div>
			</div>
			
			<?php $subtotal=$proposal_view['MyLand']['land_price_per_m2']*$proposal_view['MyLand']['land_size']+$proposal_view['MyLand']['dev_cost_per_m2']*$proposal_view['MyLand']['dev_size'];?>
			
		</div>
		
		
		
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-5">
					<b><?php echo __('Land Agent Cost'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['land_agent_cost'].' %'; ?></p>
					<b><?php echo __('Notary Cost'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['notary_cost'].' %'; ?></p>
					<b><?php echo __('Tax'); ?></b>
					<p align=right><?php echo $proposal_view['MyLand']['land_tax'].' %'; ?></p>
				</div>
				<div class="col-md-4">
					.
					<p align=right><?php echo $proposal_view['MyLand']['land_agent_cost']/100*$subtotal.' €'; ?></p>
					.
					<p align=right><?php echo $proposal_view['MyLand']['notary_cost']/100*$subtotal.' €'; ?></p>
					.
					<p align=right><?php echo $proposal_view['MyLand']['land_tax']/100*$subtotal.' €'; ?></p>
				</div>
				
				<div class="col-md-2"> </div>
			</div>
			
			<?php $total=($proposal_view['MyLand']['land_agent_cost']+$proposal_view['MyLand']['notary_cost']+$proposal_view['MyLand']['land_tax']+100)/100*$subtotal; ?>
			
		</div>
		
		<div class="col-md-2"></div>
		
	</div>
	
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-4"> </div>
				
				<div class="col-md-4" align=right>
					<b><?php echo __('Subtotal'); ?></b>
				</div>
				<div class="col-md-4" align=right>
					<?php echo $subtotal.' €'; ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-1"> </div>
				
				<div class="col-md-5" align=right>
					<b><?php echo __('Total'); ?></b>
				</div>
				<div class="col-md-4" align=right>
					<?php echo $total.' €'; ?>
				</div>
				<div class="col-md-2"> </div>
			</div>
		</div>
		
		<div class="col-md-2">
		</div>
	</div>
		
			
	<div class="row">
		<div class="col-md-11" align=right>
			<?php echo $this->Html->link(__('Edit'),array('controller' => 'Proposals','action' => 'edit_land',$proposal_view['Proposal']['id']));?>
		</div>
		<div class="col-md-1"></div>
	</div>
	
	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="CategorieTitleBox" align=center>
			<div id="AddExtra">
       			<?php echo $this->Html->link(__('Add land'),array('controller' => 'Proposals','action' => 'edit_land',$proposal_view['Proposal']['id']));?>
			</div>
    	</div>
	</div>
<?php } ?>
	
	
	
	
	
	
	
	
	
<!---------------------------------------------EXTRAS---------------------------------------------------->

<?php if (!empty($proposal_view['MyBoughtExtra'])){ ?>	
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Extras');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_extras_view as $x) { ?>
	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-6">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<u><b><?php echo $x['MyExtra']['name']; ?></b></u>
			&middot;
			<?php echo $this->Html->link(__('Edit'),array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?>
			&middot;
			<?php if ($x['MyExtra']['bool_custom']){
				echo $this->Form->postLink(__('Delete'),array('controller' => 'Proposals','action' => 'delete_custom_extra',$x['MyBoughtExtra']['id']),array('confirm'=>'Are you sure?'));
			}else{
				echo $this->Form->postLink(__('Delete'),array('controller' => 'BoughtExtras','action' => 'delete',$x['MyBoughtExtra']['id']),array('confirm'=>'Are you sure?'));
			} ?>
		</div>
		
		<div class="col-md-2">
			<?php if (!empty($x['MyExtra']['picture'])){ 
				echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); 
			} ?>
		</div>
		
		<div class="col-md-2"></div>
	</div>
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-8">
			<?php echo $x['MyExtra']['description']; ?>
		</div>
		
		<div class="col-md-2"> </div>
	</div>
	
	<div class="row">
		<div class="col-md-8" align=right>
			<b><?php echo __('Price'); ?></b>
		</div>
		
		<div class="col-md-2">
			<?php echo $x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €'; ?>
		</div>
		
		<div class="col-md-2"> </div>
	</div>
	<hr>
<?php } ?>

<div class="row">
	<div class="col-md-11" align=right>
		<?php echo $this->Html->link(__('Add extras'),array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?>
		&middot;
        <?php echo $this->Html->link(__('Add custom extra'),array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?>
	</div>
	
	<div class="col-md-1"></div>

</div>

	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="CategorieTitleBox" align=center>
			<div id="AddExtra">
        		<?php echo $this->Html->link(__('Add extras'),array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?>
       			&middot;
       			<?php echo $this->Html->link(__('Add custom extra'),array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?>
        	</div>
   		</div>
   	</div>
<?php } ?>
    	









	
	
	
<!---------------------------------------------EXTERNAL EXTRAS---------------------------------------------------->

<?php if (!empty($proposal_view['MyBoughtExtra'])){ ?>	
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'External Extras');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_external_extras_view as $x) { ?>
	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-6">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<u><b><?php echo $x['MyExtra']['name']; ?></b></u>
			&middot;
			<?php echo $this->Html->link(__('Edit'),array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?>
			&middot;
			<?php if ($x['MyExtra']['bool_custom']){
				echo $this->Form->postLink(__('Delete'),array('controller' => 'Proposals','action' => 'delete_custom_extra',$x['MyBoughtExtra']['id']),array('confirm'=>'Are you sure?'));
			}else{
				echo $this->Form->postLink(__('Delete'),array('controller' => 'BoughtExtras','action' => 'delete',$x['MyBoughtExtra']['id']),array('confirm'=>'Are you sure?'));
			} ?>
		</div>
		
		<div class="col-md-2">
			<?php if (!empty($x['MyExtra']['picture'])){ 
				echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); 
			} ?>
		</div>
		
		<div class="col-md-2"></div>
	</div>
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-8">
			<?php echo $x['MyExtra']['description']; ?>
		</div>
		
		<div class="col-md-2"> </div>
	</div>
	
	<div class="row">
		<div class="col-md-8" align=right>
			<b><?php echo __('Price'); ?></b>
		</div>
		
		<div class="col-md-2">
			<?php echo $x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €'; ?>
		</div>
		
		<div class="col-md-2"> </div>
	</div>
	<hr>
<?php } ?>

<div class="row">
	<div class="col-md-11" align=right>
		<?php echo $this->Html->link(__('Add external extras'),array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],1));?>
		&middot;
        <?php echo $this->Html->link(__('Add custom external extra'),array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],1));?>
	</div>
	
	<div class="col-md-1"></div>

</div>

	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="CategorieTitleBox" align=center>
			<div id="AddExtra">
        		<?php echo $this->Html->link(__('Add external extras'),array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],1));?>
       			&middot;
       			<?php echo $this->Html->link(__('Add custom external extra'),array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],1));?>
        	</div>
   		</div>
   	</div>
<?php } ?>
    	








    	
