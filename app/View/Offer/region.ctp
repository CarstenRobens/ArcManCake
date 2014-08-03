<?php 
	$regionarray = array(1276010010=>'Duisburg',1276010012=>'Düsseldorf',1276010017=>'Gelsenkirchen',1276010027=>'Krefeld',1276010029=>'Leverkusen',1276010034=>'Mönchengladbach',1276010037=>'Neuss (Rhein-Kreis)',1276010051=>'Viersen (Kreis)',1276010053=>'Wesel (Kreis)');
	
	$OffersArray = Xml::toArray(Xml::build($OffersArrayXML));
	$OffersArray_sorted = $OffersArray['resultlist']['resultlistEntries']['resultlistEntry'];
	
?>

<div class="news index">
	<div class="PostBox">
        <div style="height:20px;padding:5px 0px">
            <div class="bread">
                <?php 
				echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'))
				.' > '
				.$this->Html->link($regionarray[$Region_id], array('controller' => 'offer','action' => 'region',$Region_id, 'Immobilienscout', 'Kaufobjekte'));
				?>
            </div>
            
            <p style="clear: both;"></p> 
        </div>
    </div>
	<div class="PostBox">
    <div class="ThreadTitleBox">
        <div class="ThreadTitleContent">
           <h2><?php  echo (Configure::read('__Cakearchitect.company_name_long').' Kaufobjekte');?></h2>
        </div> 
        <div class="bottomaction">
         </div> 
         <p style="clear: both;"></p>  
    </div>
    </div>
    
    
    
    
            
<?php 

 /*          echo '<h2>Zertifizierung einer Applikation durch den Makler</h2><br/>Diese Funktion wurde auskommentiert!<br/><br/>';
 if(isset($_GET['main_registration'])||isset($_GET['state']))
{
	$aParameter = array('callback_url'=>'http://meine-immocaster-applikation.tld/','verifyApplication'=>true);
	if($oImmocaster->getAccess($aParameter))
	{
		echo '<div id="appVerifyInfo">Registrierung war erfolgreich.</div>';
	}
}
echo '<div id="appVerifyButton"><a @href="'.$PHP_SELF.'?main_registration=1'.'">Applikation zertifizieren</a><br/>Hinweis: Unter IE9 kann es zu Problemen mit der Zertifizierung kommen.</div>';*/
?>
   
    
    
    
    <?php 
	if(!empty($OffersArray_sorted)){
	foreach ($OffersArray_sorted as $offer) {?>
	<div class="PostBox">
    	<div class="PostHeader">
        	<h3><?php echo $this->Html->link($offer['resultlist:realEstate']['title'],array('controller' => 'offer','action' => 'view',$offer['resultlist:realEstate']['@id'],$Region_id, 'Immobilienscout', 'Kaufobjekte',$offer['resultlist:realEstate']['title'])); ?></h3>
            <p style="clear: both;">  </p>
        </div> 
		<div class="PostContent">
			<div class="smallleftBoxHouse">
				<div class="PostHouseContentBox">
					
                     <?php
							
						if(empty($offer['resultlist:realEstate']['titlePicture'])){
							echo $this->Html->image('avatar_l.png', array('width' => '120'));
						}
						else{
							
							$last=count($offer['resultlist:realEstate']['titlePicture']['urls']['url'])-4;
							$image_explode = explode("?",($offer['resultlist:realEstate']['titlePicture']['urls']['url'][$last]['@href']));
													
													echo $this->Html->link($this->Html->image($image_explode[0], array('alt'=> __(Configure::read('__Cakearchitect.company_name_short').': '.$offer['resultlist:realEstate']['title'], true), 'width' => '120', 'height' => '120')),
													array('controller' => 'offer','action' => 'view',$offer['resultlist:realEstate']['@id'],0,$offer['resultlist:realEstate']['title'] ),
													array('escape'=>false));
													
						}
					?> 
					
					
				</div>
			</div>
			<div class="rightBoxHouse" style="width:552px">
				<div class="PostContentBox">
					
						<table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td><?php echo 'Letzte Änderung: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['modification'])){ 
                                                echo $this->Zeit->mkgertime($offer['modification']);
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                <tr>
                                    <td><?php echo 'Preis: ' ?>&nbsp;</td>
                                    <td><div style="text-align:right;">
                                        <?php
                                            if(!empty($offer['resultlist:realEstate']['Price'])){ 
                                                echo $offer['resultlist:realEstate']['Price']['value'].' €';
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
                                            if(!empty($offer['resultlist:realEstate']['Address'])){ 
                                                echo $offer['resultlist:realEstate']['Address']['city'].' '.$offer['resultlist:realEstate']['Address']['quarter'];
                                            }
                                        ?>&nbsp;
                                        </div> </td>
                                    
                                </tr>
                                
                                
                        </table>
                       
                       
					
					
				</div>
			</div>
			<p style="clear: both;">  </p>
		</div>
								
		<div class="PostFooter">
			
			<p style="clear: both;">  </p>
		</div>
	</div>
    <?php }} ?>
	
    
	<div class="PostBox">
    
    	<div style="float:right;">
        	<?php echo $this->Html->image('api-logo.png', array('alt' => 'CakePHP'))?>
            <p style="clear: both;">  </p>
        </div>
        <p style="clear: both;">  </p>
    
    </div>
    
	
	
	
	
</div>


	
	