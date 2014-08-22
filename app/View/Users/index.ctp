
	
    <div class="CategorieTitleBox">
        <div id="Users">
        <?php echo __( 'Users',false);?>
        </div>
    </div>
    
	<hr >
	<?php
    for($i = 0; $i < count($users_view); $i++){?>
	
	

      <div class="row"id="<?php echo $id = str_replace(' ', '+', $users_view[$i]['User']['name']);?>">
	  <?php
        	if(true){?>
        
		<div class="col-md-2">
		</div>
		<div class="col-md-2">
			
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-4">
					<p >
					<?php
					if(!empty($users_view[$i]['User']['name'])){
						echo __('Name:');
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['surname'])){
						echo __('Surname:');
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['username'])){
						echo __('Username:');
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['username'])){
						echo __('Role:');
					}
					?>
					</p>
				</div>
				<div class="col-xs-8">
					<p >
					<?php
					
						echo ( $users_view[$i]['User']['name']);
					
					?>
					</p>
					<p >
					<?php
					
						echo $users_view[$i]['User']['surname'];
					
					?>
					</p>
					<p >
					<?php
					
						echo $users_view[$i]['User']['username'];
					
					?>
					</p>
					<p >
					<?php
					
						echo $level[$users_view[$i]['User']['role']];
					
					?>
					</p>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-xs-4">
					<p >
					<?php
					if(!empty($users_view[$i]['User']['phone'])){
						echo __('Tel. Office:');
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['email'])){
						echo __('E-Mail:');
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['created'])){
						echo __('Created:');
					}
					?>
					</p>
				</div>
				
				
				<div class="col-xs-4">
					<p >
					<?php
					if(!empty($users_view[$i]['User']['phone'])){
						echo $users_view[$i]['User']['phone'];
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['email'])){
						echo $users_view[$i]['User']['email'];
					}
					?>
					</p>
					<p >
					<?php
					if(!empty($users_view[$i]['User']['created'])){
						echo $users_view[$i]['User']['created'];
					}
					?>
					</p>
				</div>
				
			</div>
			
			
			
			
			<?php 
			if ($current_user['role'] < 2 && !empty($current_user))
			{?>
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Html->link(__('Edit User'),array('action' => 'edit',$users_view[$i]['User']['id']));?>
					&middot;
					<?php echo $this->Form->postLink(__('Delete User'),array('controller' => 'users','action' => 'delete',$users_view[$i]['User']['id']),array('confirm'=>'Are you sure?'));?>
				</div>
				
				
			</div>
			<?php
			}?>
			
        </div>
		<div class="col-md-2">
		</div>
		
		
		<?php
		}?>
      </div>
	<hr>
	
	
    
    <?php
    }?>
	
	
	
	
	
	
	
    
    <div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
		
			
			<table>
			<tr>
				
				<th>Name</th>
				<th>Username</th>
				<th>Role</th>
				<th>Created</th>
				<th>Action</th>
				
			</tr>
			<?php
			foreach ($users_view as $User)
			{?>	
			<tr> 
				
				<td> <?php echo $User['User']['name']?></td>
				<td> <?php echo $this->Html->link($User['User']['username'], array('controller'=>'users','action'=>'view',$User['User']['id'])); ?></td>
				<td> <?php echo $User['User']['role']?></td>
				<td> <?php echo $User['User']['created']; ?> </td>
				<td>
					 <?php echo $this->Html->link(__('Edit User'),array('action' => 'edit',$User['User']['id']));?>
					&middot;
					<?php echo $this->Form->postLink(__('Delete User'),array('controller' => 'users','action' => 'delete',$User['User']['id']),array('confirm'=>'Are you sure?'));?>
				</td>
				
			</tr>
			<?php
			}?>
			</table>
			
        
       <?php 
			if ($this->Session->read('Auth.User.power')==3)
			{?>
               		<p >
						<?php echo $this->Html->link(__('Edit User', true), array('action' => 'edit', $User['User']['id'])); ?>
						&middot;
						<?php echo $this->Html->link(__('Delete User', true), array('action' => 'delete', $User['User']['id'])); ?>
                    </p>
        	<?php
    	}?>
		</div> </p>
		
		<div class="col-md-2"></div>
	
    </div>
	<hr >
    
 

<?php 
    if ($current_user['role'] < 2 && !empty($current_user))
    {?>
	<div class="container">
	<div class="contactwrapper">
	<div class="view">

	<div class="PostBox">
		<div class="PostContent">
			<div class="PostContentBox">
				<div class="PostMainContentbox">
						<?php echo $this->Form->create('User');?>	
						<legend>
							<?php echo __('Add a User'); ?>
						</legend>
						
						<?php 
						echo $this->Form->create('User', array('class' => 'form-horizontal'));
							echo $this->Form->input('username',array('placeholder' => __('Enter a Username'),'label' => __('Username'),'div' => 'form-group has-success'));
							echo $this->Form->input('password',array('placeholder' => __('Enter a Password'),'label' => __('Password'),'div' => 'form-group has-success'));
							echo $this->Form->input('role',array('options'=> $level,'label' => __('Role'),'div' => 'form-group has-success'));
							echo $this->Form->input('name',array('placeholder' => __('Enter a Name'),'label' => __('Name'),'div' => 'form-group has-success'));
							echo $this->Form->input('surname',array('placeholder' => __('Enter a Surname'),'label' => __('Surname'),'div' => 'form-group has-success'));
							echo $this->Form->input('phone',array('placeholder' => __('Enter a Phone Number'),'label' => __('Phone Number'),'div' => 'form-group has-success'));
							echo $this->Form->input('email', array('placeholder' => __('Enter an E-Mail Address'),'type' => 'email','label' => __('E-Mail Address'),'div' => 'form-group has-success'));
						?>	
						
				</div>						
			</div>
		</div>
		<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
		<p style="clear: both;">  </p>
	</div>
		
	</div>
	</div>
	</div> <!-- /container -->
	
	
	
	
	
	
		
    
	<?php 
    }?>

