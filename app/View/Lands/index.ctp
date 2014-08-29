<div class="row">
	<br>
	<h3><?php echo __('Land'); ?></h3>
</div>


<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table>
			<tr>
				<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
				<th><?php echo $this->Paginator->sort('customer_id',__('belongs to Costumer')); ?>
				</th>
				<th><?php echo $this->Paginator->sort('user_id',__('belongs to Supervisor')); ?>
				</th>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
				<th><?php echo __('Action'); ?></th>

			</tr>

			<!-- Here is where we loop through our $lands array, printing out land info -->
			<?php foreach($lands_view as $x){ ?>
			<tr>
				<td><?php echo $this->Html->link($x['Land']['name'], array('controller'=>'Lands','action'=>'view',$x['Land']['id'])); ?>
				</td>
				<td><?php 
				if ($x['Land']['customer_id'] == 0) {
					echo 'Open';
				}else{
					echo $this->Html->link($x['MyCustomer']['name'].' '.$x['MyCustomer']['surname'], array('controller'=>'Customers','action'=>'view',$x['MyCustomer']['id']));
				} ?>
				</td>
				<td><?php echo $this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?>
				</td>


				<td><?php echo date("d-M-Y",strtotime($x['Land']['created'])).' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?>
				</td>
				<td><a
					href=<?php echo $this->Html->url(array('action' => 'edit',$x['Land']['id']));?>><span
						class="glyphicon glyphicon-edit"></span> </a> <?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete',$x['Land']['id']) , array('escape' => false), __('Are you sure you want to delete this land?')); ?>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="col-md-2"></div>
</div>

<?php 
if ($current_user['role'] < 3 && !empty($current_user) ) {?>
	
	
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<legend>
							<?php echo __('Add a Land'); ?>
						</legend>
						
						<?php 
						echo $this->Form->create('Land', array('class' => 'form-horizontal'));
						
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
		<p style="clear: both;"> </p>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
	</div>

	<?php

}?>


