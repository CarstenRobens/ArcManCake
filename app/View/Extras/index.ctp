<h3>Extras</h3>

	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Default price</th>
        <th>Custom</th>
        <th>External</th>
        <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $extras array, printing out extra info --> 
	<?php foreach($extras_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Extra']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['Extra']['name'], array('controller'=>'Extras','action'=>'view',$x['Extra']['id'])); ?></td>
		<td> <?php echo $x['Extra']['default_price'].' €' ?></td>
		<td> <?php 
		if ($x['Extra']['bool_custom']==true){
			echo 'yes'; 
		}else{
			echo 'no';
		} 
		?></td>
		<td> <?php 
		if ($x['Extra']['bool_external']==true){
			echo 'yes'; 
		}else{
			echo 'no';
		} 
		?></td>
		<td> <?php 
        	echo $this->Html->link('Edit',array('action' => 'edit',$x['Extra']['id'])).' | ';
            echo $this->Form->postLink('Delete',array('action' => 'delete',$x['Extra']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['Extra']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($extra); ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add extra</h3>

	<?php 
	echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data'));
	
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('default_price');
	echo $this->Form->input('upload', array('type' => 'file'));
	echo $this->Form->input('bool_custom',array('default' => false));
	echo $this->Form->input('bool_external',array('default' => false));
	echo $this->Form->input('category_id',array('options'=> $list_categories_view));
	
	echo $this->Form->end('Save extra');
}?>

