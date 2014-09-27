
	
    <div class="row">
		<h3><?php echo __('Users'); ?></h3>
	</div>
 
    
    <div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
		
			
			<table>
			<tr>
				
				<th><?php echo $this->Paginator->sort('surname',__('Surname')); ?></th>
				<th><?php echo $this->Paginator->sort('name',__('Name')); ?></th>
				<th><?php echo $this->Paginator->sort('username',__('Username')); ?></th>
				<th><?php echo $this->Paginator->sort('role',__('Role')); ?></th>
				<th><?php echo $this->Paginator->sort('phone',__('Phone')); ?></th>
				<th><?php echo $this->Paginator->sort('email',__('e-mail')); ?></th>
				<?php if($current_user['role']<2){ ?>
				<th><?php echo __('Action'); ?></th>
				<?php } ?>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
				
			</tr>
			<?php
			foreach ($users_view as $User) {?>	
			<tr> 
				
				<td> <?php echo $User['User']['surname'].', ';?></td>
				<td> <?php echo $User['User']['name'];?></td>
				<td> <?php echo $this->Html->link($User['User']['username'], array('controller'=>'users','action'=>'view',$User['User']['id'])); ?></td>
				<td> <?php echo $level[$User['User']['role']];?></td>
				<td> <?php echo $User['User']['phone'];?></td>
				<td> <?php echo $User['User']['email'];?></td>
				<?php if($current_user['role']<2){ ?>
				<td>
					<a  href=<?php echo $this->Html->url(array('action' => 'edit',$User['User']['id']));?> ><span class="glyphicon glyphicon-edit"> </span></a>
					<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"> </span>', array('action' => 'delete',$User['User']['id']), array('escape' => false), __('Are you sure you want to delete this user?'));?>
				</td>
				<?php } ?>
				<td> <?php echo date("d-M-Y",strtotime($User['User']['created'])); ?> </td>
				
			</tr>
			<?php
			}?>
			</table>
		
		</div>
		
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

