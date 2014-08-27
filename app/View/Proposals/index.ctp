<div class="row">
	<h3>
		<?php echo __('Proposals'); ?>
	</h3>
</div>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<table>
			<tr>
				<th><?php echo $this->Paginator->sort('Customer.surname',__('Customer')); ?></th>
				<th><?php echo $this->Paginator->sort('name',__('Proposal')); ?></th>
				<th><?php echo __('Generate'); ?></th>
				<th><?php echo __('Action'); ?></th>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			</tr>

			<!-- Here is where we loop through our $proposals array, printing out proposal info -->
			<?php foreach($proposals_view as $x ){ ?>
			<tr>
				<td><?php echo $this->Html->link($x['MyCustomer']['surname'].', '.$x['MyCustomer']['name'], array('controller'=>'Customers','action'=>'view',$x['Proposal']['customer_id'])); ?></td>
				<td><?php echo $this->Html->link($x['Proposal']['name'], array('controller'=>'Proposals','action'=>'view',$x['Proposal']['id'])); ?></td>
				<td>
				<?php
				echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"> </span>',array('action' => 'gen_summary',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false)).' ';
				echo $this->Html->link('<span class="glyphicon glyphicon-euro"> </span>',array('action' => 'gen_bank_receipt',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false)).' ';
				echo $this->Html->link('<span class="glyphicon glyphicon-pencil"> </span>',array('action' => 'gen_contract',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false));
				?>
				</td>
				<td>
					<a href=<?php echo $this->Html->url(array('action' => 'edit',$x['Proposal']['id']));?>><span class="glyphicon glyphicon-edit"> </span></a> 
					<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove">', array('action' => 'delete',$x['Proposal']['id']), array('escape' => false), __('Are you sure you want to delete this proposal?')); ?>
				</td>
				<td><?php echo $x['Proposal']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?></td>
			</tr>
			<?php } ?>
			<?php echo $this->Paginator->numbers(); ?>
			<?php unset($proposal); ?>
		</table>
	</div>
	<div class="col-md-2"></div>

</div>
