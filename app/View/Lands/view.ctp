<!-- File: /app/View/Posts/view.ctp --> 
<?php echo $this->Html->link('Back', array('controller'=>'Lands','action'=>'index')) ?>

<h1><big><b><?php echo $land_view['Land']['name']; ?> </b></big></h1>

<p><small>Created: <?php echo $land_view['Land']['created'].' by '.$land_view['MyUser']['username']; ?> </small></p>

<p> <b>Size: </b><?php echo $land_view['Land']['land_size'].' m2'; ?> </p>
<p> <b>Price: </b><?php echo $land_view['Land']['land_price_per_m2'].' €/m2'; ?> </p>
<p> <b>Notary cost: </b><?php echo $land_view['Land']['notary_cost'].' %'; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $land_view['Land']['notes']; ?> </p>
