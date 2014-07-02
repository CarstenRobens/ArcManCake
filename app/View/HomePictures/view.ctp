<?php echo $this->Html->link('Back', array('controller'=>'HomePictures','action'=>'index')) ?>

<h3><big><b><?php echo $home_picture_view['HomePicture']['title']; ?> </b></big></h3>

<p><small>Created: <?php echo $home_picture_view['HomePicture']['created']; ?> </small></p>

<p> <b> Picture: </b> </p>
<p><?php echo $this->Html->image('uploads/home/'.$home_picture_view['HomePicture']['picture'], array('alt'=> __(' ', true), 'border' => '0')); ?></p>
<p> <b> Description: </b> </p>
<p> <?php echo $home_picture_view['HomePicture']['description']; ?> </p>
