<h3>Proposals</h3>


<table>
	<tr>
		<th>Id</th>
		<th>Customer</th>
		<th>Name</th>
        <th>Generate</th>
        <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $proposals array, printing out proposal info --> 
	<?php foreach($proposals_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['Proposal']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['MyCustomer']['name'].' '.$x['MyCustomer']['surname'], array('controller'=>'Customers','action'=>'view',$x['Proposal']['customer_id'])); ?></td>
		<td> <?php echo $this->Html->link($x['Proposal']['name'], array('controller'=>'Proposals','action'=>'view',$x['Proposal']['id'])); ?></td>
        <td><?php
        	echo $this->Html->link('<span class="glyphicon glyphicon-list-alt"></span> '.'Summary',array('action' => 'gen_summary',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false)).' ';
        	echo $this->Html->link('<span class="glyphicon glyphicon-euro"></span> '.'Bank Receipt',array('action' => 'gen_bank_receipt',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false)).' ';
        	echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> '.'Contract',array('action' => 'gen_contract',$x['Proposal']['id']),array('target'=>'_blank', 'escape'=>false));
        ?></td>
        <td> <a href=<?php echo $this->Html->url(array('action' => 'edit',$x['Proposal']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a><?php
				echo ' ';
				echo $this->Form->postLink($this->Html->tag('i', '',
										array('class' => 'glyphicon glyphicon-remove')),
										array('action' => 'delete',$x['Proposal']['id']) ,
										array('escape' => false), __('Are you sure you want to delete this proposal?'));
		?></td>
		<td> <?php echo $x['Proposal']['created'].' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($proposal); ?>
</table>
