<h3>Extras</h3>

	
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('default_priceA'); ?></th>
		<th><?php echo $this->Paginator->sort('default_priceB'); ?></th>
		<th><?php echo $this->Paginator->sort('default_priceC'); ?></th>
		<th><?php echo $this->Paginator->sort('MyCategory.name','Category'); ?></th>
		<th><?php echo $this->Paginator->sort('size_dependent_flag','Size dep.?'); ?></th>
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
		<td> <?php echo $x['Extra']['default_priceA'].' €'; ?></td>
		<td> <?php echo $x['Extra']['default_priceC'].' €'; ?></td>
		<td> <?php echo $x['Extra']['default_priceB'].' €'; ?></td>
		<td> <?php echo $x['MyCategory']['name']; ?></td>
		<td> 
		<?php if ($x['Extra']['size_dependent_flag']<0){
			echo 'yes'; 
		}elseif($x['Extra']['size_dependent_flag']>0){
			echo 'enlarge';
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
	<?php unset($x);?>
</table>




<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data'));?>	
						<legend>
							<?php echo __('Add Custom Extra'); ?>
						</legend>
						
						<?php 
						
						
						echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name')));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description')));
						echo $this->Form->input('default_priceA',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[1].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceB',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[2].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceC',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[3].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('depends_on',array('default' => 0,'options'=> $list_extras_view,'label'=>__('Can be selected only after buying:')));
						$house_type[0]=__('None');
						echo $this->Form->input('depends_on_house',array('default' => 0,'options'=> $house_type,'label'=>__('Can be selected only for houses of type:')));
						$array_options=array(
							0=>__('No'),
							1=>__('Floor size dependent'),
							2=>__('Toal size dependent')
						);
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?')));
						echo $this->Form->input('bool_garage',array('default' => false,'label'=>__('Is a garage?')));
						echo $this->Form->input('bool_unique',array('default' => false,'label'=>__('Only one can be purchased?')));
						echo $this->Form->input('bool_uneditable',array('default' => false,'label'=>__('Will the price be fixed?')));
						echo $this->Form->input('upload', array('type' => 'file','label'=>'Picture'));
						echo $this->Form->input('category_id', array('options'=> $list_categories_view,'label' => __('Category')));
						
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
