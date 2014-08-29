
<div class="CategorieTitleBox">
        <div id="Users">
        <?php echo h($user_view['User']['name'].' '.$user_view['User']['surname'].' ('.$user_view['User']['username']).').'; ?> 
        </div>
    </div>
    
	<hr >
	
	

      <div class="row"id="<?php echo $id = str_replace(' ', '+', $user_view['User']['name']);?>">
	  <?php if(true){?>
        
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
			
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-4">
					<p >
					<?php if(!empty($user_view['User']['name'])){
						echo __('Name:');
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['surname'])){
						echo __('Surname:');
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['username'])){
						echo __('Username:');
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['username'])){
						echo __('Role:');
					} ?>
					</p>
				</div>
				<div class="col-xs-8">
					<p >
					<?php
						echo ( $user_view['User']['name']);
					?>
					</p>
					<p >
					<?php
						echo $user_view['User']['surname'];
					?>
					</p>
					<p >
					<?php
						echo $user_view['User']['username'];
					?>
					</p>
					<p >
					<?php
						echo $level[$user_view['User']['role']];
					?>
					</p>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-4">
					<p >
					<?php if(!empty($user_view['User']['phone'])){
						echo __('Tel. Office:');
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['email'])){
						echo __('E-Mail:');
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['created'])){
						echo __('Created:');
					} ?>
					</p>
				</div>
				
				
				<div class="col-xs-4">
					<p >
					<?php if(!empty($user_view['User']['phone'])){
						echo $user_view['User']['phone'];
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['email'])){
						echo $user_view['User']['email'];
					} ?>
					</p>
					<p >
					<?php if(!empty($user_view['User']['created'])){
						echo date("d-M-Y",strtotime($user_view['User']['created']));
					} ?>
					</p>
				</div>
				
			</div>
			
			
			
			
			<?php 
			if ($current_user['role'] < 2 && !empty($current_user)) {?>
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Html->link(__('Edit User'),array('action' => 'edit',$user_view['User']['id']));?>
					&middot;
					<?php echo $this->Form->postLink(__('Delete User'),array('controller' => 'users','action' => 'delete',$user_view['User']['id']),array('confirm'=>'Are you sure?'));?>
				</div>
				
				
			</div>
			<?php }?>
			
        </div>
		<div class="col-md-2">
		</div>
		
		
		<?php }?>
      </div>
	<hr>
	
	
    