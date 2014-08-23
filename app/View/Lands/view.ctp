
<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Lands','action'=>'index')) ?>
</div>
	



<!---------------------------------------------LAND------------------------------------------------------>
	

	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Land');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	
	
	
	
	
	
	<div class="row">
		<div class="col-md-1"> </div>
		
		<div class="col-md-7">
			<strong id="foo" ><?php echo $land_view['Land']['name']; ?></strong> 
			<select id="bar" style="display:none;"></select> 
		</div>
		
		<div class="col-md-3" align=right> 
			<a href=<?php echo $this->Html->url(array('action' => 'edit',$land_view['Land']['id']));?> ><span class="glyphicon glyphicon-edit"></span></a>
		</div>
		
		
		<div class="col-md-1"> </div>
		
	</div>
	
	<?php if(!empty($land_view['Land']['notes'])){ ?>
	<div class="row">
		<div class="col-md-1"> </div>
		
		<div class="col-md-4">
			<?php echo __('Notes:'); ?>
		</div>
		
		<div class="col-md-7">
			<?php echo $land_view['Land']['notes']; ?>
		</div>
		
		<div class="col-md-1"> </div>
		
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-1"> </div>
		<div class="col-md-10">
				<table>
				
					<tr>
						<td >Grundstückskaufpreis Gem.:</td>
						<td style='text-align: right'><?php echo $land_view['Land']['land_size'];?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $land_view['Land']['land_price_per_m2'];?> €/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $subtotal=$land_view['Land']['land_size']*$land_view['Land']['land_price_per_m2'];?> €</td>
						
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
							<?php echo $land_view['Land']['notary_cost']/100*$subtotal;?> €<br>
							<?php echo $land_view['Land']['land_tax']/100*$subtotal;?> €<br>
							<?php echo $land_view['Land']['land_agent_cost']/100*$subtotal;?> €
						</td>
						
					</tr>
					
					<tr>
						<td>Erschließungkosten</td>
						<td style='text-align: right'><?php echo $land_view['Land']['dev_size'];?> m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $land_view['Land']['dev_cost_per_m2'];?> €/m<sup>2</sup></td>
						<td style='text-align: right'><?php echo $subtotal_dev=$land_view['Land']['dev_size']*$land_view['Land']['dev_cost_per_m2'];?> €</td>
						
					</tr>
					
					<tr>
						<td>Bauzinsen 0,25%/Monat</td>
						<td style='text-align: right'><?php echo $land_view['Land']['building_tax'].'%';?></td>
						<td> </td>
						<td style='text-align: right'><?php echo $land_view['Land']['building_tax']/100*$subtotal;?> €</td>
						
					</tr>
					
				</table>
				
				<table>
					<tr>
						<th>Gesamtgrundstücksankauf mit Nebenkosten:</td>
						<th style='text-align: right'><?php echo $total_land=$subtotal_dev+$subtotal*(100+$land_view['Land']['notary_cost']+$land_view['Land']['land_tax']+$land_view['Land']['land_agent_cost'])/100;?> €</td>
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