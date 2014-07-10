<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
<?php 
$list_lands_view[0]=' ';

echo $this->Form->create('Proposal');

echo $this->Form->input('land_id',array('options'=> $list_lands_view));

echo $this->Form->end('Add land to proposal');
?>

