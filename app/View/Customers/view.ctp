
<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>
</div>
	

<hr >

<style type="text/css">
.table > tbody > tr > td{
  border: 0px;
}
</style>


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
						<div class="col-md-2" style="text-align: right;">
							<h4>
								<?php echo __('Customer:'); ?>
							</h4>
						</div>
						<div class="col-md-6"></div>
						<div class="col-md-4">
							<a title="<?php echo __('Edit');?>" href=<?php echo $this->Html->url(array('action' => 'edit',$customer_view['Customer']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'customers','action' => 'delete',$customer_view['Customer']['id']),array('confirm'=>'Are you sure?','escape'=>false, 'title'=>__('Delete')));?>
						</div>
					</div>
					
					<div class="row">
				<div class="col-xs-4">
					<p > <?php echo __('Name:'); ?> </p>
					<p > <?php echo __('Surname:'); ?> </p>
					<p > <?php echo __('Notes:'); ?> </p>
				</div>
				<div class="col-xs-8">
					<p > <?php echo ( $customer_view['Customer']['name']); ?> </p>
					<p > <?php echo $customer_view['Customer']['surname']; ?> </p>
					<p > <?php echo $customer_view['Customer']['notes']; ?> </p>
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-xs-4">
					<p > <?php if(!empty($customer_view['Customer']['phone_private'])){
						echo __('Tel. Private:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['phone_work'])){
						echo __('Tel. Office:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['email'])){
						echo __('E-Mail:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address1'])){
						echo __('Address:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address2'])){
						echo __(' &nbsp;  ');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['city'])){
						echo __(' &nbsp;  ');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['birthday'])){
						echo __('Birthday:');
					} ?> </p>
				</div>
				
				<div class="col-xs-4">
					<p > <?php if(!empty($customer_view['Customer']['phone_private'])){
						echo $customer_view['Customer']['phone_private'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['phone_work'])){
						echo $customer_view['Customer']['phone_work'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['email'])){
						echo $customer_view['Customer']['email'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address1'])){
						echo $customer_view['Customer']['address1'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address2'])){
						echo $customer_view['Customer']['address2'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['city'])){
						echo $customer_view['Customer']['zipcode'].', '.$customer_view['Customer']['city'];
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['birthday'])){
						echo date("d-M-Y",strtotime($customer_view['Customer']['birthday']));
					} ?> </p>
				</div>
			</div>
				</div>
				
				<div class="col-md-2"></div>
			</div>
				
<!-- PARTNER -->
			<?php if(!empty($customer_view['Customer']['2nd_surname'])){?>

			<div class="row">
				<div class="col-md-2" style="text-align: right;">
					
				</div>

				<div class="col-md-8">
					<div class="row" style="text-align:right">
						<div class="col-md-2" style="text-align: right;">
							<h4>
								<?php echo __('Partner:'); ?>
							</h4>
						</div>
						<div class="col-md-10"></div>
						
					</div>
					<div class="row">
						<div class="col-xs-4">
							<p > <?php if(!empty($customer_view['Customer']['2nd_name'])){
								echo __('Name:');
							} ?></p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_surname'])){
								echo __('Surname:');
							} ?> </p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_maiden_surname'])){
								echo __('Maiden Surname:');
							} ?> </p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_birthday'])){
								echo __('Birthday:');
							} ?> </p>
						</div>
						<div class="col-xs-8">
							<p > <?php if(!empty($customer_view['Customer']['2nd_name'])){
								echo $customer_view['Customer']['2nd_name'];
							} ?> </p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_surname'])){
								echo $customer_view['Customer']['2nd_surname'];
							} ?> </p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_maiden_surname'])){
								echo $customer_view['Customer']['2nd_maiden_surname'];
							} ?> </p>
							<p > <?php if(!empty($customer_view['Customer']['2nd_birthday'])){
								echo date("d-M-Y",strtotime($customer_view['Customer']['2nd_birthday']));
							} ?> </p>
						</div>
					</div>
			
				</div>

				<div class="col-md-2"></div>
			</div>
			<?php }?>

<!-- CREATED -->

			<div class="row">
					<div class="col-md-2"></div>

					<div class="col-md-8">
					<div class="row">
						<div class="col-xs-4">
							<p > <?php echo __('Created:'); ?> </p>
						</div>
						
						<div class="col-xs-4">
							<p > <?php echo date("d-M-Y",strtotime($customer_view['Customer']['created'])).' by '.$this->Html->link($customer_view['MyUser']['username'], array('controller'=>'Users','action'=>'view',$customer_view['Customer']['user_id'])); ?> </p>
						</div>
					</div>
					</div>
				
					<div class="col-md-2"></div>
			</div>
			

			<!-- PROPOSALS -->
							
			<?php if (!empty($customer_view['MyProposal'])){ ?>
			<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="row" style="text-align:right">
							<div class="col-md-2" style="text-align: right;">
								<h4>
									<?php echo __('Proposals:'); ?>
								</h4>
							</div>
							<div class="col-md-10"></div>
							
						</div>
						<table class="table">
							<?php foreach ($customer_view['MyProposal'] as $x){?>
							<tr>
								<td ><?php echo $this->Html->link($x['name'],array('controller' => 'Proposals','action' => 'view',$x['id'])); ?></td>
								<td><div style="text-align: right;">
									<?php if ($x['bool_locked']==1){
										$string=__('Unlock');
										$button= 'danger';
									}else{
										$string=__('Lock');
										$button= 'success';
									}?>
									<a  style="margin-right:10px" class="btn btn-xs btn-<?php echo $button;?>" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'toggle_lock',$x['id']));?> ><span class="glyphicon glyphicon-lock"> <?php echo $string;?></span></a>
									<a title="<?php echo __('Edit');?>" class="locked<?php echo $x['id'];?>" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit',$x['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
									<a title="<?php echo __('Delete');?>" class="locked<?php echo $x['id'];?>" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'delete',$x['id']));?> ><span class="glyphicon glyphicon-remove"></span></a>
									<?php if($x['bool_locked']){?>
										<style>
											.locked<?php echo $x['id'];?>{
												visibility:hidden
											}
										</style>
									<?php }?> 
								</div></td>
							</tr>
							<?php }?>
						</table>
					</div>
				
					<div class="col-md-2"></div>
					<div style="text-align: right"><a  class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('controller' => 'Proposals', 'action' => 'add', $customer_view['Customer']['id']));?> ><span class="glyphicon glyphicon-plus"></span> <?php echo __('Add proposal');?></a> &nbsp;</div>
			</div>
			
			<?php }else{ ?>
			<div class="row">
		
				<div class="col-md-12" align=center>
					<p><a  class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'proposals','action' => 'add', $customer_view['Customer']['id']));?> role="button"><span class="glyphicon glyphicon-plus"></span><?php echo __(' Add proposal');?></a></p>
				</div>
    		
    		</div>
 			<?php } ?>
        
<!-- CLOSING TAGS -->       
			</div>	
		</div>
	</div>
	<div class="col-md-2"></div>
</div>
	