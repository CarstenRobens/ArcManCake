<?php 
	$regionarray = array(1276010010=>'Duisburg',1276010012=>'Düsseldorf',1276010017=>'Gelsenkirchen',1276010027=>'Krefeld',1276010029=>'Leverkusen',1276010034=>'Mönchengladbach',1276010037=>'Neuss (Rhein-Kreis)',1276010051=>'Viersen (Kreis)',1276010053=>'Wesel (Kreis)');
	
	$OffersArray = Xml::toArray(Xml::build($OffersArrayXML));
	if($OffersArray['resultlist']['resultlistEntries']['@numberOfHits']!=0){
		$OffersArray_sorted = $OffersArray['resultlist']['resultlistEntries']['resultlistEntry'];
	}
	
	
?>


<div class="row">
	<br>
	<?php  
				if($Region_id==0){
					echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'))
						.' > '
						
						;
				}else{
					echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'))
						.' > '
						.$this->Html->link($regionarray[$Region_id], array('controller' => 'offer','action' => 'region',$Region_id, 'Immobilienscout', 'Kaufobjekte'))
						
						;
				}
			?>
</div>
	


<div class="row">
	<h3> <?php echo __( 'Offers in ',false).$regionarray[$Region_id].__( ':');?> </h3>
</div>

<hr>
    <?php if(!empty($OffersArray_sorted)){
	foreach ($OffersArray_sorted as $offer) {?>

      <div class="row"id="<?php echo $id = str_replace(' ', '+', $offer['resultlist:realEstate']['title']);?>">
	  <?php if(true){
	  
	  ?>
        
		<div class="col-md-1"></div>
		
		<div class="col-md-3">
			<div class="row" style="padding-top:25px">
				<?php
							
						if(empty($offer['resultlist:realEstate']['titlePicture'])){
							echo $this->Html->image('avatar_l.png', array('width' => '120'));
						}
						else{
							
							$last=count($offer['resultlist:realEstate']['titlePicture']['urls']['url'])-4;
							$image_explode = explode("?",($offer['resultlist:realEstate']['titlePicture']['urls']['url'][$last]['@href']));
													
							echo $this->Html->link($this->Html->image($image_explode[0], array('alt'=> __(Configure::read('__Cakearchitect.company_name_short').': '.$offer['resultlist:realEstate']['title'], true)), array('class' => 'featurette-image img-responsive')),
													array('controller' => 'offer','action' => 'view',$offer['resultlist:realEstate']['@id'],$Region_id,$offer['resultlist:realEstate']['title'] ),
													array('escape'=>false));
									
								
						}
					?> 
					
          					
			</div>
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				
					<p >
						<?php echo $this->Html->link($offer['resultlist:realEstate']['title'],array('controller' => 'offer','action' => 'view',$offer['resultlist:realEstate']['@id'],$Region_id, 'Immobilienscout', 'Kaufobjekte',$offer['resultlist:realEstate']['title'])); ?>
						
						
						
					</p>
					<p>
						<table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php echo 'Letzte Änderung: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['@modification'])){ 
                                                
												echo $this->Time->nice( $offer['@modification']);
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Preis: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['price'])){ 
                                                echo $offer['resultlist:realEstate']['price']['value'].' €';
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Wohnfläche: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['livingSpace'])){ 
                                                echo $offer['resultlist:realEstate']['livingSpace'].' m²';
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Grundstückfläche: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['plotArea'])){ 
                                                echo $offer['resultlist:realEstate']['plotArea'].' m²';
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Räume: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['numberOfRooms'])){ 
                                                echo $offer['resultlist:realEstate']['numberOfRooms'];
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Adresse: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['address'])){ 
                                                echo $offer['resultlist:realEstate']['address']['city'].' '.$offer['resultlist:realEstate']['address']['quarter'];
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                
                                
                        </table>
					</p>
				
			</div>
        </div>
        
		<div class="col-md-2"> </div>
		
		<?php }?>
      </div>
	<hr>
    <?php }
	}?>



	
	