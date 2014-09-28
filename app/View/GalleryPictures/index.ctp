<div class="row">
	<br>
	<h3><?php echo __('Portfolio'); ?></h3>
</div>

<div class="row">
	<div class="col-md-1"></div>
	
	<div class="col-md-10" align=center>
		<?php for($j=0; $j<=count($gallery_pictures_view)-1; $j++) {
			if (($j % 4) ==0){ ?>
				<div class="row">
				<?php for ($i=0; $i<=3; $i++){ ?>
					<div class="col-md-3" align=center>
						<?php if (!empty($gallery_pictures_view[$j+$i])){
							echo $this->Html->link(
								$this->Html->image('/img/uploads/gallery/'.$gallery_pictures_view[$j+$i]['GalleryPicture']['picture'], array('class' => 'featurette-image img-responsive')),
								'/img/uploads/gallery/'.$gallery_pictures_view[$j+$i]['GalleryPicture']['picture'],
								array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$gallery_pictures_view[$j+$i]['GalleryPicture']['description'].': '.$gallery_pictures_view[$j+$i]['GalleryPicture']['description'])
							);
							if($current_user['role']<2 && !empty($current_user)){
								echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HousePictures','action' => 'delete',$gallery_pictures_view[$j+$i]['GalleryPicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false, 'title'=>__('Delete')));
							}
							echo ' '.$gallery_pictures_view[$j+$i]['GalleryPicture']['title'].': '.$gallery_pictures_view[$j+$i]['GalleryPicture']['description'];
						}?>
					</div>
				<?php }?>
				</div>
			<?php }
		}?>
		
		<div class="row">
			
		</div>
	</div>
	
	<div class="col-md-1"></div>
	
</div>
	

<?php if ($current_user['role'] < 2 && !empty($current_user) ) {?>
<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
					<legend>
						<?php echo __('Add a portfolio picture'); ?>
					</legend>
					<?php 
					echo $this->Form->create('GalleryPicture',array('class' => 'form-horizontal','enctype'=>'multipart/form-data'));
					
					echo $this->Form->input('title',array('placeholder' => __('Enter the title'),'label' => __('Title'),'div' => 'form-group has-success'));
					echo $this->Form->input('description',array('placeholder' => __('Enter the description'),'label' => __('Description'),'div' => 'form-group has-success'));
					echo $this->Form->input('upload', array('type' => 'file','label' => __('Picture'),'div' => 'form-group has-success'));
					?>
				</div>
			</div>
		</div>
		<p style="clear: both;"> </p>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
		</div>
	</div>
</div>
<?php }?>


