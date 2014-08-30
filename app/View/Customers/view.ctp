
<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>
</div>
	

<hr >




<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="panel panel-success">
		
			<div class="panel-heading">
				<h3 class="panel-title">
					<?php echo __('Customer:').' '.$customer_view['Customer']['name'].' '.$customer_view['Customer']['surname'];?>
				</h3>
			</div>
			
			<div class="panel-body">
<!-- MAIN -->
			<div class="row">
				<div class="col-md-2"></div>

				<div class="col-md-8">

					<div class="row" style="text-align:right">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<a href=<?php echo $this->Html->url(array('action' => 'edit',$customer_view['Customer']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'customers','action' => 'delete',$customer_view['Customer']['id']),array('confirm'=>'Are you sure?','escape'=>false));?>
						</div>
					</div>
					
					<table>
						<tr>
							<td ><?php echo __('Name:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['name'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Surname:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['surname'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Notes:');?></td>
							<td><div><?php echo $customer_view['Customer']['notes'];?> &nbsp;</div></td>
						</tr>
						
						<tr>
							<td> </td>
							<td> </td>
						</tr>
						<tr>
							<td><?php echo __('Tel. office:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['phone_work'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Tel. private:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['phone_private'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('E-mail:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['email'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Address');?></td>
							<td><div style="text-align: right;">
									<?php echo $customer_view['Customer']['address1'];?>&nbsp;<br>
									<?php if(!empty($customer_view['Customer']['address2'])){echo $customer_view['Customer']['address2'].'&nbsp;<br>';}?>
									<?php echo $customer_view['Customer']['zipcode'].', '.$customer_view['Customer']['city'];?>&nbsp;									
							</div></td>
						</tr>
						<tr>
							<td ><?php echo __('Birthday:');?></td>
							<td><div style="text-align: right;"><?php echo date('d-M-Y',strtotime($customer_view['Customer']['birthday']));?> &nbsp;</div></td>
						</tr>
					</table>
				</div>
				
				<div class="col-md-2"></div>
			</div>
				
<!-- PARTNER -->
			<?php if(!empty($customer_view['Customer']['2nd_surname'])){?>
			<hr>

			<div class="row">
				<div class="col-md-2" style="text-align: right;">
					<h4>
						<?php echo __('Partner:'); ?>
					</h4>
				</div>

				<div class="col-md-8">
					<table>
						<tr>
							<td><?php echo __('Name:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['2nd_name'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Surname:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['2nd_surname'];?> &nbsp;</div></td>
						</tr>
						<?php if(!empty($customer_view['Customer']['2nd_maiden_surname'])){?>
						<tr>
							<td><?php echo __('Maiden name:');?></td>
							<td><div style="text-align: right;"><?php echo $customer_view['Customer']['2nd_maiden_surname'];?> &nbsp;</div></td>
						</tr>
						<?php }?>
						<tr>
							<td><?php echo __('Birthday:');?></td>
							<td><div style="text-align: right;"><?php echo date('d-M-Y',strtotime($customer_view['Customer']['2nd_birthday']));?> &nbsp;</div></td>
						</tr>
					</table>
				</div>

				<div class="col-md-2"></div>
			</div>
			<?php }?>

<!-- CREATED -->
			<hr>

			<div class="row">
					<div class="col-md-2"></div>

					<div class="col-md-8">
						<table>
							<tr>
								<td ><?php echo __('Modified:');?></td>
								<td><div style="text-align: right;"><?php echo date("d-M-Y",strtotime($customer_view['Customer']['modified'])); ?> &nbsp;</div></td>
							</tr>
							<tr>
								<td ><?php echo __('Created:');?></td>
								<td><div style="text-align: right;"><?php echo date("d-M-Y",strtotime($customer_view['Customer']['created'])).' by '.$this->Html->link($customer_view['MyUser']['username'], array('controller'=>'Users','action'=>'view',$customer_view['Customer']['user_id'])); ?> &nbsp;</div></td>
							</tr>
						</table>
					</div>
				
					<div class="col-md-2"></div>
			</div>
			

<!-- PROPOSALS -->
			<hr>
			<hr>
			
			<?php if (!empty($customer_view['MyProposal'])){ ?>
			<div class="row">
					<div class="col-md-2" style="text-align: right;">
						<h4><?php echo __('Proposals:'); ?></h4>
					</div>

					<div class="col-md-8" style="padding-top: 15px">
						<table >
							<?php foreach ($customer_view['MyProposal'] as $x){?>
							<tr>
								<td ><?php echo $this->Html->link($x['name'],array('controller' => 'Proposals','action' => 'view',$x['id'])); ?></td>
								<td><div style="text-align: right;">
									<a href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit',$x['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
									<a href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'delete',$x['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
								</div></td>
							</tr>
							<?php }?>
						</table>
					</div>
				
					<div class="col-md-2"></div>
					<div style="text-align: right"><a class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('controller' => 'Proposals', 'action' => 'add', $customer_view['Customer']['id']));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add proposal');?></a> &nbsp;</div>
			</div>
			
			<?php }else{ ?>
			<div class="row">
		
				<div class="col-md-12" align=center>
					<p><a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'proposals','action' => 'add', $customer_view['Customer']['id']));?> role="button"><span class="glyphicon glyphicon-plus"></span><?php echo __(' Add proposal');?></a></p>
				</div>
    		
    		</div>
 			<?php } ?>
        
<!-- CLOSING TAGS -->       
			</div>	
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
	