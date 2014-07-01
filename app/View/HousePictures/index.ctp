<h3>House Pictures</h3>
	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
        <th>House</th>
		<th>Action</th>
		<th>Created</th>
	</tr>
 
	<?php foreach($house_pictures_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['HousePicture']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['HousePicture']['name'], array('controller'=>'HousePictures','action'=>'view',$x['HousePicture']['id'])); ?></td>>
		<td> <?php echo $x['HousePicture']['house_id'] ?></td>
		<td> <?php 
            echo $this->Form->postLink('Delete',array('controller' => 'HousePictures','action' => 'delete',$x['HousePicture']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['HousePicture']['created']; ?> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add house</h3>

	<?php 
	echo $this->Form->create('HousePicture',array('enctype'=>'multipart/form-data'));
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('upload', array('type' => 'file'));
	echo $this->Form->input('house');
	echo $this->Form->end('Save house picture');
}?>


