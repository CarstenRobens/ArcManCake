<?php echo $this->Html->link('Back', array('controller'=>'HousePictures','action'=>'index')) ?>

<h3><big><b><?php echo $house_picture_view['HousePicture']['name']; ?> </b></big></h3>

<p><small>Created: <?php echo $house_picture_view['HousePicture']['created']; ?> </small></p>

<p> <b> Picture: </b> </p>
<p><?php echo $this->Html->image('uploads/houses/'.$house_picture_view['HousePicture']['picture'], array('alt'=> __('BatCave!!', true), 'border' => '0')); ?></p>
<p> <b> Description: </b> </p>
<p> <?php echo $house_picture_view['HousePicture']['description']; ?> </p>
