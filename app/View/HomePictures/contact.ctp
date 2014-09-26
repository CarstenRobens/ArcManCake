<div class="row">
	<h3><?php echo __('Contact'); ?></h3>
</div>


<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<div class="panel panel-success panel-body">
		<div class="col-md-6">
			<div id="picture-container">
				<?php echo $this->Html->image('Logo.png', array( "class" => "featurette-image img-responsive", "alt"=>" "))?>
			</div>
			<div id="map-container" style="height:250px;width:100%"></div>
					
		</div>
		<div class="col-md-6" style="text-align:center;padding-top:150px">
			<p><strong><?php echo $info['title'];?></strong><br> 
			<?php echo $info['owner'];?></p>
			
			<p><strong><?php echo __('Address')?></strong> <br>
			<?php echo $info['address'];?><br>
			<?php echo $info['zipcode'].', '.$info['city'];?></p>
			
			<p><strong><?php echo __('Tel.:').' '?></strong><?php echo $info['phone'];?><br> 
			<strong><?php echo __('Fax:').' '?></strong><?php echo $info['fax'];?></p>
			
			<p><strong><?php echo __('Opening time')?> </strong><br> 
			<?php echo $info['opening_time']?></p>
		</div>
		</div>
	</div>
	<div class="col-md-1"></div>

</div>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script>

var geocoder;
function init_map() {
	geocoder = new google.maps.Geocoder();
							
	var var_mapoptions = {zoom: 12};
							
						
	geocoder.geocode( { 'address': '<?php echo $info['address'].' '.$info['city']; ?>' }, function(results, status) {
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
							
	var var_map = new google.maps.Map(document.getElementById("map-container"), var_mapoptions);
					 
	var_marker.setMap(var_map);    
					 
}
					 
google.maps.event.addDomListener(window, 'load', init_map);
					 
</script>
