

<div class="news index">
	<div class="PostBox">
        <div style="height:20px;padding:5px 0px">
            <div class="bread">
                <?php echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte'));?>
            </div>
            
            <p style="clear: both;"></p> 
        </div>
    </div>
	<div class="PostBox">
    <div class="ThreadTitleBox">
        <div class="ThreadTitleContent">
           <h2><?php  echo (Configure::read('__Cakearchitect.company_name_long').' Übersicht der Regionen');?></h2>
        </div> 
        <div class="bottomaction">
         </div> 
         <p style="clear: both;"></p>  
    </div>
    </div>
    
    
    
    
    
   
    
   
    
    
    
	<div class="PostBox">
    	<div class="PostHeader">
        	<h3> Wählen Sie eine Region in der Sie Ihr Traumhaus bauen wollen </h3>
            <p style="clear: both;">  </p>
        </div> 
        
		<div class="PostContent">
        	<div style="padding:3px">
            
            <br />
        	Wählen Sie eine der folgenden Regionen in der Sie Ihr Traumhaus bauen möchten. Alternativ können Sie sich alle angebotenen Kaufobjekte anzeigen lassen, jedoch kommt es dabei zu teilweise erhöhten Ladezeiten.
            <br />
            <br />
            <?php echo $this->Html->link('Duisburg', array('controller' => 'offer','action' => 'region',1276010010,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Düsseldorf', array('controller' => 'offer','action' => 'region',1276010012,0,'Immobilienscout','Kaufobjekte')); ?>;
            <?php echo $this->Html->link('Gelsenkirchen', array('controller' => 'offer','action' => 'region',1276010017,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Krefeld', array('controller' => 'offer','action' => 'region',1276010027,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Leverkusen', array('controller' => 'offer','action' => 'region',1276010029,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Mönchengladbach', array('controller' => 'offer','action' => 'region',1276010034,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Neuss (Rhein-Kreis)', array('controller' => 'offer','action' => 'region',1276010037,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Viersen (Kreis)', array('controller' => 'offer','action' => 'region',1276010051,0,'Immobilienscout','Kaufobjekte')); ?>; 
            <?php echo $this->Html->link('Wesel (Kreis)', array('controller' => 'offer','action' => 'region',1276010053,0,'Immobilienscout','Kaufobjekte')); ?>; 
             
            <br />
            <br />
            Sie können auch die folgende Karte benutzen in dem Sie auf die gewünschte Region klicken und anschließend dem Link in der sich öffnenden Infobox folgen.
            <br />
            <br />
            <br />
            </div> 
        	<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
					<script type="text/javascript">
                      var geocoder;
                      var map;
                      var infowindowLevel = 0;
                      function initialize() {
                        geocoder = new google.maps.Geocoder();
                        
                        var myOptions = {
                          zoom: 9,
                          
                          mapTypeId: google.maps.MapTypeId.ROADMAP
                        }
                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        var address = "Düsseldorf";
                        geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker1 = new google.maps.Marker({
                                map: map, 
                                title: "Düsseldorf",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker1,'<?php echo $this->Html->link('Düsseldorf', array('controller' => 'offer','action' => 'region',1276010012,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
							// Add a Circle overlay to the map.
							/*var circle = new google.maps.Circle({
							  map: map,
							  radius: 6000 ,
							  opacity: 1
							});
						circle.bindTo('center', marker1, 'position');*/
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						
						var address = "Neuss (Rhein-Kreis)";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Neuss (Rhein-Kreis)",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Neuss (Rhein-Kreis)', array('controller' => 'offer','action' => 'region',1276010037,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Duisburg";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Duisburg",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Duisburg', array('controller' => 'offer','action' => 'region',1276010010,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Gelsenkirchen";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Gelsenkirchen",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Gelsenkirchen', array('controller' => 'offer','action' => 'region',1276010017,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Leverkusen";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Leverkusen",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Leverkusen', array('controller' => 'offer','action' => 'region',1276010029,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Viersen (Kreis)";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "'Viersen (Kreis)",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Viersen (Kreis)', array('controller' => 'offer','action' => 'region',1276010051,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Mönchengladbach";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Mönchengladbach",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Mönchengladbach', array('controller' => 'offer','action' => 'region',1276010034,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Wesel (Kreis)";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Wesel (Kreis)",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Wesel (Kreis)', array('controller' => 'offer','action' => 'region',1276010053,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
						var address = "Krefeld";
						geocoder.geocode( { 'address': address}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                            map.setCenter(results[0].geometry.location);
                            var marker2 = new google.maps.Marker({
                                map: map, 
                                title: "Krefeld",
                                position: results[0].geometry.location
                            });
                            attachInfowindow(marker2,'<?php echo $this->Html->link('Krefeld', array('controller' => 'offer','action' => 'region',1276010027,0,'Immobilienscout','Kaufobjekte')); ?>', 0);
                          } else {
                            alert("Geocode was not successful for the following reason: " + status);
                          }
						  
                        });
						
                        
                      }
                      function attachInfowindow(marker,linkstring, number) {
                          var infowindow = new google.maps.InfoWindow(
                              { content: 	'Finden Sie Alle Kaufobjekte in:<br>'+
                                            linkstring,
                                        borderRadius: 4,
                                
                              });
                            
                          google.maps.event.addListener(marker, 'click', function() {
                            
                            infowindow.setZIndex(++infowindowLevel);
                            infowindow.open(map,marker);
                          });
                      }
                    
                      
                    </script>

                    <div style="padding:2px;text-align: justify">
                    <div>
            
            
                    <div id="map_canvas" style="height:500px;"></div>
                    </div>
                    </div>
                    
			
			<p style="clear: both;">  </p>
		</div>
								
		<div class="PostFooter">
			
			<p style="clear: both;">  </p>
		</div>
	</div>
    
   
	
    
	
	
	
	
</div>


	
	