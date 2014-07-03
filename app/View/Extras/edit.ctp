<h3>Add extra</h3>

<?php echo $this->Html->link('Back', array('controller'=>'Extras','action'=>'index')) ?>

	

<?php 
	echo $this->Form->create('Extra',array('enctype'=>'multipart/form-data'));
	
	echo $this->Form->input('name');
	echo $this->Form->input('description');
	echo $this->Form->input('default_price');
	echo $this->Form->input('upload', array('type' => 'file'));
	echo $this->Form->input('bool_custom',array('default' => false));
	echo $this->Form->input('bool_external',array('default' => false));
	echo $this->Form->input('category_id',array('options'=> $list_categories_view));
	
	echo $this->Form->end('Save extra');
?>