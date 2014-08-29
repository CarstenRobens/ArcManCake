<?php
/*
 * View/Events/view.ctp
 * CakePHP Full Calendar Plugin
 *
 * Copyright (c) 2010 Silas Montgomery
 * http://silasmontgomery.com
 *
 * Licensed under MIT
 * http://www.opensource.org/licenses/mit-license.php
 */
?>

<div class="row"><br>
<?php echo $this->Html->link('Back', array('plugin' => 'full_calendar', 'action' => 'index')) ?>
</div>
    
<div class="row">
	  <?php if(true){ ?>
        
		<div class="col-md-4"></div>
		
		<div class="col-md-4">
		
			<div class="row">
				<div class="col-xs-4">
					<p > <?php echo __('Title:'); ?> </p>
					<p > <?php if(!empty($event['Event']['details'])){
						echo __('Details');
					} ?> </p>
				</div>
				<div class="col-xs-8" align="right">
					<p > <?php echo $event['Event']['title']; ?> </p>
					<p > <?php if(!empty($event['Event']['details'])){
						echo $event['Event']['details'];
					} ?> </p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-4">
					<p > <?php echo __('Category:'); ?> </p>
					<p > <?php echo __('Status:'); ?> </p>
					<p > <?php echo __('From:'); ?> </p>
					<p > <?php echo __('To:'); ?> </p>
					<p > <?php echo __('Created:'); ?> </p>
					<p > <?php echo __('Modified:'); ?> </p>
				</div>
				<div class="col-xs-8" align="right">
					<p > <?php echo $event['EventType']['name']; ?> </p>
					<p > <?php echo $event['Event']['status']; ?> </p>
					<p > <?php echo $event['Event']['start']; ?> </p>
					<p > <?php if($event['Event']['all_day']==false){
						echo $event['Event']['end'];
					}else{
						echo __('All day');	
					} ?>  </p>
					<p > <?php echo date("d-M-Y",strtotime($event['Event']['created'])).' '.__('by').' '.$this->Html->link($list_users_view[$event['Event']['user_id']],array('plugin'=>NULL,'controller'=>'Users','action'=>'view',$event['Event']['user_id'])); ?> </p>
					<p > <?php echo date("d-M-Y",strtotime($event['Event']['modified'])); ?> </p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12" align="right">
					<?php if ($current_user['id']==$event['Event']['user_id']){ 
						echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $event['Event']['id']),array('escape'=>false));
						echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $event['Event']['id']),array('escape'=>false));
					} ?>
				</div>
			</div>
			
        </div>
        
		<div class="col-md-4"></div>
		
		<?php } ?>
    </div>

