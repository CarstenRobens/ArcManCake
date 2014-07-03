<?php echo $this->Html->link('Back', array('controller'=>'Houses','action'=>'index')) ?>

<h3><big><b><?php echo $house_view['House']['name']; ?> </b></big></h3>

<p><small>Created: <?php echo $house_view['House']['created'].' by '.$house_view['MyUser']['username']; ?> </small></p>

<p> <b> Type: </b> <?php echo $house_view['House']['type']; ?></p>
<p> <b> Size: </b> <?php echo $house_view['House']['size'].' m2, '.$house_view['House']['floors'].' floors.'; ?> </p>
<p> <b> <?php echo $house_view['House']['price'].' €'; ?> </b></p>
<p> <b> Description: </b> </p>
<p> <?php echo $house_view['House']['description']; ?> </p>

<p>Pictures:</p>
<?php foreach($house_pictures_view as $x ): ?>
<?php echo $this->Html->image('uploads/houses/'.$x['picture'], array('width'=>'40%', 'height' => '40%')); ?>
<?php endforeach; ?>
