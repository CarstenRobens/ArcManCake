<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Extras','action'=>'index')) ?>
</div>
	


<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Edit Extra'); ?>
						</legend>
						
						<?php 
						$array_options=array(
							0=>__('No'),
							1=>__('Floor size dependent'),
							2=>__('Total size dependent')
						);
						$house_type[0]=__('None');
						
						echo $this->Form->input('name',array('placeholder' => __('Enter name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceA',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[1].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceB',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[2].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('default_priceC',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[3].__(' (in €, €/m<sup>2</sup> or €/m)'),'div' => 'form-group has-success'));
						echo $this->Form->input('units',array('type'=>'select','options'=>$extra_unit['factor'], 'label' => __('Factor unit'),'div' => 'form-group has-success','escape'=>false));
						echo $this->Form->input('category_id', array('options'=> $list_categories_view,'label' => __('Category'),'div' => 'form-group has-success'));
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?'),'div' => 'form-group has-success'));
						echo $this->Form->input('type',array('type'=>'select','options'=>$extra_type, 'label' => __('Type of extra'),'div' => 'form-group has-success'));
						echo $this->Form->input('depends_on',array('options'=> $list_extras_view,'label'=>__('Can be selected only after buying:'),'div' => 'form-group has-success'));
						echo $this->Form->input('depends_on_house',array('options'=> $houses_list_view,'label'=>__('Can be selected only for house:'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_unique',array('label'=>__('Only one can be purchased?'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_uneditable',array('label'=>__('Will the price be fixed?'),'div' => 'form-group has-success'));
						echo $this->Form->input('bool_external',array('default' => false,'label'=>__('Service from external company?')));
						echo $this->Form->input('upload', array('type' => 'file','label'=>__('New picture (ignore to keep the old one)'),'div' => 'form-group has-success'));
						
						?>		
						
				</div>						
			</div>
		</div>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
</div>
