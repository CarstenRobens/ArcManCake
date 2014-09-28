<style>
.ui-tooltip{
            max-width: 800px;
            width: 800px;
            }
</style>



<div class="row">
	<br>
	<h3><?php echo __('Extras'); ?></h3>
</div>
	

<div class="row">
	<?php echo $this->Paginator->numbers(); ?>
	<table>
		<tr>
			<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceA',__('Default Price A')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceB',__('Default Price B')); ?></th>
			<th><?php echo $this->Paginator->sort('default_priceC',__('Default Price C')); ?></th>
			<th><?php echo $this->Paginator->sort('units',__('Units')); ?></th>
			<th><?php echo $this->Paginator->sort('MyCategory.name',__('Category')); ?></th>
			<th><?php echo $this->Paginator->sort('size_dependent_flag',__('Size dep.')); ?></th>
			<th><?php echo $this->Paginator->sort('type',__('Type')); ?></th>
			<th><?php echo $this->Paginator->sort('depends_on',__('Req. Extra')); ?></th>
			<th><?php echo $this->Paginator->sort('depends_on_house',__('Req. House')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_unique',__('Unique')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_uneditable',__('Uneditable')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_custom',__('Custom')); ?></th>
			<th><?php echo $this->Paginator->sort('bool_external',__('External')); ?></th>
			<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			
			<?php if($current_user['role']<2){ ?>
				<th><?php echo __('Action'); ?></th>
			<?php } ?>
		</tr>

	<!-- Here is where we loop through our $extras array, printing out extra info --> 
		<?php foreach($extras_view as $x ){?>
		<tr> 
			<td> 
				<a  id="extra_<?php echo $x['Extra']['id']; ?>"  title="" ><?php echo $x['Extra']['name'];?></a>
				<?php if(!$x['Extra']['picture']){
					$html=$this->Text->autoParagraph($x['Extra']['description']);
					$html = str_replace("\n", '', $html); //to remove linebreaks
				}else{
					$html='<table><tr><td>'.$this->Html->image('/img/uploads/extras/'.$x['Extra']['picture'],array('style'=>'max-width:150px')).'</td><td>'.$this->Text->autoParagraph($x['Extra']['description']).'</td></tr></table>';
					$html = str_replace("\n", '', $html); //to remove linebreaks
				}?> 
				<script>
					$( "#extra_<?php echo $x['Extra']['id']; ?>" ).tooltip({ content: '<?php echo $html; ?>' });
				</script>
			</td>
			<td> <?php echo $this->Number->currency($x['Extra']['default_priceA'],'EUR',array('wholePosition'=>'after')); ?></td>
			<td> <?php echo $this->Number->currency($x['Extra']['default_priceB'],'EUR',array('wholePosition'=>'after')); ?></td>
			<td> <?php echo $this->Number->currency($x['Extra']['default_priceC'],'EUR',array('wholePosition'=>'after')); ?></td>
			<td> <?php echo $extra_unit['factor'][$x['Extra']['units']]; ?></td>
			<td> <?php echo $x['MyCategory']['name']; ?></td>
			<td> 
			<?php if ($x['Extra']['size_dependent_flag']<0){
				?><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div><?php
				if ($x['Extra']['size_dependent_flag']==-1){
					echo __('Floor Size');
				}
				if ($x['Extra']['size_dependent_flag']==-2){
					echo __('Total Size');
				}
			}elseif($x['Extra']['size_dependent_flag']>0){
				echo 'Hausvergrößerung';
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td>
				<div style="text-align:right;"><?php echo $extra_type[$x['Extra']['type']];?></div> 
			</td>
			<td> 
			<?php if ($x['Extra']['depends_on']==true){
				echo $x['MyExtraDep']['name'];
			}else{
				?><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div><?php 
			} ?>
			</td>
			<td> 
			<?php if ($x['Extra']['depends_on_house']==true){
				echo $x['MyHouseDep']['name'];
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
			<td> <?php echo date("d-M-Y",strtotime($x['Extra']['created'])).' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
			<?php if($current_user['role']<2){ ?>
			<td>
				<a title="<?php echo __('Edit');?>" href=<?php echo $this->Html->url(array('action' => 'edit',$x['Extra']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
				
				<?php 
				echo ' ';
				echo $this->Form->postLink($this->Html->tag('i', '',
										array('class' => 'glyphicon glyphicon-remove')),
										array('action' => 'delete',$x['Extra']['id']) ,
										array('escape' => false, 'title'=>__('Delete')), __('Are you sure you want to delete this Extra?'));?>
			</td>
			<?php }?>
		</tr>
		<?php } ?>
		<?php unset($x);?>
	</table>
	<?php echo $this->Paginator->numbers(); ?>
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
						
						echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceA',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[1].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceB',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[2].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceC',array('placeholder' => __('Enter the price'),'label' => __('Default Price for Houses of type ').$house_type[3].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('units',array('type'=>'select','options'=>$extra_unit['factor'] ,'default' => 0,'label' => __('Factor unit'),'div' => 'form-group has-success','escape'=>false));
						echo $this->Form->input('category_id', array('options'=> $list_categories_view,'label' => __('Category'),'div' => 'form-group has-success'));
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?'),'div' => 'form-group has-success'));
						echo $this->Form->input('type',array('type'=>'select','options'=>$extra_type ,'default' => 0,'label' => __('Type of extra'),'div' => 'form-group has-success'));
						echo $this->Form->input('depends_on',array('default' => 0,'options'=> $list_extras_view,'label'=>__('Can be selected only after buying:'),'div' => 'form-group has-success'));
						echo $this->Form->input('depends_on_house',array('default' => 0,'options'=> $houses_list_view,'label'=>__('Can be selected only for house:'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_unique',array('default' => false,'label'=>__('Only one can be purchased?'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_uneditable',array('default' => false,'label'=>__('Will the price be fixed?'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_external',array('default' => false,'label'=>__('Service from external company?'),'div' => 'form-group has-success'));
						echo $this->Form->input('upload', array('type' => 'file','label'=>'Picture','div' => 'form-group has-success'));
						
						
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


