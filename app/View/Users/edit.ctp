<div class="users form">

<?php
//Configure::load('Blog_config'); 
$level = Configure::read('Level'); 
?>

<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>Edit user info</legend>
        <?php echo $this->Html->link('Back', array('controller'=>'users','action'=>'index')) ?>
        <?php 
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role',array('options'=> $level));
        ?>
    </fieldset>
    
<?php echo $this->Form->end('Update'); ?>


</div>