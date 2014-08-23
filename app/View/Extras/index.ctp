
<div class="row">
	<br>
	<h3>Extras</h3>
</div>
	

<div class="row">
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('id',__('ID')); ?></th>
			<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceA',__('Default Price A')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceB',__('Default Price B')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceC',__('Default Price C')); ?></th>
			<th><?php echo $this->Paginator->sort('MyCategory.name',__('Category')); ?></th>
			<th><?php echo $this->Paginator->sort('size_dependent_flag',__('Size dep.')); ?></th>
			<th><?php echo $this->Paginator->sort('depends_on',__('Req. Extra')); ?></th>
			<th><?php echo $this->Paginator->sort('depends_on_house',__('Req. House')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_unique',__('Unique')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_uneditable',__('Uneditable')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_garage',__('Garage')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_custom',__('Custom')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_external',__('External')); ?></th>
			
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo __('Action'); ?></th>
		</tr>

	<!-- Here is where we loop through our $extras array, printing out extra info --> 
		<?php foreach($extras_view as $x ):?>
		<tr> 
			<td> <?php echo $x['Extra']['id']; ?> </td> 
			<td> <?php echo $this->Html->link($x['Extra']['name'], array('controller'=>'Extras','action'=>'view',$x['Extra']['id'])); ?></td>
			<td> <?php echo $x['Extra']['default_priceA'].' €'; ?></td>
			<td> <?php echo $x['Extra']['default_priceB'].' €'; ?></td>
			<td> <?php echo $x['Extra']['default_priceC'].' €'; ?></td>
			<td> <?php echo $x['MyCategory']['name']; ?></td>
			<td> 
			<?php if ($x['Extra']['size_dependent_flag']<0){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
			}elseif($x['Extra']['size_dependent_flag']>0){
				echo 'enlarge';
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['depends_on']==true){
				echo $x['MyExtra']['name'];
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['depends_on_house']==true){
				echo $x['MyHouse']['name'];
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['bool_unique']==true){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['bool_uneditable']==true){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['bool_garage']==true){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['bool_custom']==true){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['bool_external']==true){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php 
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> <?php echo $x['Extra']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
			<td>
				<a href=<?php echo $this->Html->url(array('action' => 'edit',$x['Extra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
				<a href=<?php echo $this->Html->url(array('action' => 'delete',$x['Extra']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
			
			</td>
		</tr>
		<?php endforeach; ?>
		<?php echo $this->Paginator->numbers(); ?>
		<?php unset($x);?>
	</table>
</div>



<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Add Extra'); ?>
						</legend>
						
						<?php 
						$array_options=array(
							0=>__('No'),
							1=>__('Floor size dependent'),
							2=>__('Toal size dependent')
						);
						$house_type[0]=__('None');
						
						echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name')));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'escape' => true));
						echo $this->Form->input('default_priceA',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[1].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceB',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[2].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceC',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[3].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('category_id', array('options'=> $list_categories_view,'label' => __('Category')));
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?')));
						echo $this->Form->input('depends_on',array('default' => 0,'options'=> $list_extras_view,'label'=>__('Can be selected only after buying:')));
						echo $this->Form->input('depends_on_house',array('default' => 0,'options'=> $houses_list_view,'label'=>__('Can be selected only for house:')));
						echo $this->Form->input('bool_garage',array('default' => false,'label'=>__('Is a garage?')));
						echo $this->Form->input('bool_unique',array('default' => false,'label'=>__('Only one can be purchased?')));
						echo $this->Form->input('bool_uneditable',array('default' => false,'label'=>__('Will the price be fixed?')));
						echo $this->Form->input('bool_external',array('default' => false,'label'=>__('Servive from external company')));
						echo $this->Form->input('upload', array('type' => 'file','label'=>'Picture'));
						
						
						?>		
						
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
</div>


