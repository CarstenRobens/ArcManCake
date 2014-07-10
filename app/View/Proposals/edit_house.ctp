<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
<?php 
$list_houses_view[0]=' ';

echo $this->Form->create('Proposal');

echo $this->Form->input('house_id',array('options'=> $list_houses_view));

echo $this->Form->end('Add house to proposal');
?>

