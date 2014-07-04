<h3>Proposals</h3>


<table>
	<tr>
		<th>Id</th>
		<th>Customer</th>
		<th>Name</th>
        <th>Action</th>
        <th>Generate</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $proposals array, printing out proposal info --> 
	<?php foreach($proposals_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Proposal']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['MyCustomer']['name'].' '.$x['MyCustomer']['surname'], array('controller'=>'Customers','action'=>'view',$x['Proposal']['customer_id'])); ?></td>
		<td> <?php echo $this->Html->link($x['Proposal']['name'], array('controller'=>'Proposals','action'=>'view',$x['Proposal']['id'])); ?></td>
        <td> <?php 
                echo $this->Html->link('Add extra/Edit ',array('action' => 'edit',$x['Proposal']['id'])).' | ';
                echo $this->Form->postLink('Delete',array('controller' => 'Proposals','action' => 'delete',$x['Proposal']['id']),array('confirm'=>'Are you sure?'));
        ?></td>
        <td><?php
        	echo $this->Html->link('Summary',array('action' => 'gen_summary',$x['Proposal']['id'])).' ';
        	echo $this->Html->link('Bank Receipt',array('action' => 'gen_bank_receipt',$x['Proposal']['id'])).' ';
        	echo $this->Html->link('Contract',array('action' => 'gen_contract',$x['Proposal']['id']));
        ?></td>
		<td> <?php echo $x['Proposal']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($proposal); ?>
</table>
