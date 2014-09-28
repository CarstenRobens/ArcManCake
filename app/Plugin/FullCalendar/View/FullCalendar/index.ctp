<?php
/*
 * View/FullCalendar/index.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>

<div class="row" align="right"><br><br>

	<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events'));?> ><span class="glyphicon glyphicon-list-alt"></span> <?php echo __('Table view');?></a>
	<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add'));?> ><span class="glyphicon glyphicon-pushpin"></span> <?php echo __('Set appointment');?></a>
	<?php if ($current_user['role']<2){?>
		<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types'));?> ><span class="glyphicon glyphicon-list"></span> <?php echo __('Types');?></a>
	<?php }?>
	
</div><br>

<?php
echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
echo $this->Html->css('/full_calendar/css/fullcalendar', null, array('inline' => false));
?>


<div class="Calendar index">
	<div id="calendar"></div>
</div>

<div class="row" align="right"><br>

	<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events'));?> ><span class="glyphicon glyphicon-list-alt"></span> <?php echo __('Table view');?></a>
	<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'add'));?> ><span class="glyphicon glyphicon-pushpin"></span> <?php echo __('Set appointment');?></a>
	<a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('plugin' => 'full_calendar', 'controller' => 'event_types'));?> ><span class="glyphicon glyphicon-list"></span> <?php echo __('Types');?></a>
	
</div>
