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
            echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HomePictures','action' => 'delete',$x['HomePicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false));
        ?></td>
        <td> <?php echo $x['HomePicture']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
</table>


<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>

<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('HomePicture',array('enctype'=>'multipart/form-data','class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add a home picture'); ?>
						</legend>
						<?php 
						echo $this->Form->input('title',array('placeholder' => __('Enter the title of the picture'),'label' => __('Title'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('upload', array('type' => 'file'));
						}?>
						
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>
						


