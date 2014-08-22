<?php echo $this->Html->link('Back', array('controller'=>'Extras','action'=>'index')) ?>

<h3><big><b><?php echo $extra_view['Extra']['name']; ?> </b></big> in <?php echo $extra_view['MyCategory']['name']; ?></h3>

<p><small>Created: <?php echo $extra_view['Extra']['created'].' by '.$extra_view['MyUser']['username']; ?> </small></p>

<p> <b> Picture: </b> </p>
<p>
<?php if (!empty($extra_view['Extra']['picture'])){
	echo $this->Html->image('uploads/extras/'.$extra_view['Extra']['picture'], array('alt'=> __(' ', true), 'border' => '0'));
} ?>
</p>
<p> <b> Default price: </b> <?php echo $extra_view['Extra']['default_price']; ?></p>

<p><b> Custom? </b> 
<?php if ($extra_view['Extra']['bool_custom']==true){
	echo 'yes'; 
}else{
	echo 'no';
} ?>
</p>

<p><b> External? </b> 
<?php if ($extra_view['Extra']['bool_external']==true){
	echo 'yes'; 
}else{
	echo 'no';
} ?>
</p>
<p> <b> Description: </b> </p>
<p> <?php echo $this->Text->autoParagraph($extra_view['Extra']['description']);?> </p>
