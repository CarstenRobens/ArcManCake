<h3><big><b>Edit proposal</b></big> for <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname']; ?></h3>

<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'index')) ?>
<p> </p>
<b>Extras: </b> 
<?php

foreach ($proposal_view['MyBoughtExtra'] as $x):

echo $list_extras_view[$x['extra_id']].' &middot ';

endforeach;

echo $this->Html->link(' Add Extra', array('controller'=>'BoughtExtras','action'=>'add',$proposal_view['Proposal']['id']));
?> 

<?php 
$list_lands_view[0]=' ';
$list_houses_view[0]=' ';

echo $this->Form->create('Proposal');

echo $this->Form->input('name');
echo $this->Form->input('notes');
echo $this->Form->input('land_id',array('options'=> $list_lands_view, 'default' => 0));
echo $this->Form->input('house_id',array('options'=> $list_houses_view, 'default' => 0));

echo $this->Form->end('Save proposal');
?>

