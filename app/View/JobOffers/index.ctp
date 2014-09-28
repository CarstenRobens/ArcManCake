<div class="row">
	<h3><?php echo __('Job offers'); ?></h3>
</div>

<?php if($current_user['role']==NULL){?>

<div class="row">
	<div class="col-md-2"></div>
	
	<div class="col-md-8">
		
		<?php foreach ($job_offers_view as $x){
		if($x['JobOffer']['bool_active']){ ?>
		<div class="row">
		
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title" style="text-align:left;">
					<?php echo $x['JobOffer']['name'];?>
					<span style="float:right;" ><?php echo date("d-M-Y",strtotime($x['JobOffer']['modified']));?></span>
				</h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Text->autoParagraph($x['JobOffer']['description']);?>
				<br>
				<div style="text-align:right"><strong><?php echo __('Interested?').' '.$this->Html->link(__('Contact us!'),'mailto:'.$eMail['HR'].'?subject='.__('Job offer:').' '.$x['JobOffer']['name'],array('target'=>'blank')) ?></strong></div>
			</div>
		</div>
		
		</div>
		<?php } 
		}?>
		
		
	</div>
	
	<div class="col-md-2"></div>
	
</div>
<?php }else{?>


<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">


		<table>
			<tr>
				<th><?php echo $this->Paginator->sort('name',__('name')); ?></th>
				<th><?php echo $this->Paginator->sort('bool_active',__('Active?')); ?></th>
				<th><?php echo __('Action'); ?></th>
				<th><?php echo $this->Paginator->sort('created',__('Created')); ?></th>
			</tr>

			<?php foreach($job_offers_view as $x ){ ?>
			<tr>
				<td><?php echo $x['JobOffer']['name']; ?></td>
				<td>
				<?php if ($x['JobOffer']['bool_active']){ ?>
					<span class="glyphicon glyphicon-ok"></span>
				<?php }else{ ?>
					<span class="glyphicon glyphicon-remove"></span>
				<?php } ?>
				</td>
				<td> 
					<?php if($x['JobOffer']['bool_active']){
						$string=__('Deactivate ');
					}else{
						$string=__('Activate ');
					}
					echo $this->Html->link($string, array('action'=>'toggle_activation',$x['JobOffer']['id']));?>
					<a  href=<?php echo $this->Html->url(array('action' => 'edit',$x['JobOffer']['id']));?> ><span class="glyphicon glyphicon-edit"></span> </a>
					<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('action' => 'delete',$x['JobOffer']['id']),array('confirm'=>'Are you sure?', 'class'=>'remove', 'escape'=>false));
					
					?></td>
				<td><?php echo date("d-M-Y",strtotime($x['JobOffer']['created'])).' by '.$this->Html->link($x['MyUser']['username'], array('controller'=>'Users','action'=>'view',$x['MyUser']['id'])); ?></td>
			</tr>
			<?php } ?>
			<?php echo $this->Paginator->numbers(); ?>
			<?php unset($x);?>
		</table>
	</div>

	<div class="col-md-2"></div>

</div>
<hr>
<?php }?>



<?php if ($current_user['role'] < 2 && !empty($current_user) ) {?>


<div class="contactwrapper">
	<div class="view">
		<div class="PostBox">
			<div class="PostContent">
				<div class="PostContentBox">
					<div class="PostMainContentbox">
						<?php echo $this->Form->create('JobOffer',array('class' => 'form-horizontal'));?>
						<legend>
							<?php echo __('Add a new job offer'); ?>
						</legend>
						<?php 
						echo $this->Form->input('name',array('placeholder' => __('Enter the name of the job offer'),'label' => __('Name'),'div' => 'form-group has-success'));
						echo $this->Form->input('description',array('placeholder' => __('Enter a description'),'label' => __('Description'),'div' => 'form-group has-success'));
						?>
						
					</div>
				</div>
			</div>
			<?php echo $this->Form->end(array('label' => __('Save'),'text' => 'test','class' => 'btn btn-success  pull-right buttonwidth')); ?>
			<p style="clear: both;"></p>
		</div>
	</div>
</div>	
	
	
<?php } ?>
