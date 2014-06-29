<!-- File: /app/View/Posts/view.ctp --> 
<?php echo $this->Html->link('Back', array('controller'=>'Costumers','action'=>'index')) ?>

<h3><big><b><?php echo $costumer_view['Costumer']['name'].' '.$costumer_view['Costumer']['surname']; ?> </b></big></h3>

<p><small>Created: <?php echo $costumer_view['Costumer']['created']; ?> </small></p>

<p> <b>Phone: </b><?php echo $costumer_view['Costumer']['phone']; ?> </p>
<p> <b>E-mail: </b><?php echo $costumer_view['Costumer']['email']; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $costumer_view['Costumer']['notes']; ?> </p>
