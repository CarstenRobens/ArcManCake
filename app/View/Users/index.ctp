<?php
Configure::load('ArcManCake_config'); 
$level = Configure::read('Level'); 
?>



	
	
    <div class="CategorieTitleBox">
        <div id="Users">
        <?php echo __( 'Users',false);?>
        </div>
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
							
							<?php 
							echo $this->Form->create('User');
							echo $this->Form->input('username',array('label' => __('Username')));
							echo $this->Form->input('password',array('label' => __('Password')));
							echo $this->Form->input('role',array('options'=> $level,'label' => __('Role')));
							echo $this->Form->input('name',array('label' => __('Name')));
							echo $this->Form->input('surname',array('label' => __('Surname')));
							echo $this->Form->input('phone',array('label' => __('Phone Number')));
							echo $this->Form->input('email', array('type' => 'email','label' => __('E-Mail Address')));
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

<?php echo $this->Form->create('ModelName', array(
    'class' => 'form-horizontal',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )));?>
<fieldset>
<?php echo $this->Form->input('Fieldname', array(
    'label' => array('class' => 'control-label'), // the preset in Form->create() doesn't work for me
    )); ?>
</fieldset>
<?php echo $this->Form->end();?>