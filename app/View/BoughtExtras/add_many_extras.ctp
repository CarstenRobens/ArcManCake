
<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
</div>
	


<div class="row">
	<h3><?php echo __('Select your extras:');?></h3>
</div>


<?php echo $this->Form->create('List_bool'); ?>
<!---------------------------------------------Categories---------------------------------------------------->
<div class="row">
<?php foreach ($list_categories_view as $index=>$category){ ?>
	<div class="panel panel-success">
       	<div class="panel-heading">
			<h3 class="panel-title">
				<a  class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $index;?>">
					<?php echo $category;?>
				</a>
			</h3>
		</div>
		<div id="collapse<?php echo $index;?>" class="panel-collapse collapse out">
		<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
		<div class="col-xs-1"></div>
		<div class="col-xs-10">	
		<?php foreach($extras_view as $x) { 
			if ($x['MyCategory']['name']==$category){ ?>
			<div class="row">
				
					<input type="hidden" name="data[List_bool][bool_<?php echo $x['MyExtra']['id'];?>]" value="0" id="List_boolBool<?php echo $x['MyExtra']['id'];?>" />
					<input type="checkbox" name="data[List_bool][bool_<?php echo $x['MyExtra']['id'];?>]" value="1" id="List_boolBool<?php echo $x['MyExtra']['id'];?>" /> 
					<?php echo ' <b>'.'&nbsp;&nbsp;&nbsp;'.$x['MyExtra']['name'].'</b>';?>
					
					
					<!-- <?php echo $this->Form->input('bool_'.$x['MyExtra']['id'],array('label'=>'&nbsp;&nbsp;&nbsp;'.$x['MyExtra']['name'],'type'=>'checkbox')); ?> -->
				
			</div>
			<?php }
		} ?>
		</div>
		<div class="col-xs-1"></div>
	
<!----------END PANEL CONTENT-------------->			
			
			
		</div>
		</div>
	</div>
<?php } ?> 

<div class="PostFooter">
			<div class="bottomaction"> <?php echo $this->Form->end(array('label' => __('Save extras'),'text' => 'test','class' => 'btn btn-success')); ?> <p style="clear: both;">  </p></div>
			<p style="clear: both;">  </p>
		</div>
