<?php
/*
 * View/EventTypes/index.ctp
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
	<h3><?php echo __('Calendar categories'); ?></h3>
</div>
<div class="row">
<?php echo $this->Html->link('Back', array('plugin' => 'full_calendar', 'controller' => 'events', 'action'=>'index')) ?>
</div>


<div class="eventTypes index">
	<h2><?php __('Event Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
            <th><?php echo $this->Paginator->sort('color');?></th>
			<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eventTypes as $eventType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eventType['EventType']['name']; ?>&nbsp;</td>
        <td><?php echo $eventType['EventType']['color']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('plugin' => 'full_calendar', 'action' => 'edit', $eventType['EventType']['id']),array('escape'=>false)); ?>
			<?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span>', array('plugin' => 'full_calendar', 'action' => 'delete', $eventType['EventType']['id']),array('escape'=>false)); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Paginator->numbers();?>
</div>

<div align="right" class="row"><br>

	<a class="btn btn-md btn-success" href=<?php echo $this->Html->url( array('plugin' => 'full_calendar', 'action' => 'add'));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add category');?></a>
	
</div>
