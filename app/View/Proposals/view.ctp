<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Customers','action'=>'view',$proposal_view['MyCustomer']['id'])) ?>
</div>

<div class="row">
	<h3><?php echo __( $proposal_view['Proposal']['name'].'<small> for '.$proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'].'</small>',false);?></h3>
</div>

<?php if (!empty($proposal_view['Proposal']['notes'])){ ?>
    <div class="row">
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Notes'); ?></strong>
		</div>
		
		<div class="col-md-10">
			<?php echo $proposal_view['Proposal']['notes']; ?>
		</div>
		
		<div class="col-md-1" style="text-align:right">
		<?php if ($proposal_view['Proposal']['bool_locked']==1){
			$string=__('Unlock');
			$button= 'danger';
		}else{
			$string=__('Lock');
			$button= 'success';
		}?>
		<?php if ($current_user['role']<3) {?>
		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-xs btn-<?php echo $button;?>" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'toggle_lock',$proposal_view['Proposal']['id']));?> ><span class="glyphicon glyphicon-lock"> <?php echo $string;?></span></a>
		<?php }?>
		</div>
    </div>
<?php } ?>
    
    
	<hr >

	<?php if ($current_user['role']<3) {?>
	<div class="row">
		<div class="col-md-7">
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-md btn-success locked doc" target="_blank" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'gen_summary',$proposal_view['Proposal']['id']));?> ><span class="glyphicon glyphicon-list-alt"></span> <?php echo __('Generate summary');?></a>
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-md btn-success locked doc" target="_blank" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'gen_bank_receipt',$proposal_view['Proposal']['id']));?> ><span class="glyphicon glyphicon-euro"></span> <?php echo __('Generate bank receipt');?></a>
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-md btn-success locked doc" target="_blank" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'gen_contract',$proposal_view['Proposal']['id']));?> ><span class="glyphicon glyphicon-pencil"></span> <?php echo __('Generate contract');?></a>
		</div>
		<script>
		$('.doc').click(function(){
			location.reload()
		});
	
		</script>
		<div class="col-md-5" align="right">
			<?php if(!empty($proposal_view['Proposal']['summary'])){ ?>
				<strong> <?php echo __('Summary'); ?> </strong>
				<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" href="<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'download_file', 1, $proposal_view['Proposal']['id'])); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Summary'), 'height'=>30 ));?> </a>
			<?php }
			if(!empty($proposal_view['Proposal']['bank_receipt'])){ ?>
				<strong> <?php echo __('Bank receipt'); ?> </strong>
				<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" href="<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'download_file', 2, $proposal_view['Proposal']['id'])); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Bank receipt'), 'height'=>30 ));?> </a>
			<?php  }
			if(!empty($proposal_view['Proposal']['contract'])){ ?>
				<strong> <?php echo __('Contract'); ?> </strong>
				<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" href="<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'download_file', 3, $proposal_view['Proposal']['id'])); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Contract'), 'height'=>30 ));?> </a>
			<?php } ?>
		</div>
	</div>
	<?php }?>
	
	
	
	
<!---------------------------------------------HOUSE---------------------------------------------------->

<?php 
foreach ($normal_house_pictures_view as $x){
	if ($x['MyHousePicture']['id']==$proposal_view['Proposal']['default_house_picture_id']){
		$default_picture=$x['MyHousePicture'];
		break;
	}
}?>
	
	
<?php if (!empty($proposal_view['MyHouse']['id'])){ ?>	
	<div class="row">
		<div class="col-md-8">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title" style="text-align:left;">
					<?php echo __( 'House').': '.$proposal_view['MyHouse']['name'];?>
					<?php if ($current_user['role']<3) {?>
					<a title="<?php echo __('Change house');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" style="float:right;" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']));?> ><span  class="glyphicon glyphicon-random"></span></a>
					<?php }?>
				</h3>
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
			
			<div class="row" style="text-align:left;">
				<strong >
					<?php echo __('Size:'); ?>
				</strong >
				<?php if($enlargement>0){
					echo $proposal_view['MyHouse']['size'].' + '.$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}elseif($enlargement<0){
					echo $proposal_view['MyHouse']['size'].' - '.-1*$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}else{
					echo $proposal_view['MyHouse']['size'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}?>
				<br>
				<strong >
					<?php echo __('Size according to DIN 227:'); ?>
				</strong >
				<?php if($enlargement>0){
					echo $proposal_view['MyHouse']['size_din'].' + '.$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup>');
				}elseif($enlargement<0){
					echo $proposal_view['MyHouse']['size_din'].' - '.-1*$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup>');
				}else{
					echo $proposal_view['MyHouse']['size_din'].__(' m<sup>2</sup>');
				}?>
				
				
				<span style="float:right;">
					<?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']].' '.__('side'); 
					} ?>
				</span>
				
			</div>
			<br>
			<div class="row">
				<?php if(!empty($default_picture)){ 
					echo $this->Html->link(
						$this->Html->image('uploads/houses/'.$default_picture['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
						'/img/uploads/houses/'.$default_picture['picture'],
						array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$default_picture['description'])); 
				}?>
			</div>
			<br>
			<div class="row">
				<strong > <?php echo __('Description:'); ?> </strong>
				<?php echo $this->Text->autoParagraph($proposal_view['MyHouse']['description']); ?> 
			</div>
			
			
			
			
			
			<div class="row">
				<div class="col-xs-9">  </div>
				
				<div class="col-md-1" align=right>
					<strong><?php echo __('Price'); ?></strong>
				</div>
				
				<div class="col-md-2">
					<?php echo $this->Number->currency($proposal_view['MyHouse']['price'],'EUR',array('wholePosition'=>'after')); ?>
				</div>
				
				
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
						if ($x['MyHousePicture']['id']!=$proposal_view['Proposal']['default_house_picture_id']){?>
							<div class="col-md-6">
							<?php 
							echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
								'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description'])
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
					foreach ($floorplan_house_pictures_view as $key=>$x){ ?>
						<div class="col-md-6">
						<?php 
						echo $this->Html->link(
							$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
							'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
							array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description'])
						);?>
						</div>
					<?php }
					if ($bool_basement){
						foreach ($basement_house_pictures_view as $key=>$x){?>
							<div class="col-md-6">
								<?php echo $this->Html->link(
									$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
									'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
									array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description'])
								);?>
							</div>
						<?php } 
					}else{
						foreach ($sideview_nobasement_house_pictures_view as $key=>$x){?>
							<div class="col-md-6">
								<?php echo $this->Html->link(
									$this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
									'/img/uploads/houses/'.$x['MyHousePicture']['picture'],
									array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description'])
									);?>
							</div>
						<?php } 
					}?>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	
<?php }else{ ?>
	<div class="row">
		<div id="AddHouse" align=center>
       		<p><a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']))?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add house');?></a></p>
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
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index;?>">
				<strong><?php echo $x['MyExtra']['name']; ?></strong>
			</a>
		</div>
		<div class="col-md-3" align=right>
		<?php if ($current_user['role']<3) {?>
			<?php if (!$x['MyExtra']['bool_uneditable']){?>
				<a title="<?php echo __('Edit');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			<?php }?>
			
			<?php if ($x['MyExtra']['bool_custom']){?>
				<a title="<?php echo __('Delete');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'delete_custom_extra',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
			<?php }else{ ?>
				<a title="<?php echo __('Delete');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'delete',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
			<?php } ?>
		<?php }?>
		</div>
		
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Price'); ?></strong>
		</div>
		
		<div class="col-md-2">
			<?php
			if ($x['MyExtra']['size_dependent_flag']==-2){ 
				echo $this->Number->currency(($proposal_view['MyHouse']['size_din']+$enlargement*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
			}elseif ($x['MyExtra']['size_dependent_flag']==-1){ 
				echo $this->Number->currency(($proposal_view['MyHouse']['size_din']/$proposal_view['MyHouse']['floors']+$enlargement)*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
			}elseif($x['MyExtra']['size_dependent_flag']>0){
				echo $this->Number->currency(($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
			}else{
				echo $this->Number->currency($x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
			}
			?>
		</div>
	</div>
	
	<div id="collapse<?php echo $index;?>" class="panel-collapse collapse out">
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-<?php if (!empty($x['MyExtra']['picture'])){ echo '6';}else{ echo '8';}?>">
			
			<?php echo $this->Text->autoParagraph($x['MyExtra']['description']);
			if(!empty($x['MyBoughtExtra']['comment'])){ 
				echo '<strong>'.__('Comment:').' </strong>'.$this->Text->autoParagraph($x['MyBoughtExtra']['comment']); 
			}
			if($x['MyBoughtExtra']['factor']!=1){ ?>
				<p> <?php echo $x['MyBoughtExtra']['factor'].' '.$extra_unit['factor'][$x['MyExtra']['units']]; ?> </p>
			<?php }?>
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

<?php if ($current_user['role']<3) {?>
<div class="row">
	<div class="col-md-12" align=right>
		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?>><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add'); ?></a>
		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?>><span class="glyphicon glyphicon-paperclip"> </span> <?php echo __('Custom'); ?></a>
		<?php if($enlargement==0){?>
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-success locked" id="launch_enlarge_house" href=# data-toggle="modal" data-target="#enlargeModal"><span class="glyphicon glyphicon-resize-full"> </span> <?php echo __('Enlarge house'); ?></a>
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-success locked" id="launch_shrink_house" href=# data-toggle="modal" data-target="#shrinkModal"><span class="glyphicon glyphicon-resize-small"> </span> <?php echo __('Shrink house'); ?></a>
		<?php }?>
	</div>
	
	<div class="col-md-0"></div>

</div>
<?php }?>

	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="col-md-12">
		<div id="AddExtra" align=center>
       		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],0));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add extras');?></a>
       		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],0));?> ><span class="glyphicon glyphicon-paperclip"></span> <?php echo __('Add custom extra');?></a>
       		<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" id="launch_enlarge_house" href=# data-toggle="modal" data-target="#enlargeModal"><span class="glyphicon glyphicon-fullscreen"> </span> <?php echo __('Enlarge house'); ?></a>
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" id="launch_shrink_house" href=# data-toggle="modal" data-target="#shrinkModal"><span class="glyphicon glyphicon-resize-small"> </span> <?php echo __('Shrink house'); ?></a>
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
			<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseExt<?php echo $index;?>">
				<strong><?php echo $x['MyExtra']['name']; ?></strong>
			</a>
		</div>
		<div class="col-md-3" align=right>
		<?php if ($current_user['role']<3) {?>
			<?php if (!$x['MyExtra']['bool_uneditable']){?>
				<a title="<?php echo __('Edit');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'edit',$x['MyBoughtExtra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			<?php }?>
		<?php }?>
		</div>
		
		
		<div class="col-md-1" align=right>
			<strong><?php echo __('Price'); ?></strong>
		</div>
		
		<div class="col-md-2">
			<?php echo $this->Number->currency($x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after')); ?>
		</div>
		
	</div>
	
	<div id="collapseExt<?php echo $index;?>" class="panel-collapse collapse out">
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-<?php if (!empty($x['MyExtra']['picture'])){ echo '6';}else{ echo '8';}?>">
			<?php echo $this->Text->autoParagraph($x['MyExtra']['description']); ?>
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
       		<p><a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'BoughtExtras','action' => 'add_many_extras',$proposal_view['Proposal']['id'],1));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add external extras');?></a></p>
       		<p><a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" href=<?php echo $this->Html->url(array('controller' => 'Extras','action' => 'add_custom_extra',$proposal_view['Proposal']['id'],1));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add custom external extra');?></a></p>
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
           		<h3 class="panel-title" style="text-align:left;">
					<?php echo __( 'Land').': '.$proposal_view['MyLand']['name'];
					if ($current_user['role']<3) {?>
					<a title="<?php echo __('Change land');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" style="float:right" id="launch_land_modal" href=# data-toggle="modal" data-target="#landModal"><span class="glyphicon glyphicon-random"></span></a>
					<?php }?>
				</h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	<div class="row">
		<div class="col-md-1"> </div>
		
		<div class="col-md-3">
			<?php echo $proposal_view['MyLand']['built_address'];?><br>
			<?php echo $proposal_view['MyLand']['built_zipcode'].', '.$proposal_view['MyLand']['built_city'];?><br>
			<?php echo $proposal_view['MyLand']['built_region'];?><br>
			<strong><?php echo __('Construction office:');?> </strong>
			<?php echo $proposal_view['MyLand']['construction_office'];?>
		</div>
		
		<div class="col-md-1" style="padding-top:20px">
			<strong><?php if(!empty($proposal_view['MyLand']['notes'])){ echo __('Notes:');} ?></strong>
		</div>
		
		<div class="col-md-5" style="padding-top:20px">
			<?php if(!empty($proposal_view['MyLand']['notes'])){ echo $proposal_view['MyLand']['notes'];} ?>
		</div>
		
		<div class="col-md-2" align="center">
		<?php if ($current_user['role']<3) {?>
			<a title="<?php echo __('Edit');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" href="<?php echo $this->Html->url(array('controller' => 'Lands','action' => 'edit',$proposal_view['MyLand']['id']));?>"><span class="glyphicon glyphicon-edit"></span></a>
		<?php }?> 
		</div>
		
	</div>
	
	
	<div class="row">
		<div class="col-md-1"> </div>
		<div class="col-md-10">
				<table>
				
					<tr>
						<td >Grundstückskaufpreis Gem.:</td>
						<td style='text-align: right'><?php echo $proposal_view['MyLand']['land_size'];?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($proposal_view['MyLand']['land_price_per_m2'],'EUR',array('wholePosition'=>'after'));?>/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($subtotal=$proposal_view['MyLand']['land_size']*$proposal_view['MyLand']['land_price_per_m2'],'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
					<tr>
						<td>
							Notarkosten<br>
							Grunderwerbsteuer<br>
							Maklergebühren
						</td>
						<td style='text-align: right'>
							<?php echo $proposal_view['MyLand']['notary_cost'].'%';?><br>
							<?php echo $proposal_view['MyLand']['land_tax'].'%';?><br>
							<?php echo $proposal_view['MyLand']['land_agent_cost'].'%';?>
						</td>
						<td> </td>
						<td style='text-align: right'>
							<?php echo $this->Number->currency($proposal_view['MyLand']['notary_cost']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?><br>
							<?php echo $this->Number->currency($proposal_view['MyLand']['land_tax']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?><br>
							<?php echo $this->Number->currency($proposal_view['MyLand']['land_agent_cost']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?>
						</td>
						
					</tr>
					
					<tr>
						<td>Erschließungkosten</td>
						<td style='text-align: right'><?php echo $proposal_view['MyLand']['dev_size'];?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($proposal_view['MyLand']['dev_cost_per_m2'],'EUR',array('wholePosition'=>'after'));?>/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($subtotal_dev=$proposal_view['MyLand']['dev_size']*$proposal_view['MyLand']['dev_cost_per_m2'],'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
					<tr>
						<td>Bauzinsen 0,25%/Monat</td>
						<td style='text-align: right'><?php echo $proposal_view['MyLand']['building_tax'].'%';?></td>
						<td> </td>
						<td style='text-align: right'><?php echo $this->Number->currency($proposal_view['MyLand']['building_tax']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
				</table>
				
				<table>
					<tr>
						<th>Gesamtgrundstücksankauf mit Nebenkosten:</th>
						<th style='text-align: right'><?php echo $this->Number->currency($total_land=$subtotal_dev+$subtotal*(100+$proposal_view['MyLand']['notary_cost']+$proposal_view['MyLand']['land_tax']+$proposal_view['MyLand']['land_agent_cost'])/100,'EUR',array('wholePosition'=>'after'));?></th>
					</tr>
				</table>
			</div>
		
		<div class="col-md-1"> </div>
		
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
       		<p><a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="btn btn-lg btn-success locked" id="launch_land_modal" href=# data-toggle="modal" data-target="#landModal" > <span class="glyphicon glyphicon-plus"></span> <?php echo __('Add land');?></a></p>
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
        <h3 class="modal-title" ><?php echo __('Select Land');?></h3>
      </div>
      <div class="modal-body">
      
      <select id="land_list"></select> 
      
      </div>
      <div class="modal-footer">
		
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close');?></button>
        <a style="text-align:right" href=<?php echo $this->Html->url(array('controller' => 'Lands','action' => 'add_land_for_customer',$proposal_view['MyCustomer']['id']));?>>  <button type="button" class="btn btn-success" ><?php echo ('Grundstück erstellen');?></button></a>
		<button id="save_land" type="button" class="btn btn-success"><?php echo __('Save');?></button>
      </div>
    </div>
  </div>
</div>



<!-----ENLARGE------>
<div class="modal fade" id="enlargeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo __('Close');?></span></button>
        <h3 class="modal-title" ><?php echo __('House enlargement per floor:')?></h3>
      </div>
      <div class="modal-body">
      
      <strong><?php echo __('Enlargement (in  m<sup>2</sup>/floor):');?></strong> 
      <textarea id="text_enlarge" rows="1">10</textarea>
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close');?></button>
        <button id="save_enlarge" type="button" class="btn btn-success"><?php echo __('Enlarge');?></button>
      </div>
    </div>
  </div>
</div>


<!-----Shrink------>
<div class="modal fade" id="shrinkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?php echo __('Close');?></span></button>
        <h3 class="modal-title" ><?php echo __('House shrinking per floor:')?></h3>
      </div>
      <div class="modal-body">
      
      <strong><?php echo __('Shrinking (in  m<sup>2</sup>/floor):');?></strong> 
      <textarea id="text_shrink" rows="1">10</textarea>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close');?></button>
        <button id="save_shrink" type="button" class="btn btn-success"><?php echo __('Shrink');?></button>
      </div>
    </div>
  </div>
</div>

   


<!-----------------SCRIPTS-------------------->
<script>
	$( "#launch_land_modal" ).click(function() {
		var formData =	{customer_id:"<?php echo $proposal_view['MyCustomer']['id'];?>"}
		$('#land_list').find('option').remove()
		
		$.ajax({
			url: "<?php echo $this->Html->url(array('controller'=>'Lands','action'=>'all_names')); ?>.json",
			type: "POST",
			data: formData,
			success: function(response) {
				
				var arr = response.land_list_view
				$(arr).each(function() {
					$('#land_list').append($("<option>").attr('value',this[0]).text(this[1]));
				});
				$('#land_list option[value="<?php echo $proposal_view['MyLand']['id']?>"]').attr("selected", "selected");
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
	
	var formData =	{proposal_id:"<?php echo $proposal_view['Proposal']['id'];?>" , enlargement:enlargement}
			
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

$("#save_shrink").click(function(){
	var shrinking=parseInt($("#text_shrink").val())
	
	var formData =	{proposal_id:"<?php echo $proposal_view['Proposal']['id'];?>" , shrinking:shrinking}
			
	$.ajax({
		url: "<?php echo $this->Html->url(array('controller'=>'Extras','action'=>'add_shrink_extra')); ?>.json",
		type: "POST",
		data: formData,
		success: function(response) {
			alert(response.confirmation)
			location.reload()
		}
	});
})
</script>

<?php if($proposal_view['Proposal']['bool_locked']){?>
	<style>
		.locked{
			visibility:hidden
		}
	</style>
<?php }?>
