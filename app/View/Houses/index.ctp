
<div class="row">
	<h3><?php echo __('Houses'); ?></h3>
</div>
	


<hr>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<?php foreach($houses_view as $key=>$House ){?>
	<div class="row">
			<div class="col-md-4">
				<div class="row" style="padding-top:35px">
					<?php if(!empty($House['MyHousePicture'])){
						foreach ($House['MyHousePicture'] as $x){
							if($x['type_flag']==0){
								echo $this->Html->link(
										$this->Html->image('/img/uploads/houses/'.$x['picture'], array('class' => 'featurette-image img-responsive')),
										array('controller'=>'Houses','action'=>'view',$House['House']['id']),array('escape'=>false));
								break;
							}
						}
					} ?>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-7">
				<div class="row">
					<p>&nbsp;
						<strong><?php echo $this->Html->link($House['House']['name'], array('controller'=>'Houses','action'=>'view',$House['House']['id'])); ?> </strong>
						<?php if ($current_user['role'] < 2 && !empty($current_user)) {?>
							&middot;
							<a  href=<?php echo $this->Html->url(array('controller'=>'HousePictures', 'action' => 'index', $House['House']['id']));?> ><span class="glyphicon glyphicon-picture"></span></a>
							<a  href=<?php echo $this->Html->url(array('action' => 'edit', $House['House']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
							<a  href=<?php echo $this->Html->url(array('action' => 'delete', $House['House']['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
						<?php } ?> 
					</p>
					
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td><?php echo 'Preis: ' ?>&nbsp;</td>
							<td><div style="text-align: right;">
									<?php echo $this->Number->currency($House['House']['price'],'EUR',array('wholePosition'=>'after'));?>
									&nbsp;
								</div>
							</td>
						</tr>
						<tr>
							<td><?php echo 'Wohnfläche: ' ?>&nbsp;</td>
							<td><div style="text-align: right;">
									<?php echo $House['House']['size'].' m<sup>2</sup>';?>
									&nbsp;
								</div>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Floors:') ?>&nbsp;</td>
							<td><div style="text-align: right;">
									<?php echo $House['House']['floors'];?>
									&nbsp;
								</div>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Type:') ?>&nbsp;</td>
							<td><div style="text-align: right;">
									<?php if($House['House']['bool_duplex']){
										echo __('Duplex');
									}else{
										echo __('Standalone house');
									}?>
									&nbsp;
								</div>
							</td>
						</tr>
						<tr>
							<td><?php echo __('Category:') ?>&nbsp;</td>
							<td><div style="text-align: right;">
									<?php echo $house_type[$House['House']['type']];?>
									&nbsp;
								</div>
							</td>
						</tr>
					</table>
					
				</div>
			</div>
		</div>
		<hr>
<?php }?>

</div>
<div class="col-md-2"></div>
</div>

<hr>

<?php 
if ($current_user['role'] < 2 && !empty($current_user) ) {?>


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
						echo $this->Form->input('size_din',array('placeholder' => __('Enter a DIN 277 Size in Squaremeter'),'label' => __('DIN 277 Size'),'div' => 'form-group has-success'));
						echo $this->Form->input('floors',array('placeholder' => __('Enter how many floors'),'label' => __('Foors'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_duplex',array('label' => __('Duplex?'),'div' => 'form-group has-success'));
						echo $this->Form->input('type',array('options'=>$house_type,'placeholder' => __('Choose type:'),'label' => __('Type'),'div' => 'form-group has-success'));
						echo $this->Form->input('price',array('placeholder' => __('Enter a Price'),'label' => __('Price'),'div' => 'form-group has-success'));?>
				</div>						
			</div>
		</div>
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
			
	</div>
		
	</div>
	
	</div>
	
	</div> <!-- /container -->
	
	
	
<?php } ?>


