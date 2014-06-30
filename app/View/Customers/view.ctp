<!-- File: /app/View/Posts/view.ctp --> 
<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>

<h3><big><b><?php echo $customer_view['Customer']['name'].' '.$customer_view['Customer']['surname']; ?> </b></big></h3>

<p><small>Created: <?php echo $customer_view['Customer']['created']; ?> </small></p>

<p> <b>Phone: </b><?php echo $customer_view['Customer']['phone']; ?> </p>
<p> <b>E-mail: </b><?php echo $customer_view['Customer']['email']; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $customer_view['Customer']['notes']; ?> </p>
