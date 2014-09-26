<?php

	
	$Expose = Xml::toArray(Xml::build($ExposeArrayXML));
	//debug($Expose);
	$ExposeAtt = Xml::toArray(Xml::build($ExposeAttArrayXML));
	//debug($ExposeAtt);
	$regionNRarray = array('Duisburg'=>1276010010,'Düsseldorf'=>1276010012,'Gelsenkirchen'=>1276010017,'Krefeld'=>1276010027,'Leverkusen'=>1276010029,'Mönchengladbach'=>1276010034,'Neuss (Rhein-Kreis)'=>1276010037,'Viersen (Kreis)'=>1276010051,'Wesel (Kreis)'=>1276010053);
	$regionarray = array(1276010010=>'Duisburg',1276010012=>'Düsseldorf',1276010017=>'Gelsenkirchen',1276010027=>'Krefeld',1276010029=>'Leverkusen',1276010034=>'Mönchengladbach',1276010037=>'Neuss (Rhein-Kreis)',1276010051=>'Viersen (Kreis)',1276010053=>'Wesel (Kreis)',0=>'Alle anzeigen');
?>

<style>
     #map-container { height: 300px }
</style>

<div class="House index">

    

<div class="row">
	<br>
	<?php  
				if($Region_id==0){
					echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'))
						.' > '
						.$this->Html->link('Expose: '.$Expose['expose']['realEstate']['@id'], array('controller' => 'offer','view' => 'category',$Expose['expose']['realEstate']['@id'], 'Immobilienscout', 'Kaufobjekte', $Expose['expose']['realEstate']['title']))
						
						;
				}else{
					echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'))
						.' > '
						.$this->Html->link($regionarray[$Region_id], array('controller' => 'offer','action' => 'region',$Region_id, 'Immobilienscout', 'Kaufobjekte'))
						.' > '
						.$this->Html->link('Expose: '.$Expose['expose']['realEstate']['@id'], array('controller' => 'offer','view' => 'category',$Expose['expose']['realEstate']['@id'], 'Immobilienscout', 'Kaufobjekte', $Expose['expose']['realEstate']['title']))
						
						;
				}
	?>
</div>
    
<!---------------------------------------------Main Panel------------------------------------------------------>

<?php if (!empty($Expose['expose']['realEstate'])){ ?>		
<!----------PANEL CONTENT------------------>	
	
	<div class="row">
		<div class="col-md-8">
			<div class="row">
				<div class="panel panel-success">
				<!---------- Left PANEL CONTENT------------------>
					<div class="panel-heading">
						<h3 class="panel-title" style="text-align: center"><?php echo $Expose['expose']['realEstate']['title'];?></h3>
					</div>
					<div class="panel-body">
					
					<div style="padding:3px">
							<?php  
							$last=count($Expose['expose']['realEstate']['titlePicture']['urls']['url'])-4;
							$image_explode = explode("?",($Expose['expose']['realEstate']['titlePicture']['urls']['url'][$last]['@href']));
							$image_url = strstr($image_explode[0], '/ORIG/resize', true);
							echo $this->Html->link(
								$this->Html->image(
									$image_url, array( "class" => "featurette-image img-responsive", "alt"=>" ")),
								$image_url,
								array('escape'=>false,'data-lightbox'=>'summary')
							); 
							?> 
							
							
						
					</div>
					<div style="padding:16px;text-align: justify">
						<h3> Informationen </h3>
						<?php 
							if(!empty($Expose['expose']['realEstate']['descriptionNote'])){
								$body = $Expose['expose']['realEstate']['descriptionNote'];
								echo ( $this->Text->autoLink($body));
							} else {
								echo 'Nicht vorhanden';
							}
						?>
						<br />
						<br />
						<h3> Zusätzliche Informationen </h3>
						<?php 
							if(!empty($Expose['expose']['realEstate']['otherNote'])){
								$body_long = $Expose['expose']['realEstate']['otherNote'];
								echo ( $this->Text->autoLink($body_long));
							} else {
								echo 'Nicht vorhanden';
							}
						?>
						<br />
						<br />
						<h3> Über die Region </h3>
						<?php 
							if(!empty($Expose['expose']['realEstate']['locationNote'])){
								$body_long = $Expose['expose']['realEstate']['locationNote'];
								echo ( $this->Text->autoLink($body_long));
							} else {
								echo 'Nicht vorhanden';
							}
						?>
						
					</div>
					<p style="clear: both;">  </p>
					
					
					</div>
				</div>
				<!---------- END Left PANEL CONTENT------------------>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-success">
				<!---------- Right PANEL CONTENT------------------>
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align: center"><?php echo __('Address');?></h3>
				</div>
				<div class="panel-body">
					<div id="map-container" class="col-md-12">
						<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
						<script>    
					 
						
						var geocoder;
						  function init_map() {
							geocoder = new google.maps.Geocoder();
							
							var var_mapoptions = {
									  zoom: 12
									};
							
						
							geocoder.geocode( { 'address': '<?php echo $Expose['expose']['realEstate']['address']['city'].' '.$Expose['expose']['realEstate']['address']['quarter']; ?>' }, function(results, status) {
								if (status == google.maps.GeocoderStatus.OK) {
								  var_map.setCenter(results[0].geometry.location);
								  var var_marker = new google.maps.Marker({
									  map: var_map,
									  position: results[0].geometry.location
								  });
								  
								} else {
								  alert('Geocode was not successful for the following reason: ' + status);
								}
							});
							
							
					 
							var var_map = new google.maps.Map(document.getElementById("map-container"),
								var_mapoptions);
					 
							var_marker.setMap(var_map);    
					 
						  }
					 
						  google.maps.event.addDomListener(window, 'load', init_map);
					 
						</script>
					</div>
					<div style="padding:3px;text-align: center"> 
						<div style="padding:6px;">
							<p style="clear: both;">  </p>
							<br>
							<?php echo $Expose['expose']['realEstate']['address']['postcode'].' '.$Expose['expose']['realEstate']['address']['city']; ?><br>
							<?php echo $Expose['expose']['realEstate']['address']['quarter']; ?>&nbsp;
							
						</div>
					</div>
				</div>
			</div>
			<!---------- END Right PANEL CONTENT------------------>
			<div class="panel panel-success">
				<!---------- Right PANEL CONTENT------------------>
				<div class="panel-heading" style="text-align: center">
					<h3 class="panel-title" ><?php echo __('€ Price');?></h3>
				</div>
				<div class="panel-body">
					<div style="padding:3px;">
						<table cellpadding="0" cellspacing="0">
						
								
								<tr>
									<td><?php echo 'Kaufpreis:' ?>&nbsp;</td>
									<td><div style="text-align:right;">
										<?php
											if(!empty($Expose['expose']['realEstate']['price'])){ 
												echo number_format(floatval($Expose['expose']['realEstate']['price']['value']), 2, ',', '.').'€*';
											} else {
												echo floatval($Expose['expose']['realEstate']['baseRent']).' € *';
											} 
										?>&nbsp;
										</div> </td>
									
								</tr>
								<?php if(!empty($Expose['expose']['realEstate']['Courtage']['hasCourtage'])){ ?>
								<?php if($Expose['expose']['realEstate']['Courtage']['hasCourtage']=='YES'){ ?>
								<tr>
									<td><?php echo 'Provision:' ?>&nbsp;</td>
									<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['Courtage']['courtage'] ?>&nbsp;</div> </td>
									
								</tr>
								<?php } ?>
								<?php } ?>
								
						</table>
							<?php if(!empty($Expose['expose']['realEstate']['Courtage']['courtageNote'])){ ?>
							<?php if($Expose['expose']['realEstate']['Courtage']['hasCourtage']=='YES'){ ?>
							<div style="padding:6px;">
								<?php echo $Expose['expose']['realEstate']['Courtage']['courtageNote']; ?>&nbsp;
							</div>
							<?php } ?>
							<?php } ?>
					</div>
					<p style="clear: both;">  </p>
				</div>
				<!---------- END Right PANEL CONTENT------------------>
			</div>
			
			<div class="panel panel-success">
				<!---------- Right PANEL CONTENT------------------>
				<div class="panel-heading">
					<h3 class="panel-title" style="text-align: center"><?php echo __('Details');?></h3>
				</div>
				<div class="panel-body">
					<div style="padding:3px;">
						<table cellpadding="0" cellspacing="0">
						
								<?php if(!empty($Expose['expose']['realEstate']['livingSpace'])){ ?>
									<tr>
										<td><?php echo 'Wohnfläche:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['livingSpace'].' m²' ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['plotArea'])){ ?>
									<tr>
										<td><?php echo 'Grundstücksfläche:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['plotArea'].' m²' ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['numberOfRooms'])){ ?>
									<tr>
										<td><?php echo 'Zimmer:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['numberOfRooms'] ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['numberOfFloors'])){ ?>
									<tr>
										<td><?php echo 'Etagen:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['numberOfFloors'] ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['usableFloorSpace'])){ ?>
									<tr>
										<td><?php echo 'Etagenfläche:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['usableFloorSpace'].' m²' ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['numberOfBedRooms'])){ ?>
									<tr>
										<td><?php echo 'Schlafzimmer:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['numberOfBedRooms'] ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['constructionYear'])){ ?>
									<tr>
										<td><?php echo 'Baujahr:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['constructionYear'] ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['lastRefurbishment'])){ ?>
									<tr>
										<td><?php echo 'Letzte Sanierung:' ?>&nbsp;</td>
										<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['lastRefurbishment'] ?>&nbsp;</div> </td>
										
									</tr>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['buildingType'])){ ?>
									<?php if(($Expose['expose']['realEstate']['buildingType'])=='SINGLE_FAMILY_HOUSE'){ ?>
										<tr>
											<td><?php echo 'Gebäudeart:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Einfamilienhaus' ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
									<?php if(($Expose['expose']['realEstate']['buildingType'])=='MULTI_FAMILY_HOUSE'){ ?>
										<tr>
											<td><?php echo 'Gebäudeart:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Mehrfamilienhaus' ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['condition'])){ ?>
									<?php if(($Expose['expose']['realEstate']['condition'])=='MINT_CONDITION'){ ?>
										<tr>
											<td><?php echo 'Gebäudezustand:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'gepflegt' ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
									<?php if(($Expose['expose']['realEstate']['condition'])=='FIRST_TIME_USE'){ ?>
										<tr>
											<td><?php echo 'Gebäudezustand:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Neubau' ?>&nbsp;</div> </td>
											
										</tr>
									<?php }else{ ?>
										<tr>
											<td><?php echo 'Gebäudezustand:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['condition'] ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['interiorQuality'])){ ?>
									<?php if(($Expose['expose']['realEstate']['interiorQuality'])=='SOPHISTICATED'){ ?>
										<tr>
											<td><?php echo 'Ausstattung:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'gehoben' ?>&nbsp;</div> </td>
											
										</tr>
									<?php }else{ ?>
										<tr>
											<td><?php echo 'Ausstattung:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['interiorQuality'] ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['cellar'])){ ?>
									<?php if(($Expose['expose']['realEstate']['cellar'])=='YES'){ ?>
										<tr>
											<td><?php echo 'Keller:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div> </td>
										</tr>
									<?php } else {?>
										<tr>
											<td><?php echo 'Keller:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div></td>
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['numberOfBathRooms'])){ ?>
									<?php if(is_numeric($Expose['expose']['realEstate']['numberOfBathRooms'])){ ?>
										<tr>
											<td><?php echo 'Badezimmer:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['numberOfBathRooms'] ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['guestToilet'])){ ?>
									<?php if(($Expose['expose']['realEstate']['guestToilet'])=='YES'){ ?>
										<tr>
											<td><?php echo 'Gästebadezimmer:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><span class="glyphicon glyphicon-ok"></span></div> </td>
											
										</tr>
									<?php } else {?>
										<tr>
											<td><?php echo 'Gästebadezimmer:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><span class="glyphicon glyphicon-remove"></span></div></td>
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['parkingSpaceType'])){ ?>
									<?php if(($Expose['expose']['realEstate']['parkingSpaceType'])=='UNDERGROUND_GARAGE'){ ?>
										<tr>
											<td><?php echo 'Parkplatz::' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Tiefgarage' ?>&nbsp;</div> </td>
											
										</tr>
									 <?php } else {?>
										<tr>
											<td><?php echo 'Parkplatz::' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['parkingSpaceType'] ?>&nbsp;</div> </td>
											
										</tr>
									 <?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['numberOfParkingSpaces'])){ ?>
									<?php if(is_numeric($Expose['expose']['realEstate']['numberOfParkingSpaces'])){ ?>
										<tr>
											<td><?php echo 'Parkplätze:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['numberOfParkingSpaces'] ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['heatingType'])){ ?>
									<?php if(($Expose['expose']['realEstate']['heatingType'])=='CENTRAL_HEATING'){ ?>
										<tr>
											<td><?php echo 'Heizungsart:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Zentralheizung' ?>&nbsp;</div> </td>
											
										</tr>
									<?php }else{ ?>
										<tr>
											<td><?php echo 'Heizungsart:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $Expose['expose']['realEstate']['heatingType'] ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['FiringTypes']['firingType'])){ ?>
									<?php if(($Expose['expose']['realEstate']['FiringTypes']['firingType'])=='GAS'){ ?>
										<tr>
											<td><?php echo 'Befeuerungsart:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo 'Gas' ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								
								<?php if(!empty($Expose['expose']['realEstate']['balcony'])){ ?>
									<?php if(($Expose['expose']['realEstate']['balcony'])=='YES'){ ?>
										<tr>
											<td><?php echo 'Balcon:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/yes.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } else {?>
										<tr>
											<td><?php echo 'Balcon:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/no.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['garden'])){ ?>
									<?php if(($Expose['expose']['realEstate']['garden'])=='YES'){ ?>
										<tr>
											<td><?php echo 'Garten:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/yes.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } else {?>
										<tr>
											<td><?php echo 'Garten:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/no.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								<?php if(!empty($Expose['expose']['realEstate']['builtInKitchen'])){ ?>
									<?php if(($Expose['expose']['realEstate']['builtInKitchen'])=='YES'){ ?>
										<tr>
											<td><?php echo 'Einbauküche:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/yes.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } else {?>
										<tr>
											<td><?php echo 'Einbauküche:' ?>&nbsp;</td>
											<td><div style="text-align:right;"><?php echo $this->Html->image('/img/no.png'); ?>&nbsp;</div> </td>
											
										</tr>
									<?php } ?>
								<?php } ?>
								
						</table>
						   
					</div>
					<p style="clear: both;">  </p>
					
				</div>
				<!---------- END Right PANEL CONTENT------------------>
			</div>
		</div>
		<div style="text-align:center;"><?php echo __('Interested?').' '.$this->Html->link(__('Write us!'),'mailto:'.$eMail['sales'].'?subject='.__('House:').' '.$Expose['expose']['realEstate']['title'],array('target'=>'blank')) ?> </div>
	</div>
	
	
<!----------END PANEL CONTENT-------------->
<?php } ?>
    
    
<!---------------------------------------------Galerie------------------------------------------------------>

<?php if (!empty($ExposeAtt['attachments']['attachment'])){ ?>		
	<div class="row">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __($Expose['expose']['realEstate']['title'].' - Galerie');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
	
	<div class="row">
		<?php for($j=0; $j<=count($ExposeAtt['attachments']['attachment'])-1; $j++) {
			if (($j % 6) ==0){ ?>
				<div class="row">
				<?php for ($i=0; $i<=5; $i++){ 
					if(!empty($ExposeAtt['attachments']['attachment'][$j+$i]['urls']['url'])){ 
						$Housepicture=$ExposeAtt['attachments']['attachment'][$j+$i];?>
       		     		<div class="col-md-2">
	                		<?php $last=count($Housepicture['urls']['url'])-4;
							$image_explode = explode("?",($Housepicture['urls']['url'][$last]['@href']));
							$image_url = strstr($image_explode[0], '/ORIG/resize', true);
							echo $this->Html->link(
								$this->Html->image(
									$image_url, array( "class" => "featurette-image img-responsive", "alt"=>" ")),
								$image_url,
								array('escape'=>false,'data-lightbox'=>'summary')
							); ?>
						</div>
					<?php }
				}?>
				</div>
			<?php }
		}?>
	</div>
	
	
	
	
<!----------END PANEL CONTENT-------------->
    		</div>
		</div>
	</div>
<?php } ?>
    
    <p style="clear: both;">  </p>
    
    <div class="PostBox" style="text-align: justify; color:#333">
    	<SMALL>Die Wohnflächenberechnung erfolgte nach der Wohnflächenverordnung. Geringfügige Abweichungen bis zu 3% bezogen auf die Gesamtnutz- und Wohnfläche sind bauseits möglich. Weitere Abweichungen können bei Änderungen der Standardausführungen entstehen. Abbildung kann Sonderwünsche enthalten.</SMALL>
    </div>
    <div class="PostBox" style="text-align: justify; color:#333">
    	<SMALL>* Unverbindliche Preisempfehlung. Angebote freibleibend. Abbildungen enthalten Sonderwünsche die nicht Vertragsbestandteil sind, regionale Preis- und Ausstattungsänderungen möglich. Schlüsselfertig im Sinne dieses Angebotes bedeutet: ohne Tapezier- und Teppichverlegearbeiten.</SMALL>
    </div>
    
    
	
	
	<div class="PostBox">
    
    	<div style="float:right;">
        	<?php echo $this->Html->image('api-logo.png', array('alt' => 'CakePHP'))?>
            <p style="clear: both;">  </p>
        </div>
        <p style="clear: both;">  </p>
    
    </div>
	
</div>

