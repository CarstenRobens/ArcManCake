<h3>Extras</h3>

	
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('default_price'); ?></th>
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
		<td> <?php echo $x['Extra']['default_price'].' €'; ?></td>
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
	<?php unset($x); ?>
</table>




<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Extra');?>	
						<legend>
							<?php echo __('Add Custom Extra'); ?>
						</legend>
						
						<?php 
						echo $this->Form->create('Extra', array('class' => 'form'));
						
						echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name')));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description')));
						echo $this->Form->input('default_price',array('placeholder' => __('Enter the default price'),'label' => __('Default Price')));
						$array_options=array(
							0=>'No',
							1=>__('Floor size dependent'),
							2=>__('Whole size dependent')
						);
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?')));
						echo $this->Form->input('bool_garage',array('default' => false,'label'=>'Is a garage?'));
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
