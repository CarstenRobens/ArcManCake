<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Houses','action'=>'index')) ?>
</div>
	

	<div class="row">
		<div class="col-md-8">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title">
					<?php echo __( 'House').': '.$house_view['House']['name'];?>
				</h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT-------------->			
	<div class="row"id=" ">
	<?php if(true){?>
        
        <?php if ($current_user['role'] < 2 && !empty($current_user)) {?>
			<a title="<?php echo __('Picture');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" href=<?php echo $this->Html->url(array('controller'=>'HousePictures', 'action' => 'index', $house_view['House']['id']));?> ><span class="glyphicon glyphicon-picture"></span></a>
			<a title="<?php echo __('Edit');?>" alt="<?php echo $company['name'].': '.$company['keywords'];?>" href=<?php echo $this->Html->url(array('action' => 'edit', $house_view['House']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
			<?php if(empty($house_view['House']['spec_pdf'])){
								echo $this->Html->link('PDF hinzufügen', array('controller'=>'Houses','action'=>'add_pdf',$house_view['House']['id'])); 
							}else{
								echo $this->Html->link('PDF löschen', array('controller'=>'Houses','action'=>'delete_pdf',$house_view['House']['id']),array('class'=>'remove', 'escape'=>false, 'title'=>__('Delete'))); 
							}?> 
		<?php } ?> 
        
        <div class="col-md-1">
			<div class="row">
				
			</div>
        </div>
		<div class="col-md-10">
			
			<div class="row" style="text-align:left;">
				<strong >
					<?php echo __('Size:'); ?>
				</strong >
				<?php echo $house_view['House']['size'].__(' m<sup>2</sup> in ').$house_view['House']['floors'].__(' floors.');?>
				
				<br>
				<strong >
					<?php echo __('Size according to DIN 227:'); ?>
				</strong >
				<?php echo $house_view['House']['size_din'].__(' m<sup>2</sup>');?>
				
				<span style="float:right;">
					<?php if($house_view['House']['bool_duplex']){ ?>
						 <?php echo __('Duplex')?> 
					<?php } ?>
				</span>
			</div>
			<br>
			<div class="row">
			
					<?php if(!empty($house_pictures_view)){
					foreach ($house_pictures_view as $x){
						if($x['type_flag']==0){
							echo $this->Html->image('/img/uploads/houses/'.$x['picture'], array('class' => 'featurette-image img-responsive'));
							break;
						}
					}
					} ?>
				
			</div>
			<br>
			<div class="row">
				<strong > <?php echo __('Description:'); ?> </strong>
				<?php echo $this->Text->autoParagraph($house_view['House']['description']); ?> 
				
				<?php if ($current_user['role'] < 3 && !empty($current_user)) {?>
					<?php if(!empty($house_view['House']['spec_pdf'])){ ?>
						<strong> <?php echo __('Detaillierte Informationen: '); ?> </strong>
						<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" href="<?php echo $this->Html->url(array('controller'=>'Houses','action'=>'download_file', $house_view['House']['id'])); ?>"> <?php echo $this->Html->image('pdf.thumbnail.jpg', array('alt' => __('Summary'), 'height'=>30 ));?> </a>
					<?php }?>
				<?php } ?>
			</div>
			
			<div class="row">
				<div class="col-xs-9">  </div>
				
				<div class="col-md-1" align=right>
					<strong><?php echo __('Price'); ?></strong>
				</div>
				
				<div class="col-md-2">
					<?php echo $this->Number->currency($house_view['House']['price'],'EUR',array('wholePosition'=>'after')); ?>
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
					<?php foreach ($house_pictures_view as $x){
						if($x['type_flag']==0){?>
							<div class="col-md-6">
							<?php 
							echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
								'/img/uploads/houses/'.$x['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['name'].': '.$x['description'])
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
					<?php foreach ($house_pictures_view as $x){
						if($x['type_flag']==-10){ ?>
							<div class="col-md-6">
							<?php echo $this->Html->link(
								$this->Html->image('/img/uploads/houses/'.$x['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )),
								'/img/uploads/houses/'.$x['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['name'].': '.$x['description'])
							);?>
							</div>
						<?php }
					}?>
				</div>
			</div>
			</div>
			
		</div>
		<div style="text-align:center;"><strong><?php echo __('Interested?').' '.$this->Html->link(__('Contact us!'),'mailto:'.$eMail['contact'].'?subject='.__('House:').' '.$house_view['House']['name'],array('target'=>'blank')) ?> </strong></div>
		
				
	</div>
