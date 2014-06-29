<?php
Configure::load('Blog_config'); 
$level = Configure::read('Level'); 
?>


<?php echo $this->Html->link('Back', array('controller'=>'users','action'=>'index')) ?>

<h3><?php echo h($user_view['User']['username']); ?> </h3>

<p><small>Created: <?php echo $user_view['User']['created']; ?> </small></p>

<p> <b>Pass: </b> <?php echo h($user_view['User']['password']); ?> </p>

<p> <b>Role: </b>  <?php echo h($user_view['User']['role']); ?> </p>
