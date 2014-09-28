
<div class="row">
	<br>
	<?php echo $this->Html->link('Zurück', array('controller'=>'Lands','action'=>'index')) ?>
</div>
	



<!---------------------------------------------LAND------------------------------------------------------>
	

	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Land').': '.$land_view['Land']['name'];?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	
	<div class="row">
		<div class="col-md-1"> </div>
		
		<div class="col-md-3">
			<?php echo $land_view['Land']['built_address'];?><br>
			<?php echo $land_view['Land']['built_zipcode'].', '.$land_view['Land']['built_city'];?><br>
			<?php echo $land_view['Land']['built_region'];?><br>
			<strong><?php echo __('Construction office:');?> </strong>
			<?php echo $land_view['Land']['construction_office'];?>
		</div>
		
		<div class="col-md-1" style="padding-top:20px">
			<strong><?php if(!empty($land_view['Land']['notes'])){ echo __('Notes:');} ?></strong>
		</div>
		
		<div class="col-md-5" style="padding-top:20px">
			<?php if(!empty($land_view['Land']['notes'])){ echo $land_view['Land']['notes'];} ?>
		</div>
		
		<div class="col-md-2" align="center">
			<a title="<?php echo __('Edit');?>" href="<?php echo $this->Html->url(array('controller' => 'Lands','action' => 'edit',$land_view['Land']['id']));?>"><span class="glyphicon glyphicon-edit"></span></a> 
		</div>
		
	</div>

	
	<div class="row">
		<div class="col-md-1"> </div>
		<div class="col-md-10">
				<table>
				
					<tr>
						<td >Grundstückskaufpreis Gem.:</td>
						<td style='text-align: right'><?php echo $land_view['Land']['land_size'];?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($land_view['Land']['land_price_per_m2'],'EUR',array('wholePosition'=>'after'));?>/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($subtotal=$land_view['Land']['land_size']*$land_view['Land']['land_price_per_m2'],'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
					<tr>
						<td>
							Notarkosten<br>
							Grunderwerbsteuer<br>
							Maklergebühren
						</td>
						<td style='text-align: right'>
							<?php echo $land_view['Land']['notary_cost'].'%';?><br>
							<?php echo $land_view['Land']['land_tax'].'%';?><br>
							<?php echo $land_view['Land']['land_agent_cost'].'%';?>
						</td>
						<td> </td>
						<td style='text-align: right'>
							<?php echo $this->Number->currency($land_view['Land']['notary_cost']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?><br>
							<?php echo $this->Number->currency($land_view['Land']['land_tax']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?><br>
							<?php echo $this->Number->currency($land_view['Land']['land_agent_cost']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?>
						</td>
						
					</tr>
					
					<tr>
						<td>Erschließungkosten</td>
						<td style='text-align: right'><?php echo $this->Number->currency($land_view['Land']['dev_size'],'EUR',array('wholePosition'=>'after'));?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($land_view['Land']['dev_cost_per_m2'],'EUR',array('wholePosition'=>'after'));?>/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $this->Number->currency($subtotal_dev=$land_view['Land']['dev_size']*$land_view['Land']['dev_cost_per_m2'],'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
					<tr>
						<td>Bauzinsen 0,25%/Monat</td>
						<td style='text-align: right'><?php echo $land_view['Land']['building_tax'].'%';?></td>
						<td> </td>
						<td style='text-align: right'><?php echo $this->Number->currency($land_view['Land']['building_tax']/100*$subtotal,'EUR',array('wholePosition'=>'after'));?></td>
						
					</tr>
					
				</table>
				
				<table>
					<tr>
						<th>Gesamtgrundstücksankauf mit Nebenkosten:</th>
						<th style='text-align: right'><?php echo $this->Number->currency($total_land=$subtotal_dev+$subtotal*(100+$land_view['Land']['notary_cost']+$land_view['Land']['land_tax']+$land_view['Land']['land_agent_cost'])/100,'EUR',array('wholePosition'=>'after'));?></th>
					</tr>
				</table>
			</div>
		
		<div class="col-md-1"> </div>
		
	</div>
	
	
	
	
<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>