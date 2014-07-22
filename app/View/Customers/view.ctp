<?php echo $this->Html->link('Back', array('controller'=>'Customers','action'=>'index')) ?>

	<div class="CategorieTitleBox">
        <div id="Customer">
        <?php echo __( $customer_view['Customer']['name'].' '.$customer_view['Customer']['surname'],false);?>
        </div>
    </div>

    
	<hr >
      <div class="row"id="<?php echo $id = str_replace(' ', '+', $customer_view['Customer']['name']);?>">
	  <?php if(true){?>
        
		<div class="col-md-2">
		</div>
		
		<div class="col-md-2">
		</div>
		
		<div class="col-md-6">
		
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
					<p > <?php if(!empty($customer_view['Customer']['phone'])){
						echo __('Tel. Office:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['email'])){
						echo __('E-Mail:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address1'])){
						echo __('Address:');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['address2'])){
						echo __(' &middot  ');
					} ?> </p>
					<p > <?php if(!empty($customer_view['Customer']['city'])){
						echo __(' &middot  ');
					} ?> </p>
					<p > <?php echo __('Created:'); ?> </p>
				</div>
				
				<div class="col-xs-4">
					<p > <?php if(!empty($customer_view['Customer']['phone'])){
						echo $customer_view['Customer']['phone'];
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
					<p > <?php echo $customer_view['Customer']['created'].' by '.$customer_view['MyUser']['username']; ?> </p>
				</div>
			</div>
			
			
			
			
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Html->link(__('Edit Customer'),array('action' => 'edit',$customer_view['Customer']['id']));?>
					&middot;
					<?php echo $this->Form->postLink(__('Delete Customer'),array('controller' => 'customers','action' => 'delete',$customer_view['Customer']['id']),array('confirm'=>'Are you sure?'));?>
				</div>
			</div>
			
        </div>
        
		<div class="col-md-2">
		</div>
		
		<?php }?>
    </div>
      
      
      
	<hr>
	
	
	<?php if (!empty($customer_view['MyProposal'])){ ?>
		<div class="row">
		
			<div class="col-xs-2">
			</div>
		
			<div class="col-xs-7">
        		<?php echo '<b><big>'.__( 'Proposals:').'</big></b>';?>
    		</div>
		
			<div class="col-xs-3">
				<?php echo $this->Html->link(__('Add proposal'),array('controller' => 'Proposals', 'action' => 'add', $customer_view['Customer']['id']));?>
			</div>
		</div>
		
		
		<?php foreach ($customer_view['MyProposal'] as $x){ ?>
		<div class="row">
		
			<div class="col-xs-3">
			</div>
		
			<div class="col-xs-5">
				<?php echo $this->Html->link($x['name'],array('controller' => 'Proposals','action' => 'view',$x['id'])); ?>
    		</div>
    		
			<div class="col-xs-4">
				<?php echo $this->Html->link(__('Edit'),array('controller' => 'Proposals','action' => 'edit',$x['id']));?>
					&middot;
				<?php echo $this->Form->postLink(__('Delete'),array('controller' => 'Proposals','action' => 'delete',$x['id']),array('confirm'=>'Are you sure?'));?>
			</div>
		</div>
		<?php } ?>
		
	<?php }else{ ?>
		<div class="row">
		
			<div class="col-md-12" align=center>
				<p><a class="btn btn-lg btn-success" href=<?php echo $this->Html->url(array('controller' => 'proposals','action' => 'add', $customer_view['Customer']['id']));?> role="button"><span class="glyphicon glyphicon-plus"></span> Add proposal</a></p>
			</div>
    		
    	</div>
   <?php } ?>
	
        
	