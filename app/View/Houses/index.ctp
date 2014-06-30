<h3>Houses</h3>

	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Type</th>
        <th>Size (m2)</th>
        <th>Floors</th>
        <th>Price</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $houses array, printing out house info --> 
	<?php foreach($houses_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['House']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['House']['name'], array('controller'=>'Houses','action'=>'view',$x['House']['id'])); ?></td>
		<td> <?php echo $x['House']['type'] ?></td>
		<td> <?php echo $x['House']['size'] ?></td>
		<td> <?php echo $x['House']['floors'] ?></td>
		<td> <?php echo $x['House']['price'] ?></td>
        <td> <?php echo $x['House']['created']; ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($house); ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add house</h3>

	<?php 
	echo $this->Form->create('House');
	echo $this->Form->input('name');
	echo $this->Form->input('notes');
	echo $this->Form->input('size');
	echo $this->Form->input('stores');
	echo $this->Form->input('type');
	echo $this->Form->input('price');
	echo $this->Form->end('Save house');
}?>


