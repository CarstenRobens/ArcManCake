<?php 
?>
	

	<div class="row">
		<div style="width: 200px;float:left;">
			<img src="img/Logo.png" alt="" width="150">
		</div>
		<div style="float:left;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?></strong>
				</div>
				<div class="panel-body">
				
				<p>
				<?php echo $proposal_view['MyCustomer']['address1'];?><br>
				<?php if(!empty($proposal_view['MyCustomer']['address2'])){echo $proposal_view['MyCustomer']['address2'].'<br>';}?>
				<?php echo $proposal_view['MyCustomer']['zipcode'].' '.$proposal_view['MyCustomer']['city'];?><br>
				</p>
				
				<p>
				<?php echo $proposal_view['MyCustomer']['phone'];?><br>
				<?php echo $proposal_view['MyCustomer']['email'];?><br>
				</p>
				<p>
				<b>Objekt: <?php echo $proposal_view['Proposal']['name'];?></b>
				</p>
				
				
				</div>
			</div>
		</div>
		
		
	</div>
	
	
	
	
	
	<div class="row">
		<div class="panel panel-default">
           	<div class="panel-heading">
				<strong>Grundstückskosten</strong>
			</div>
			<div class="panel-body">
			

				<table>
				
					<tr>
						<td width="40%">Grundstückskaufpreis Gem.:</td>
						<td width="20%" align="right"><?php echo $proposal_view['MyLand']['land_size'];?> m<sup>2</sup></td>
						<td width="20%" align="right"><?php echo $proposal_view['MyLand']['land_price_per_m2'];?> €/m<sup>2</sup></td>
						<td width="20%" align="right"><?php echo $subtotal=$proposal_view['MyLand']['land_size']*$proposal_view['MyLand']['land_price_per_m2'];?> €</td>
						<td> </td>
					</tr>
					
					<tr>
						<td>
							Notarkosten<br>
							Grunderwerbsteuer<br>
							Maklergebühren
						</td>
						<td align="right">
							<?php echo $proposal_view['MyLand']['notary_cost'].'%';?><br>
							<?php echo $proposal_view['MyLand']['land_tax'].'%';?><br>
							<?php echo $proposal_view['MyLand']['land_agent_cost'].'%';?>
						</td>
						<td> </td>
						<td align="right">
							<?php echo $proposal_view['MyLand']['notary_cost']/100*$subtotal;?> €<br>
							<?php echo $proposal_view['MyLand']['land_tax']/100*$subtotal;?> €<br>
							<?php echo $proposal_view['MyLand']['land_agent_cost']/100*$subtotal;?> €
						</td>
						<td> </td>
					</tr>
					
					<tr>
						<td>Erschließungkosten</td>
						<td align="right"><?php echo $proposal_view['MyLand']['dev_size'];?> m<sup>2</sup></td>
						<td align="right"><?php echo $proposal_view['MyLand']['dev_cost_per_m2'];?> €/m<sup>2</sup></td>
						<td align="right"><?php echo $subtotal_dev=$proposal_view['MyLand']['dev_size']*$proposal_view['MyLand']['dev_cost_per_m2'];?> €</td>
						<td> </td>
					</tr>
					
					<tr>
						<td>Bauzinsen 0,25%/Monat</td>
						<td align="right"><?php echo $proposal_view['MyLand']['building_tax'].'%';?></td>
						<td> </td>
						<td align="right"><?php echo $proposal_view['MyLand']['building_tax']/100*$subtotal;?> €</td>
						
						<td> </td>
					</tr>
					
				</table>
				
				<table>
					<tr>
						<th>Gesamtgrundstücksankauf mit Nebenkosten:</td>
						<th align="right"><?php echo $total_land=$subtotal_dev+$subtotal*(100+$proposal_view['MyLand']['notary_cost']+$proposal_view['MyLand']['land_tax']+$proposal_view['MyLand']['land_agent_cost'])/100;?> €</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
	
	
	
	
	
	
	<div class="row">
		<div class="panel panel-default">
           	<div class="panel-heading">
				<strong>Haustyp und Sonderwünsche</strong>
			</div>
			<div class="panel-body">
			
			<table>
					<tr>
						<td><?php echo __('Haus: '.$proposal_view['MyHouse']['name']); ?></td>
						<td> <td>
						<td align="right"> 
							<?php $total_extras=$proposal_view['MyHouse']['price']; echo $total_extras.' €'; ?>
						</td>
						
					</tr>
			
				<?php 
				foreach ($bought_extras_view as $index=>$x){?>			
					<tr>
						<td><?php echo $x['MyExtra']['name']; ?></td>
						<td> <td>
						<td align="right"><?php
						if ($x['MyExtra']['size_dependent_flag']==-2){
							$price=($proposal_view['MyHouse']['size']/$proposal_view['MyHouse']['floors']+$enlargement)*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
						}elseif ($x['MyExtra']['size_dependent_flag']==-1){
							$price=($proposal_view['MyHouse']['size']+$enlargement*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
						}elseif($x['MyExtra']['size_dependent_flag']>0){
							$price=($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'];
						}else{
							$price=$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
						}
						echo $price.' €';
						$total_extras=$total_extras+$price;
						?></td>
						
					</tr>
				
				<?php }?>
			</table>
			<table>
				<tr>
					<th>Gesamt Bau- u. Baunebenkosten:</th>
					<th align="right"><?php echo $total_extras.' €';?></th>
				</tr>
			</table>
			
			</div>
		</div>
	</div>
	
	
	
	
	<div class="row">
		<div class="panel panel-default">
           	<div class="panel-heading">
				<strong>sonstige Kosten</strong>
			</div>
			<div class="panel-body">
			
			<table>
				<?php $total_ext_extras=0; 
				foreach ($bought_external_extras_view as $index=>$x){?>			
					<tr>
						<td><?php echo $x['MyExtra']['name']; ?></td>
						<td> <td>
						<td align="right"><?php echo $price_ext=$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor']; ?> €</td>
						
					</tr>
				<?php $total_ext_extras=$total_ext_extras+$price_ext; 
				}?>
			</table>
			<table>
				<tr>
					<th>Gesamt sonstige Kosten:</th>
					<th align="right"><?php echo $total_ext_extras;?> €</th>
				</tr>
			</table>
			
			
			</div>
		</div>
	</div>
	<div class="row">
		<div class="panel panel-default">
           	
			<div class="panel-body">
			<table>
				<tr>
					<th>Kalkulierte Gesamtkosten:</th>
					<th align="right"><?php echo $total_ext_extras+$total_extras+$total_land;?> €</th>
				</tr>
			</table>
			</div>
		</div>
	</div>
	
	
	