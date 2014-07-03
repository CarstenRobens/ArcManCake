<h3>Categories</h3>
	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Action</th>
		<th>Created</th>
	</tr>
 
	<?php foreach($categories_view as $x): ?>
	<tr> 
		<td> <?php echo $x['Category']['id']; ?> </td> 
		<td> <?php echo $x['Category']['name']; ?></td>
		<td> <?php
            echo $this->Html->link('Edit',array('action' => 'edit',$x['Category']['id'])).' | ';
            echo $this->Form->postLink('Delete',array('controller' => 'Categories','action' => 'delete',$x['Category']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['Category']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add Category</h3>

	<?php 
	echo $this->Form->create('Category',array('enctype'=>'multipart/form-data'));
	echo $this->Form->input('name');
	echo $this->Form->end('Save house picture');
}?>


