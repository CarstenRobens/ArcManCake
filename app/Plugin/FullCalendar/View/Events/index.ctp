<?php
/*
 * View/Events/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="row">
	<div class="col-md-5">
		<h3><?php echo __('Appointments'); ?></h3>
	</div>
	<div class=""col-md-5" align="right"> <br> <br>

		<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'full_calendar'));?> ><span class="glyphicon glyphicon-calendar"></span> <?php echo __('Calendar view');?></a>
		<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add'));?> ><span class="glyphicon glyphicon-pushpin"></span> <?php echo __('Set appointment');?></a>
		<?php if ($current_user['role']<2){?>
			<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types'));?> ><span class="glyphicon glyphicon-list"></span> <?php echo __('Types');?></a>
		<?php }?>
	</div>
</div>

<div class="events index">
	<h2><?php __('Events');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title','Titel');?></th>
			<th><?php echo $this->Paginator->sort('event_type_id','Kategorie');?></th>
			<th><?php echo $this->Paginator->sort('status','Status');?></th>
			<th><?php echo $this->Paginator->sort('start','Startzeitpunkt');?></th>
            <th><?php echo $this->Paginator->sort('end','Endzeitpunkt');?></th>
			<th class="actions"></th>
			<th><?php echo $this->Paginator->sort('created','Erstellt');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($events as $event):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($event['Event']['title'], array('action' => 'view', $event['Event']['id'])); ?></td>
		<td><?php echo $event['EventType']['name']; ?></td>
		<td><?php echo $event['Event']['status']; ?></td>
		<td><?php echo $event['Event']['start']; ?></td>
        <td><?php if($event['Event']['all_day'] == 0) { 
        	echo $event['Event']['end']; 
		} else { 
			echo __('All day');
		} ?></td>
		
		<td><?php if ($current_user['id']==$event['Event']['user_id']){ 
			echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $event['Event']['id']),array('escape'=>false, 'title'=>__('Edit')));
			echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $event['Event']['id']),array('escape'=>false, 'title'=>__('Delete')));
		}?></td>
		<td><?php echo date("d-M-Y",strtotime($event['Event']['created'])).' '.__('by').' '.$this->Html->link($list_users_view[$event['Event']['user_id']],array('plugin'=>NULL,'controller'=>'Users','action'=>'view',$event['Event']['user_id'])); ?></td>
        
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->numbers();?>
	
</div>
