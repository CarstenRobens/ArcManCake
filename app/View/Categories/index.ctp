
<div class="row">
	<h3><?php echo __('Categories'); ?></h3>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<table>
			<tr>
				<th><?php echo __('Name'); ?></th>
				<?php if($current_user['role']<2){ ?>
					<th><?php echo __('Action'); ?></th>
				<?php } ?>
				<th><?php echo __('Created'); ?></th>
			</tr>

			<?php foreach($categories_view as $x){ ?>
			<tr>
				<td><?php echo $x['Category']['name']; ?></td>
				<?php if($current_user['role']<2){ ?>
				<td>
					<a href=<?php echo $this->Html->url(array('action' => 'edit',$x['Category']['id']));?>><span class="glyphicon glyphicon-edit"></span> </a> 
					<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove">', array('action' => 'delete',$x['Category']['id']), array('escape' => false), __('Are you sure you want to delete this category?'));?>
				</td>
				<?php } ?>
				<td><?php echo $x['Category']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?>
				</td>
			</tr>
			<?php } ?>
			<?php echo $this->Paginator->numbers(); ?>
		</table>
	</div>
	<div class="col-md-3"></div>

</div>


<?php if ($current_user['role'] < 2 && !empty($current_user) ) {?>
<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('Category',array('class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add Category'); ?>
						</legend>

						<?php echo $this->Form->input('name',array('placeholder' => __('Enter category name'),'label' => __('Name'),'div' => 'form-group has-success'));?>
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>
<?php }?>

