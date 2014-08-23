<h3>Home Pictures</h3>


<?php foreach($gallery_pictures_view as $x ){ ?>
	<div class="col-md-6">
		<?php echo $this->Html->link(
			$this->Html->image('/img/uploads/gallery/'.$x['GalleryPicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" ")),
			'/img/uploads/gallery/'.$x['GalleryPicture']['picture'],
			array('escape'=>false,'data-lightbox'=>'normal_pics','data-title'=>$x['GalleryPicture']['description'].': '.$x['GalleryPicture']['description'])
		);
		echo '<div align="center">'.$x['GalleryPicture']['title'].': '.$x['GalleryPicture']['description'].'</div>';?>
	</div>
<?php } ?>
	
	
	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Action</th>
		<th>Created</th>
	</tr>
 
	<?php foreach($gallery_pictures_view as $x ){ ?>
	<tr> 
		<td> <?php echo $x['GalleryPicture']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['GalleryPicture']['title'], array('controller'=>'GalleryPictures','action'=>'view',$x['GalleryPicture']['id'])); ?></td>
		<td> <?php 
            echo $this->Form->postLink('Delete',array('controller' => 'GalleryPictures','action' => 'delete',$x['GalleryPicture']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['GalleryPicture']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php } ?>
</table>


<?php 
if ($current_user['role'] < 2 && !empty($current_user) ) {?>

	<h3>Add a gallery picture</h3>

	<?php 
	echo $this->Form->create('GalleryPicture',array('enctype'=>'multipart/form-data'));
	
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('upload', array('type' => 'file'));
	
	echo $this->Form->end('Save');
}?>


