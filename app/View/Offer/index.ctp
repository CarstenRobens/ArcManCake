<?php 
	$regionarray = array(1276010010=>'Duisburg',1276010012=>'Düsseldorf',1276010017=>'Gelsenkirchen',1276010027=>'Krefeld',1276010029=>'Leverkusen',1276010034=>'Mönchengladbach',1276010037=>'Neuss (Rhein-Kreis)',1276010051=>'Viersen (Kreis)',1276010053=>'Wesel (Kreis)');
	$regionnumarray= array(1276010010,1276010012,1276010017,1276010027,1276010029,1276010034,1276010037,1276010051,1276010053);
	
?>

<div class="row">
	<br>
	<?php  echo $this->Html->link('Kaufobjekte', array('controller' => 'offer','action' => 'index', 'Immobilienscout', 'Kaufobjekte')); ?>
</div>
	


<div class="row">
	<h3> <?php  echo (Configure::read('__Cakearchitect.company_name_long').' Übersicht der Regionen');?> </h3>
</div>




<hr>
<div class="row">    
   <div class="col-md-1"></div>
		
	<div class="col-md-10">
		<div class="row">
			<p >
				<h3> Wählen Sie eine Region in der Sie Ihr Traumhaus bauen wollen </h3>
			</p>
			<p>
				Wählen Sie eine der folgenden Regionen in der Sie Ihr Traumhaus bauen möchten.
				<br />
				<br />
				<?php
					for ($idx = 0; $idx < sizeof($regionarray) ; $idx++) {
						if($numoffers[$regionnumarray[$idx]]>0){
							echo $this->Html->link($regionarray[$regionnumarray[$idx]].' ('.$numoffers[$regionnumarray[$idx]].')', array('controller' => 'offer','action' => 'region',$regionnumarray[$idx],0,'Immobilienscout','Kaufobjekte'));
							?><br /><?php
						}
					}
				?>
				 
				<br />
				<br />
				Sie können auch die folgende Karte benutzen in dem Sie auf die gewünschte Region klicken und anschließend dem Link in der sich öffnenden Infobox folgen.
						
			</p>
				
		</div>
    </div>    
	<div class="col-md-1"> </div>
</div>  		
<hr>
    

