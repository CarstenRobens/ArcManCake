<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
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
						echo $this->Form->input('default_priceA',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[1].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceB',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[2].__(' (in € or €/m<sup>2</sup>)')));
						echo $this->Form->input('default_priceC',array('placeholder' => __('Enter the price '),'label' => __('Default Price for Houses of type ').$house_type[3].__(' (in € or €/m<sup>2</sup>)')));
						$array_options=array(
							0=>__('No'),
							1=>__('Floor size dependent'),
							2=>__('Total size dependent')
						);
						echo $this->Form->input('size_dependent_check',array('type'=>'select','options'=>$array_options ,'default' => 0,'label' => __('Is the price size dependent?')));
						echo $this->Form->input('bool_garage',array('default' => false,'label'=>__('Is a garage?')));
						echo $this->Form->input('category_id', array('options'=> $list_categories_view,'label' => __('Category')));
						/* Custom extras do not need so many fields like a standard extra */
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
	</div>