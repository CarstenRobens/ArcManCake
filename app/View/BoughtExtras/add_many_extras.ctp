<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>


<div class="CategorieTitleBox">
	<div id="Proposal">
		<?php echo __('Select your extras:');?>
	</div>
</div>

<?php echo $this->Form->create('List_bool'); ?>
<!---------------------------------------------Categories---------------------------------------------------->
<div class="row">
<?php foreach ($list_categories_view as $index=>$category){ ?>
	<div class="panel panel-primary">
       	<div class="panel-heading">
			<h3 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index;?>">
					<?php echo $category;?>
				</a>
			</h3>
		</div>
		<div id="collapse<?php echo $index;?>" class="panel-collapse collapse in">
		<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($extras_view as $x) { 
	if ($x['MyCategory']['name']==$category){ ?>
	<div class="row">
		<input type="hidden" name="data[List_bool][bool_<?php echo $x['MyExtra']['id'];?>]" value="0" id="List_boolBool<?php echo $x['MyExtra']['id'];?>" />
		<input type="checkbox" name="data[List_bool][bool_<?php echo $x['MyExtra']['id'];?>]" value="1" id="List_boolBool<?php echo $x['MyExtra']['id'];?>" /> 
		<?php echo ' <b>'.$x['MyExtra']['name'].'</b>';?>
		
		
		<!-- <?php echo $this->Form->input('bool_'.$x['MyExtra']['id'],array('label'=>$x['MyExtra']['name'],'type'=>'checkbox')); ?> -->
		
	</div>
	<?php }
} ?>

	
<!----------END PANEL CONTENT-------------->			
			
			
		</div>
		</div>
	</div>
<?php } ?> 
</div>
<?php echo $this->Form->end('Save extras'); ?>