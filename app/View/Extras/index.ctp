<h3>Extras</h3>

	
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('default_price'); ?></th>
		<th><?php echo $this->Paginator->sort('MyCategory.name','Category'); ?></th>
		<th><?php echo $this->Paginator->sort('bool_size_dependent','Size dep.?'); ?></th>
        <th><?php echo $this->Paginator->sort('bool_custom','Custom?'); ?></th>
        <th><?php echo $this->Paginator->sort('bool_external','Ext?'); ?></th>
        <th>Action</th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
	</tr>

<!-- Here is where we loop through our $extras array, printing out extra info --> 
	<?php foreach($extras_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Extra']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['Extra']['name'], array('controller'=>'Extras','action'=>'view',$x['Extra']['id'])); ?></td>
		<td> <?php echo $x['Extra']['default_price'].' €'; ?></td>
		<td> <?php echo $x['MyCategory']['name']; ?></td>
		<td> 
		<?php if ($x['Extra']['bool_size_dependent']==true){
			echo 'yes'; 
		}else{
			echo 'no';
		} ?>
		</td>
		<td> 
		<?php if ($x['Extra']['bool_custom']==true){
			echo 'yes'; 
		}else{
			echo 'no';
		} ?>
		</td>
		<td> 
		<?php if ($x['Extra']['bool_external']==true){
			echo 'yes'; 
		}else{
			echo 'no';
		} ?>
		</td>
		<td> 
		<?php 
        	echo $this->Html->link('Edit',array('action' => 'edit',$x['Extra']['id'])).' | ';
            echo $this->Form->postLink('Delete',array('action' => 'delete',$x['Extra']['id']),array('confirm'=>'Are you sure?'));
        ?>
        </td>
        <td> <?php echo $x['Extra']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php echo $this->Paginator->numbers(); ?>
	<?php unset($x); ?>
</table>









<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

	<h3>Add extra</h3>

	<?php 
	echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data'));
	
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('default_price');
	echo $this->Form->input('bool_external',array('default' => false));
	echo $this->Form->input('upload', array('type' => 'file'));
	echo $this->Form->input('bool_size_dependent',array('default' => false));
	echo $this->Form->input('bool_garage',array('default' => false));
	echo $this->Form->input('category_id',array('options'=> $list_categories_view));
	
	echo $this->Form->end('Save extra');
}?>

