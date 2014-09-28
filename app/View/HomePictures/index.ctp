<div class="row">
	<h3><?php echo __('Home Pictures'); ?></h3>
</div>


<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table>
			<tr>
				<th><?php echo $this->Paginator->sort('name',__('Title')); ?></th>
				<th> </th>
				<th><?php echo $this->Paginator->sort('description',__('Description')); ?></th>
				<?php if($current_user['role']<2){ ?>
					<th><?php echo __('Action'); ?></th>
				<?php } ?>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			</tr>

			<?php foreach($home_pictures_view as $x ){ ?>
			<tr>
				<td><?php echo $x['HomePicture']['title']; ?> </td>
				<td><?php echo $this->Html->image('/img/uploads/home/'.$x['HomePicture']['picture'],array('style'=>'max-width:100px')); ?> </td>
				<td><?php echo $x['HomePicture']['description']; ?> </td>
				<?php if($current_user['role']<2){ ?>
					<td><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HomePictures','action' => 'delete',$x['HomePicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false, 'title'=>__('Delete')));?> </td>
				<?php } ?>
				<td><?php echo date("d-M-Y",strtotime($x['HomePicture']['created'])).' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
			</tr>
			<?php } ?>
			<?php echo $this->Paginator->numbers(); ?>
		</table>
	</div>
	<div class="col-md-2"></div>

</div>
<hr>

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
						


