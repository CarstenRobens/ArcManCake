<h3>Home Pictures</h3>
	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Action</th>
		<th>Created</th>
	</tr>
 
	<?php foreach($home_pictures_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['HomePicture']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['HomePicture']['title'], array('controller'=>'HomePictures','action'=>'view',$x['HomePicture']['id'])); ?></td>
		<td> <?php 
            echo $this->Form->postLink('Delete',array('controller' => 'HomePictures','action' => 'delete',$x['HomePicture']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['HomePicture']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add a home picture</h3>

	<?php 
	echo $this->Form->create('HomePicture',array('enctype'=>'multipart/form-data'));
	
	echo $this->Form->input('title');
	echo $this->Form->input('description');
	echo $this->Form->input('upload', array('type' => 'file'));
	
	echo $this->Form->end('Save home picture');
}?>


