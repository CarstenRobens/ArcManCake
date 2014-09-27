<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Users','action'=>'index')) ?>
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
					<?php echo __('User:').' '.$user_view['User']['username'];?>
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
							<a  href=<?php echo $this->Html->url(array('action' => 'edit',$user_view['User']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>',array('controller' => 'Users','action' => 'delete',$user_view['User']['id']),array('confirm'=>'Are you sure?','escape'=>false));?>
						</div>
					</div>
					
					<table class="table">
						<tr style="border-bottom:1px solid grey;">
							<td><strong><?php echo $user_view['User']['username'];?> </strong></td>
							<td><div style="text-align: right;"><?php echo $level[$user_view['User']['role']];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td> </td>
							<td> </td>
						</tr>
						<tr>
							<td ><?php echo __('Name:');?></td>
							<td><div style="text-align: right;"><?php echo $user_view['User']['name'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Surname:');?></td>
							<td><div style="text-align: right;"><?php echo $user_view['User']['surname'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('Phone:');?></td>
							<td><div style="text-align: right;"><?php echo $user_view['User']['phone'];?> &nbsp;</div></td>
						</tr>
						<tr>
							<td><?php echo __('E-mail:');?></td>
							<td><div style="text-align: right;"><?php echo $user_view['User']['email'];?> &nbsp;</div></td>
						</tr>
					</table>
				</div>
				
				<div class="col-md-2"></div>
			</div>
			
<!-- CREATED -->
			<hr>

			<div class="row">
					<div class="col-md-2"></div>

					<div class="col-md-8">
						<table class="table">
							<tr>
								<td ><?php echo __('Modified:');?></td>
								<td><div style="text-align: right;"><?php echo date("d-M-Y",strtotime($user_view['User']['modified'])); ?> &nbsp;</div></td>
							</tr>
							<tr>
								<td ><?php echo __('Created:');?></td>
								<td><div style="text-align: right;"><?php echo date("d-M-Y",strtotime($user_view['User']['created'])); ?> &nbsp;</div></td>
							</tr>
						</table>
					</div>
				
					<div class="col-md-2"></div>
			</div>
			
<!-- CLOSING TAGS -->
			</div>	
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

