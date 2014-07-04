<!-- File: /app/View/Posts/view.ctp --> 
<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'index')) ?>

<h3><big><b><?php echo $proposal_view['Proposal']['name']; ?> </b></big></h3>

<p><small>Created: <?php echo $proposal_view['Proposal']['created'].' by '.$proposal_view['MyUser']['username']; ?> </small></p>

<p> <b>Customer: </b><?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname']; ?> </p>
<p> <b>Land: </b><?php echo $proposal_view['MyLand']['name']; ?> </p>
<p> <b>House: </b><?php echo $proposal_view['MyHouse']['name']; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $proposal_view['Proposal']['notes']; ?> </p>
