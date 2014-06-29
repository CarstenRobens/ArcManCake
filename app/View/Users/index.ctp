<?php
Configure::load('Blog_config'); 
$level = Configure::read('Level'); 
?>


<h3><?php __('Users')?></h3>
<?php __('blakbfksdjnmjsndfb penis')?>

<table>
	<tr>
		<th>Id</th>
		<th>username</th>
                <th>Role</th>
                <th>password</th>
                <th>Action</th>
		<th>Created</th>
	</tr>

<!-- Here is where we loop through our $users array, printing out post info --> 
	<?php foreach($users_view as $x ): ?>
	<tr> 
		<td> <?php echo $x['User']['id']; ?> </td> 
		<td> <?php echo $this->Html->link($x['User']['username'], array('controller'=>'users','action'=>'view',$x['User']['id'])); ?></td>
                <td> <?php echo $x['User']['role'].' '.$level[$x['User']['role']]?></td>
                <td> <?php echo $x['User']['password']?></td>
                <td> <?php
                echo $this->Html->link('Edit ',array('action' => 'edit',$x['User']['id']));
                echo $this->Form->postLink('Delete',array('controller' => 'users','action' => 'delete',$x['User']['id']),array('confirm'=>'Are you sure?'));
                ?></td>
		<td> <?php echo $x['User']['created']; ?> </td>
	</tr>
	<?php endforeach; ?>
	<?php unset($x); ?>
</table>


<?php 
if ($current_user['role'] < 2 && !empty($current_user) ) {?>


	<?php echo $this->Form->create('User'); ?>
    	<fieldset>
	        <legend>Create user</legend>
    	    <?php echo $this->Html->link('Back', array('controller'=>'users','action'=>'index')) ?>
        	<?php 
  	    	echo $this->Form->input('username');
    	    echo $this->Form->input('password');
        	echo $this->Form->input('role',array('options'=> $level));
        	?>
   		 </fieldset>
    
	<?php echo $this->Form->end('Create User');
}?>
