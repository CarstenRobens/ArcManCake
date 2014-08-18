<div class="CategorieTitleBox">
        <div id="GroupMembers">
        <?php __( 'Houses',false);?>
        </div>
</div>

<hr>
    <?php foreach($houses_view as $House ){?>

      <div class="row"id="<?php echo $id = str_replace(' ', '+', $House['House']['name']);?>">
	  <?php if(true){?>
        
		<div class="col-md-2"></div>
		
		<div class="col-md-2">
			<div class="row">
				<?php if(!empty($House['MyHousePicture'])){
					foreach ($House['MyHousePicture'] as $x){
						if($x['type_flag']==0){
							echo $this->Html->image('/img/uploads/houses/'.$House['MyHousePicture'][0]['picture'], array('class' => 'featurette-image img-responsive'));
							break;
						}
					}
				} ?>
			</div>
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-12">
					<p >
						<?php echo 'Type'.$House['House']['type'].': <b><u>'.$House['House']['name'].'</u></b>'; ?>
						<?php if ($current_user['role'] < 2 && !empty($current_user)) {?>
							&middot;
							<a href=<?php echo $this->Html->url(array('controller'=>'HousePictures', 'action' => 'index', $House['House']['id']));?> ><span class="glyphicon glyphicon-picture"></span></a>
							<a href=<?php echo $this->Html->url(array('action' => 'edit', $House['House']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
							<a href=<?php echo $this->Html->url(array('action' => 'delete', $House['House']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
						<?php } ?> 
						<br>
						&nbsp; &nbsp;<?php echo ' <small>with '.$House['House']['size'].__(' m<sup>2</sup> in ').$House['House']['floors'].__(' floors.').'</small>'; ?>
					</p>
					<p>
						<?php echo $House['House']['description']; ?>
					</p>
				</div>
			</div>
        </div>
        
		<div class="col-md-2"> </div>
		
		<?php }?>
      </div>
	<hr>
    <?php }?>



<div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
		
			
			<table>
			<tr>
				
				
				<th>Name</th>
				<th>Type</th>
				<th>Size (m2)</th>
				<th>Floors</th>
				<th>Price</th>
				<th>Action</th>
				<th>Created</th>
				
			</tr>
			
			<?php foreach($houses_view as $House )
			{?>	
			<tr> 
				<td> <?php echo $this->Html->link($House['House']['name'], array('controller'=>'Houses','action'=>'view',$House['House']['id'])); ?></td>
				<td> <?php echo $House['House']['type'] ?></td>
				<td> <?php echo $House['House']['size'] ?></td>
				<td> <?php echo $House['House']['floors'] ?></td>
				<td> <?php echo $House['House']['price'] ?></td>
				<td> <?php 
					echo $this->Html->link('Edit',array('action' => 'edit',$House['House']['id'])).' | ';
					echo $this->Form->postLink('Delete',array('action' => 'delete',$House['House']['id']),array('confirm'=>'Are you sure?'));
				?></td>
				<td> <?php echo $House['House']['created'].' by '.$this->Html->link($House['MyUser']['username'], array('controller'=>'Users','action'=>'view',$House['MyUser']['id'])); ?> </td>
						
			</tr>
			<?php
			}?>
			</table>
			
        
       <?php 
			if ($this->Session->read('Auth.User.power')==3)
			{?>
               		<p >
						<?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $User['User']['id'])); ?>
						&middot;
						<?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $User['User']['id'])); ?>
                    </p>
        	<?php
    	}?>
		</div> </p>
		
		<div class="col-md-2"></div>
	
    </div>
	<hr >




<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>


	<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('House', array('class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Add a House'); ?>
						</legend>
						
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a Description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('size',array('placeholder' => __('Enter a Size in Squaremeter'),'label' => __('Size'),'div' => 'form-group has-success'));
						echo $this->Form->input('stores',array('placeholder' => __('Enter how many floors'),'label' => __('Foors'),'div' => 'form-group has-success'));
						echo $this->Form->input('type',array('placeholder' => __('Enter the Type'),'label' => __('Type'),'div' => 'form-group has-success'));
						echo $this->Form->input('price',array('placeholder' => __('Enter a Price'),'label' => __('Price'),'div' => 'form-group has-success'));?>	
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>

		<div class="PostFooter">
			<div class="bottomaction"> <?php echo $this->Form->end(array('label' => __('Save house'),'text' => 'test','class' => 'btn btn-success')); ?> <p style="clear: both;">  </p></div>
			<p style="clear: both;">  </p>
		</div>
	</div>
		
	</div>
	</div>
	</div> <!-- /container -->
	
	
	
<?php } ?>


