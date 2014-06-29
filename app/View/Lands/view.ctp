<!-- File: /app/View/Posts/view.ctp --> 
<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'index')) ?>

<h1><big><b><?php echo $proposal_view['Proposal']['name']; ?> </b></big></h1>

<p><small>Created: <?php echo $proposal_view['Proposal']['created'].' by '.$proposal_view['Proposal']['user_id']; ?> </small></p>

<p> <b>Costumer: </b><?php echo $proposal_view['Proposal']['costumer_id']; ?> </p>
<p> <b>Land: </b><?php echo $proposal_view['Proposal']['land_id']; ?> </p>
<p> <b>House: </b><?php echo $proposal_view['Proposal']['house_id']; ?> </p>
<p> <b>Notes: </b> </p>
<p> <?php echo $proposal_view['Proposal']['notes']; ?> </p>
