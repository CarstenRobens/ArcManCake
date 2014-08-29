

<?php if($house_view!=NULL){?>

<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Houses','action'=>'index')) ?>
</div>

<div class="row">
	<h3><?php echo __('House Pictures').': '.$house_view['MyHouse']['name']; ?></h3>
</div>

<div class="row">
	<div class="col-md-1"></div>
	
	<div class="col-md-10" align=center>
		<?php for($j=0; $j<=count($house_pictures_view)-1; $j++) {
			if (($j % 3) ==0){ ?>
				<div class="row">
				<?php for ($i=0; $i<=2; $i++){ ?>
					<div class="col-md-4" align=center>
						<?php if (!empty($house_pictures_view[$j+$i])){
							echo $this->Html->image('/img/uploads/houses/'.$house_pictures_view[$j+$i]['HousePicture']['picture'], array('class' => 'featurette-image img-responsive'));
							echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HousePictures','action' => 'delete',$house_pictures_view[$j+$i]['HousePicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false));
							echo ' '.$house_pictures_view[$j+$i]['HousePicture']['name'].': '.$house_pictures_view[$j+$i]['HousePicture']['description'];
						}?>
					</div>
				<?php }?>
				</div>
			<?php }
		}?>
		<div class="row"></div>
	</div>
	
	<div class="col-md-1"></div>
	
</div>
<?php }else{?>

<div class="row">
	<h3><?php echo __('House Pictures'); ?></h3>
</div>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">


		<table>
			<tr>
				<th><?php echo $this->Paginator->sort('name',__('Title')); ?></th>
				<th><?php echo $this->Paginator->sort('house_id',__('House')); ?></th>
				<th><?php echo $this->Paginator->sort('type_flag',__('Type')); ?></th>
				<?php if($current_user['role']<2){ ?>
				<th><?php echo __('Action'); ?></th>
				<?php } ?>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			</tr>

			<?php foreach($house_pictures_view as $x ){ ?>
			<tr>
				<td><?php echo $x['HousePicture']['name']; ?></td>
				<td><?php echo $x['MyHouse']['name'] ?></td>
				<td><?php echo $house_pic_type[$x['HousePicture']['type_flag']] ?></td>
				<td><?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HousePictures','action' => 'delete',$x['HousePicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false));?></td>
				<td><?php echo date("d-M-Y",strtotime($x['HousePicture']['created'])).' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?></td>
			</tr>
			<?php } ?>
			<?php echo $this->Paginator->numbers(); ?>
			<?php unset($x);?>
		</table>
	</div>

	<div class="col-md-2"></div>

</div>
<hr>
<?php }?>



<?php if ($current_user['role'] < 2 && !empty($current_user) ) {?>


<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('HousePicture',array('enctype'=>'multipart/form-data','class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add a home picture'); ?>
						</legend>
						<?php 
						echo $this->Form->input('title',array('placeholder' => __('Enter the title of the picture'),'label' => __('Title'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('upload', array('type' => 'file'));
						?>
						
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>	
	
	
<?php } ?>

