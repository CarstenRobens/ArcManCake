
<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Customers','action'=>'index')) ?>
</div>
	


<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('Land',array('enctype'=>'multipart/form-data', 'class' => 'form-horizontal'));?>	
						<legend>
							<?php echo __('Hinzufügen von einem Grundstück für den Kunden: '.$customer_view['MyCustomer']['name'].' '.$customer_view['MyCustomer']['surname']); ?>
						</legend>
						
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter the Land Name'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('land_size',array('placeholder' => __('Enter the Land Size in squaremeter'),'label' => __('Size (m<sup>2</sup>)'),'div' => 'form-group has-success'));
						echo $this->Form->input('land_price_per_m2',array('placeholder' => __('Enter the Land Price per squaremeter'),'label' => __('Land Price (€/m<sup>2</sup>)'),'div' => 'form-group has-success'));
						echo $this->Form->input('dev_size',array('placeholder' => __('Enter the Development Size in squaremeter'),'label' => __('Development Size (m<sup>2</sup>)'),'div' => 'form-group has-success'));
						echo $this->Form->input('dev_cost_per_m2',array('placeholder' => __('Enter the Development Price per squaremeter'),'label' => __('Development Price (€/m<sup>2</sup>)'),'div' => 'form-group has-success'));
						echo $this->Form->input('land_agent_cost',array('placeholder' => __('Enter the Land Agent Cost in %'),'label' => __('Land Agent Cost (%)'),'div' => 'form-group has-success'));
						echo $this->Form->input('notes',array('placeholder' => __('additional notes if required'),'label' => __('Notes'),'div' => 'form-group has-success'));?>
						
						<legend>
							<?php echo __('Building Information'); ?>
						</legend>
						<?php 
						echo $this->Form->input('built_region',array('placeholder' => __('Enter the building region'),'label' => __('Building Region'),'div' => 'form-group has-success'));
						echo $this->Form->input('built_address',array('placeholder' => __('Enter the building address'),'label' => __('Building Post Address'),'div' => 'form-group has-success'));
						echo $this->Form->input('built_zipcode',array('placeholder' => __('Enter the building zipcode'),'label' => __('Building Zipcode'),'div' => 'form-group has-success'));
						echo $this->Form->input('built_city',array('placeholder' => __('Enter the building City'),'label' => __('Building City'),'div' => 'form-group has-success'));
						echo $this->Form->input('construction_office',array('placeholder' => __('Enter the corresponding Construction Office'),'label' => __('Construction Office'),'div' => 'form-group has-success'));
						?>	
						
				</div>						
			</div>
		</div>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
</div>