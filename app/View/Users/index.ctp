<?php
Configure::load('ArcManCake_config'); 
$level = Configure::read('Level'); 
?>

<div class="container theme-showcase" role="main">


	<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"><p style="clear: both;">  </p></div>
        <div class="col-md-2"></div>
    </div>
	
	
    <div class="CategorieTitleBox">
        <div id="Users">
        <?php __( 'Users',false);?>
        </div>
    </div>
    
	<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"><p style="clear: both;">  </p></div>
        <div class="col-md-2"></div>
    </div>
	<hr >
    
    <div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
		
			
			<table>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Username</th>
				<th>Role</th>
				<th>Action</th>
				<th>Created</th>
			</tr>
			<?php
			foreach ($users_view as $User)
			{?>	
			<tr> 
				<td> <?php echo $User['User']['id']; ?> </td> 
				<td> <?php echo $User['User']['name']?></td>
				<td> <?php echo $this->Html->link($User['User']['username'], array('controller'=>'users','action'=>'view',$User['User']['id'])); ?></td>
				<td> <?php echo $User['User']['role']?></td>
				<td>
					 <?php echo $this->Html->link(__('Edit User'),array('action' => 'edit',$User['User']['id']));?>
					&middot;
					<?php echo $this->Form->postLink(__('Delete User'),array('controller' => 'users','action' => 'delete',$User['User']['id']),array('confirm'=>'Are you sure?'));?>
				</td>
				<td> <?php echo $User['User']['created']; ?> </td>
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
    
    
	
    
	
	</div>

<?php 
    if ($current_user['role'] < 2 && !empty($current_user))
    {?>
		<div class="contactwrapper">
			<div class="view">

			<div class="PostBox">
			<div class="ThreadTitleBox">
				<div class="ThreadTitleContent">
					<h2><?php __('Add a User');?></h2>
				</div> 
				
				<p style="clear: both;">  </p>  
			</div>
			</div>

			<div class="PostBox">
				<div class="PostHeader">
					<h3></h3>
					<p style="clear: both;">  </p>
				</div> 
				<div class="PostContent">
					<div class="PostContentBox">
						<div class="PostMainContentbox">
							<?php echo $this->Html->link('Back', array('controller'=>'users','action'=>'index')) ?>
							<?php 
							echo $this->Form->input('username');
							echo $this->Form->input('password');
							echo $this->Form->input('role',array('options'=> $level));
							echo $this->Form->input('name');
							echo $this->Form->input('surname');
							echo $this->Form->input('phone');
							echo $this->Form->input('email');
							?>		
						</div>
					</div>
					<p style="clear: both;"> </p>
				</div>
				<div class="PostFooter">
					<div class="bottomaction"> <?php echo $this->Form->end(__('Create User')); ?>   </p></div>
				   
					<p style="clear: both;">  </p>
				</div>
			</div>
			</div>
		</div>
    
	<?php 
    }?>


