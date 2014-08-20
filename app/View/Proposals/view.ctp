<?php 
$enlargement=0;
foreach($bought_extras_view as $index=>$x){
	if($x['MyExtra']['size_dependent_flag']>0){
		$enlargement=$x['MyExtra']['size_dependent_flag'];
	}
}
?>
	
	<div class="CategorieTitleBox">
        <div id="Proposal">
        	<?php echo __( $proposal_view['Proposal']['name'].'<small> for '.$proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'].'</small>',false);?>
        </div>
    </div>
    
    
    	
<?php if (!empty($proposal_view['Proposal']['notes'])){ ?>
    <div class="row">
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Notes'); ?></strong>
		</div>
		
		<div class="col-md-10">
			<?php echo $proposal_view['Proposal']['notes']; ?>
		</div>
		
		<div class="col-md-1">
		</div>
    </div>
<?php } ?>
    
    
	<hr >

	
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'view',$proposal_view['MyCustomer']['id'])) ?>
		</div>
		<div class="col-md-6" align="right">
			<?php if(!empty($proposal_view['Proposal']['summary'])){ ?>
				<strong> <?php echo __('Summary'); ?> </strong>
				<a href="<?php echo $this->Html->url('/'.$proposal_view['Proposal']['summary']); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Summary'), 'height'=>30 ));?> </a>
			<?php }
			if(!empty($proposal_view['Proposal']['bank_receipt'])){ ?>
				<strong> <?php echo __('Bank receipt'); ?> </strong>
				<a href="<?php echo $this->Html->url('/'.$proposal_view['Proposal']['bank_receipt']); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Bank receipt'), 'height'=>20 ));?> </a>
			<?php  }
			if(!empty($proposal_view['Proposal']['contract'])){ ?>
				<strong> <?php echo __('Contract'); ?> </strong>
				<a href="<?php echo $this->Html->url('/'.$proposal_view['Proposal']['contract']); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Contract'), 'height'=>30 ));?> </a>
			<?php } ?>
		</div>
	</div>
	
	
	
	
<!---------------------------------------------HOUSE---------------------------------------------------->

<?php 
foreach ($normal_house_pictures_view as $x){
	if ($x['MyHousePicture']['id']==$proposal_view['Proposal']['default_house_picture_id']){
		$default_picture=$x['MyHousePicture'];
	}else{
		echo $this->Html->link('','/img/uploads/houses/'.$x['MyHousePicture']['picture'],
				array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['description'])
		);
	}
}
foreach ($basement_house_pictures_view as $key=>$x){
if ($key==0){
		$base_first=$x['MyHousePicture'];
	}else{
		echo $this->Html->link('','/img/uploads/houses/'.$x['MyHousePicture']['picture'],
				array('escape'=>false,'data-lightbox'=>'base_pics','data-title'=>$house_pic_type[$x['MyHousePicture']['type_flag']].': '.$x['MyHousePicture']['description'])
		);
	}
}
foreach ($floorplan_house_pictures_view as $key=>$x){
	if ($key==0){
		$floor_first=$x['MyHousePicture'];
	}else{
		echo $this->Html->link('','/img/uploads/houses/'.$x['MyHousePicture']['picture'],
				array('escape'=>false,'data-lightbox'=>'floor_pics','data-title'=>$house_pic_type[$x['MyHousePicture']['type_flag']].': '.$x['MyHousePicture']['description'])
		);
	}
}?>
	
	
<?php if (!empty($proposal_view['MyHouse']['id'])){ ?>	
	<div class="row">
		<div class="col-md-8">
		<div class="panel panel-success">
		
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'House');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT-------------->			
	<div class="row"id=" ">
	<?php if(true){?>
        
        
        
        <div class="col-md-1">
			<div class="row">
				
			</div>
        </div>
		<div class="col-md-10">
        <div class="row">
		
			
				<?php echo $this->Html->link(
				    $this->Html->image('uploads/houses/'.$default_picture['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" ")),
					'/img/uploads/houses/'.$default_picture['picture'],
					array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$default_picture['description'])
				); ?>
			
		</div>
		
		
			<div class="row">
				<div class="col-md-4"> <strong><?php echo $proposal_view['MyHouse']['name']; ?> </strong></div>
				<div class="col-md-4"> 
					<a href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
				</div>
				<div class="col-md-4"></div> 
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Type:'); ?> </div>  
				<div class="col-xs-8"> <?php echo $proposal_view['MyHouse']['type']; ?> </div>
			</div>
			<div class="row">
				<div class="col-xs-4"> <?php echo __('Size:'); ?> </div>  
				<div class="col-xs-8"> 
					<?php if($enlargement>0){
						echo $proposal_view['MyHouse']['size'].' + '.$enlargement*$proposal_view['MyHouse']['floors'].__(' floors.').__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
					}else{
						echo $proposal_view['MyHouse']['size'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
					}?>
				</div>
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
		
		<div class="col-md-1"></div>
		<?php } ?>
	</div>			
	
	
	
	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
		<div class="col-md-4">
			<div class="row">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo __( 'Gallery');?></h3>
				</div>
				<div class="panel-body">
					<?php 
					foreach ($normal_house_pictures_view as $x){
						if ($x['MyHousePicture']['id']==$proposal_view['Proposal']['default_house_picture_id']){
							$default_picture=$x['MyHousePicture'];
						}else{?>
							<div class="col-md-6">
							<?php 
							echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" ")),
								'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['description'])
							);?>
							</div>
							<?php 
						}
					}?>
					
				</div>
			</div>
			</div>

			<div class="row">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo __( 'Floorplans');?></h3>
				</div>
				<div class="panel-body">
					<?php 
					foreach ($floorplan_house_pictures_view as $key=>$x){
						if ($key==0){
							$floor_first=$x['MyHousePicture'];
						}else{?>
							<div class="col-md-6">
							<?php 
							echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" ")),
								'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['description'])
							);?>
							</div>
							<?php 
							
						}
					}
					foreach ($basement_house_pictures_view as $key=>$x){
					if ($key==0){
							$base_first=$x['MyHousePicture'];
						}else{?>
							<div class="col-md-6">
							<?php
							echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" ")),
								'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['description'])
							);?>
							</div>
							<?php 
						}
					}
					?>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	
<?php }else{ ?>
	<div class="row">
		<div id="AddHouse" align=center>
       		<p><a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']))?> ><span class="glyphicon glyphicon-plus"></span> Add house</a></p>
       	</div>
	</div>
	<hr>
<?php } ?>
   
    	

	
	
	




<!---------------------------------------------EXTRAS---------------------------------------------------->

<?php if (!empty($bought_extras_view)){ ?>	
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Extras');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_extras_view as $index=>$x) { ?>
	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-4">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index;?>">
				<strong><?php echo $x['MyExtra']['name']; ?></strong>
			</a>
		</div>
		<div class="col-md-3" align=right>
			<?php if (!$x['MyExtra']['bool_uneditable']){?>
				<a href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			<?php }?>
			
			<?php if ($x['MyExtra']['bool_custom']){?>
				<a href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'delete_custom_extra',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
			<?php }else{ ?>
				<a href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'delete',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
			<?php } ?>
		</div>
		
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Price'); ?></strong>
		</div>
		
		<div class="col-md-2">
			<?php
			if ($x['MyExtra']['size_dependent_flag']==-2){ 
				echo ($proposal_view['MyHouse']['size']/$proposal_view['MyHouse']['floors']+$enlargement)*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €';
			}elseif ($x['MyExtra']['size_dependent_flag']==-1){ 
				echo ($proposal_view['MyHouse']['size']+$enlargement*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €';
			}elseif($x['MyExtra']['size_dependent_flag']>0){
				echo ($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'].' €';
			}else{
				echo $x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €';
			}
			?>
		</div>
	</div>
	
	<div id="collapse<?php echo $index;?>" class="panel-collapse collapse out">
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-<?php if (!empty($x['MyExtra']['picture'])){ echo '6';}else{ echo '8';}?>">
			<?php echo $x['MyExtra']['description']; ?>
		</div>
		
		<?php if (!empty($x['MyExtra']['picture'])){ ?>
			<div class="col-md-2">
				<?php echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); ?> 
			</div>
		<?php } ?>
				
		<div class="col-md-2"> </div>
	</div>
	</div>

	<hr>
<?php } ?>

<div class="row">
	<div class="col-md-12" align=right>
		<a class="btn btn-success" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?>><span class="glyphicon glyphicon-plus"></span></a>
		<a class="btn btn-success" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?>><span class="glyphicon glyphicon-paperclip"> </span> <?php echo __('Custom'); ?></a>
		<?php if($enlargement==0){?>
			<a class="btn btn-success" id="launch_enlarge_house" href=# data-toggle="modal" data-target="#enlargeModal"><span class="glyphicon glyphicon-fullscreen"> </span> <?php echo __('Enlarge house'); ?></a>
		<?php }?>
	</div>
	
	<div class="col-md-0"></div>

</div>

	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="col-md-12">
		<div id="AddExtra" align=center>
       		<a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?> ><span class="glyphicon glyphicon-plus"></span> Add extras</a>
       		<a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?> ><span class="glyphicon glyphicon-paperclip"></span> Add custom extra</a>
       		<a class="btn btn-lg btn-success" id="launch_enlarge_house" href=# data-toggle="modal" data-target="#enlargeModal"><span class="glyphicon glyphicon-fullscreen"> </span> <?php echo __('Enlarge house'); ?></a>
       	</div>
		</div>
	</div>
	<hr>
<?php } ?>
    	









	
	
	
<!---------------------------------------------EXTERNAL EXTRAS---------------------------------------------------->

<?php if (!empty($bought_external_extras_view)){ ?>	
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'External Extras');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_external_extras_view as $index=>$x) { ?>
	<div class="row">
		<div class="col-md-2"></div>
		
		<div class="col-md-4">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseExt<?php echo $index;?>">
				<strong><?php echo $x['MyExtra']['name']; ?></strong>
			</a>
		</div>
		<div class="col-md-3" align=right>
			<a href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			
		</div>
		
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Price'); ?></strong>
		</div>
		
		<div class="col-md-2">
			<?php echo $x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'].' €'; ?>
		</div>
		
	</div>
	
	<div id="collapseExt<?php echo $index;?>" class="panel-collapse collapse out">
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-<?php if (!empty($x['MyExtra']['picture'])){ echo '6';}else{ echo '8';}?>">
			<?php echo $x['MyExtra']['description']; ?>
		</div>
		
		<?php if (!empty($x['MyExtra']['picture'])){ ?>
			<div class="col-md-2">
				<?php echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); ?> 
			</div>
		<?php } ?>
		
		<div class="col-md-2"> </div>
	</div>
	</div>
	
	<hr>
<?php } ?>


	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="col-md-12">
		<div id="AddExtra" align=center>
       		<p><a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],1));?> ><span class="glyphicon glyphicon-plus"></span> Add external extras</a></p>
       		<p><a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],1));?> ><span class="glyphicon glyphicon-plus"></span> Add custom external extra</a></p>
       	</div>
		</div>
	</div>
	<hr>
<?php } ?>
    	







<!---------------------------------------------LAND------------------------------------------------------>
	
<?php if (!empty($proposal_view['MyLand']['id'])){ ?>		
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Land');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-5">
			<strong id="foo" ><?php echo $proposal_view['MyLand']['name']; ?></strong> 
			<select id="bar" style="display:none;"></select> 
		</div>
		
		<div class="col-md-2" align=right> 
			<a id="launch_land_modal" href=# data-toggle="modal" data-target="#landModal"><span class="glyphicon glyphicon-edit"></span></a>
			
		</div>
		
		<div class="col-md-1"> </div>
		
		<div class="col-md-2"> </div>
		
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
					<strong><?php echo __('Land Size'); ?></strong>
					<p align=right><?php echo $proposal_view['MyLand']['land_size'].' m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					<strong><?php echo __('Land Price'); ?></strong>
					<p align=right><?php echo $proposal_view['MyLand']['land_price_per_m2'].' €/m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					.
					<p align=right><?php echo $proposal_view['MyLand']['land_price_per_m2']*$proposal_view['MyLand']['land_size'].' €'; ?></p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4">
					<strong><?php echo __('Dev. Size'); ?></strong>
					<p align=right><?php echo $proposal_view['MyLand']['dev_size'].' m<sup>2</sup>'; ?></p>
				</div>
				<div class="col-md-4">
					<strong><?php echo __('Dev. Cost'); ?></strong>
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
					<strong><?php echo __('Land Agent Cost'); ?></strong>
					<p align=right><?php echo $proposal_view['MyLand']['land_agent_cost'].' %'; ?></p>
					<strong><?php echo __('Notary Cost'); ?></strong>
					<p align=right><?php echo $proposal_view['MyLand']['notary_cost'].' %'; ?></p>
					<strong><?php echo __('Tax'); ?></strong>
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
					<strong><?php echo __('Subtotal'); ?></strong>
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
					<strong><?php echo __('Total'); ?></strong>
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
	
	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="col-md-12">
		<div id="AddLand" align=center>
       		<p><a class="btn btn-lg btn-success" id="launch_land_modal" href=# data-toggle="modal" data-target="#landModal" > <span class="glyphicon glyphicon-plus"></span> Add land</a></p>
       	</div>
		</div>
	</div>
	<hr>
<?php } ?>






<!-----------------MODALS-------------------->
<!-----LAND------>
<div class="modal fade" id="landModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" >Select Land</h3>
      </div>
      <div class="modal-body">
      
      <select id="land_list"></select> 
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="save_land" type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>



<!-----ENLARGE------>
<div class="modal fade" id="enlargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h3 class="modal-title" ><?php echo __('House enlargement:')?></h3>
      </div>
      <div class="modal-body">
      
      <strong><?php echo __('Enlargement (in  m<sup>2</sup>):');?></strong> 
      <textarea id="text_enlarge" rows="1">10</textarea>
      
      <strong><?php echo __('Price (in € / m<sup>2</sup>):');?></strong> 
      <textarea id="text_enlarge_price" rows="1">1</textarea>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="save_enlarge" type="button" class="btn btn-success">Enlarge</button>
      </div>
    </div>
  </div>
</div>

   


<!-----------------SCRIPTS-------------------->
<script>
	$( "#launch_land_modal" ).click(function() {
		var formData =	{customer_id:"<?php echo $proposal_view['MyCustomer']['id'];?>"}
		
		$.ajax({
			url: "<?php echo $this->Html->url(array('controller'=>'Lands','action'=>'all_names')); ?>.json",
			type: "POST",
			data: formData,
			success: function(response) {
				var arr = response.land_list_view
				$(arr).each(function() {
					$('#land_list').append($("<option>").attr('value',this[0]).text(this[1]));
				});
			}
		})
	})		
			         
	$("#save_land").click(function(){
		var selection=$('#land_list option:selected').attr('value')
		var formData =	{proposal_id:"<?php echo $proposal_view['Proposal']['id'];?>" , land_id:selection}
				
		$.ajax({
			url: "<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'selected_land')); ?>.json",
			type: "POST",
			data: formData,
			success: function(response) {
				alert(response.confirmation)
				location.reload()
			}
		});
	})
</script>

<script>
$("#save_enlarge").click(function(){
	var enlargement=parseInt($("#text_enlarge").val())
	var price = parseInt($("#text_enlarge_price").val())
	
	var formData =	{proposal_id:"<?php echo $proposal_view['Proposal']['id'];?>" , default_price:price, enlargement:enlargement}
			
	$.ajax({
		url: "<?php echo $this->Html->url(array('controller'=>'Extras','action'=>'add_enlarge_extra')); ?>.json",
		type: "POST",
		data: formData,
		success: function(response) {
			alert(response.confirmation)
			location.reload()
		}
	});
})
</script>


