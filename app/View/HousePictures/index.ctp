<hr>

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
		
		<div class="row">
			
		</div>
	</div>
	
	<div class="col-md-1"></div>
	
</div>


<div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
		
			
			<table>
		<tr>
			<th>Id</th>
			<th>Name</th>
 	       	<th>House</th>
    	    <th>Type</th>
			<th>Action</th>
			<th>Created</th>
		</tr>
 
		<?php foreach($house_pictures_view as $x ){ ?>
		<tr> 
			<td> <?php echo $x['HousePicture']['id']; ?> </td> 
			<td> <?php echo $this->Html->link($x['HousePicture']['name'], array('controller'=>'HousePictures','action'=>'view',$x['HousePicture']['id'])); ?></td>
			<td> <?php echo $x['MyHouse']['name'] ?></td>
			<td> <?php echo $house_pic_type[$x['HousePicture']['type_flag']] ?></td>
			<td> <?php 
        	    echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'HousePictures','action' => 'delete',$x['HousePicture']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false));
       		 ?></td>
        	<td> <?php echo $x['HousePicture']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
		</tr>
		<?php } ?>
			</table>
		
		</div>
		
		<div class="col-md-2"></div>
	
    </div>
	<hr >




<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>


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

