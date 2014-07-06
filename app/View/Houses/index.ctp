<h3>Houses</h3>

	
<table>
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Type</th>
        <th>Size (m2)</th>
        <th>Floors</th>
        <th>Price</th>
        <th>Action</th>
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
		<td> <?php 
        	echo $this->Html->link('Edit',array('action' => 'edit',$x['House']['id'])).' | ';
            echo $this->Form->postLink('Delete',array('action' => 'delete',$x['House']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td> <?php echo $x['House']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($house); ?>
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
						<?php echo $this->Form->create('House');?>	
						<legend>
							<?php echo __('Add a House'); ?>
						</legend>
						
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name')));
						echo $this->Form->input('description',array('placeholder' => __('Enter a Description'),'label' => __('Description')));
						echo $this->Form->input('size',array('placeholder' => __('Enter a Size in Squaremeter'),'label' => __('Size')));
						echo $this->Form->input('stores',array('placeholder' => __('Enter how many floors'),'label' => __('Foors')));
						echo $this->Form->input('type',array('placeholder' => __('Enter the Type'),'label' => __('Type')));
						echo $this->Form->input('price',array('placeholder' => __('Enter a Price'),'label' => __('Price')));?>	
						
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


