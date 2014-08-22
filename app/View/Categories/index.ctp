
	<h3><?php echo __('Categories');?></h3>
		
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
<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Category',array('enctype'=>'multipart/form-data'));?>	
						<legend>
							<?php echo __('Add Category'); ?>
						</legend>
						
						<?php 
							echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name')));
						?>
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>

		<div class="PostFooter">
			<div class="bottomaction"> <?php echo $this->Form->end(array('label' => __('Add'),'text' => 'test','class' => 'btn btn-success')); ?> <p style="clear: both;">  </p></div>
			<p style="clear: both;">  </p>
		</div>
	</div>
		
	</div>
	</div>
</div>
<?php 
	}?>
