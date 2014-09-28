<?php 
foreach ($normal_house_pictures_view as $x){
	if ($x['MyHousePicture']['id']==$proposal_view['Proposal']['default_house_picture_id']){
		$default_picture=$x['MyHousePicture'];
	}
}

	foreach ($bought_enlagement as $index=>$x){
		$enlagment = $x;
		$enlagment_price=($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'];
		
	}
	
?>

	<!-------------------------------------- First Page START -------------------------------------->

	<div class="row">
		<div style="width: 200px;float:left;">
			<img src="img/Logo.png" alt="" width="150">
		</div>
		
		
		
	</div>
	
	<div class="row">
		<h2 style = "text-align: center;">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/><?php echo __('Bauwerkvertrag für Ihr'); ?>
		<br/><?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?> ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )
		<br/>
		<br/>
		</h2>
		
	</div>
	
	<div class="row">
		<div style="width: 175px;float:left;">
		<p style="clear: both;">  </p>
		</div>
		<div style="width: 100%;text-align: center;">
			<?php 
			echo $this->Html->image('uploads/houses/'.$default_picture['picture'], array( "class" => "featurette-image img-responsive", "style"=>"center", "width"=>"400")); ?>
		</div>
		
	</div>
	
	<pagebreak  />
	<!-------------------------------------- First Page END -------------------------------------->
	
	<!-------------------------------------- Second Page START -------------------------------------->
	
	
	
	<div class="row">
		<h3><?php echo __('Bauwerkvertrag'); ?>
		<br/></h3>
		
	</div>
	
	<div class="row">
		für ein ausgebautes Haus gemäß Bau- Leistungsbeschreibung
		<br/>
	</div>
	
	
	<div class="row">
		<div style="width: 400px;float:left; padding: 5px">
			<h6> Auftragnehmer: </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; IZ-Haus GmbH</h6> </td>
				</tr>
				<tr>
					<td >Firma<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; Jungfernweg 35a</h6></td>		
				</tr>
				<tr>
					<td >Straße, Hausnummer<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; 41564 Kaarst</h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Postleitzahl Firmensitz</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 5px">
			<h6> Vermittlung durch: </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $proposal_view['MyUser']['name'].' '.$proposal_view['MyUser']['surname'];?></h6> </td>
				</tr>
			</table>
			
		</div>
	</div>
	
	<div class="row">
		<div style="width: 400px;float:left; padding:5px">
			<h6> Auftraggeber: </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?></h6> </td>
				</tr>
				<tr>
					<td >Vor- Zuname<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo $proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6></td>		
				</tr>
				<tr>
					<td >Vor- Zuname / Ehepartner / Mitauftraggeber<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyCustomer']['2nd_maiden_surname'])) echo $proposal_view['MyCustomer']['2nd_maiden_surname'];?></h6></td>		
				</tr>
				<tr>
					<td >Geburtsname<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['address1'])) echo $proposal_view['MyCustomer']['address1'].' '.$proposal_view['MyCustomer']['address2'];?></h6></td>		
				</tr>
				<tr>
					<td >Straße, Hausnummer<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['zipcode'])) echo $proposal_view['MyCustomer']['zipcode'].' '.$proposal_view['MyCustomer']['city'];?></h6></td>		
				</tr>
				<tr>
					<td >Postleitzahl, Wohnort<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['email'])) echo $proposal_view['MyCustomer']['email'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">eMail</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 5px">
			<h6> &nbsp; </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date("d-m-Y",strtotime($proposal_view['MyCustomer']['birthday']));?></h6> </td>
				</tr>
				<tr>
					<td >Geburtsdatum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['2nd_birthday'])) echo date("d-m-Y",strtotime($proposal_view['MyCustomer']['2nd_birthday']));?></h6></td>		
				</tr>
				<tr>
					<td style = "border-bottom: none;">Geburtsdatum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  </h6></td>		
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['phone_private'])) echo $proposal_view['MyCustomer']['phone_private'];?></h6></td>		
				</tr>
				<tr>
					<td >Telefon privat<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyCustomer']['phone_work'])) echo $proposal_view['MyCustomer']['phone_work'];?></h6></td>		
				</tr>
	
				<tr >
					<td style = "border-bottom: none;">Telefon geschäftlich</td>		
				</tr>
			</table>
			
		</div>
	</div>
	
	
	<div class="row">
		<div style="width: 400px;float:left; padding: 5px">
			<h6> Bauort: </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyLand']['built_region'])) echo $proposal_view['MyLand']['built_region'];?></h6> </td>
				</tr>
				<tr>
					<td >Landkreis<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyLand']['built_address'])) echo $proposal_view['MyLand']['built_address'];?></h6></td>		
				</tr>
				<tr>
					<td >Straße, Hausnummer<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyLand']['built_zipcode'])) echo $proposal_view['MyLand']['built_zipcode'].' '.$proposal_view['MyLand']['built_city'];?></h6></td>		
				</tr>
				<tr>
					<td >Postleitzahl, Wohnort<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyLand']['construction_office'])) echo $proposal_view['MyLand']['construction_office'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">zuständiges Bauamt</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 5px">
			<h6> &nbsp; </h6>
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6> </td>
				</tr>
				<tr>
					<td style = "border-bottom: none;"> &nbsp; <br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr>
					<td >Flur<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				
	
				<tr >
					<td style = "border-bottom: none;">Flurstück</td>		
				</tr>
			</table>
			
		</div>
	</div>
	
	
	<div class="row">
		<h6> Hiermit bestelle/n ich/wir untenstehendes Haus.</h6>
	</div>
	
	
	<div class="row">
		<div style="width: 400px;float:left; padding: 5px">
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name']; ?> &nbsp;&nbsp;&nbsp;&nbsp; ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )</h6> </td>
				</tr>
				<tr >
					<td style = "border-bottom: none;">Haustyp</td>		
				</tr>
				
				
			</table>
			
		</div>
		
	</div>
	
	<?php 
	foreach ($bought_extras_view as $index=>$x){
		if ($x['MyExtra']['size_dependent_flag']==-2){
			$price=($proposal_view['MyHouse']['size_din']/$proposal_view['MyHouse']['floors']+$enlargement)*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
		}elseif ($x['MyExtra']['size_dependent_flag']==-1){
			$price=($proposal_view['MyHouse']['size_din']+$enlargement*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
		}elseif($x['MyExtra']['size_dependent_flag']>0){
			$price=($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'];
		}else{
			$price=$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'];
		}
		$summed_extras=$summed_extras+$price;
	}?>
	<div class="row">
		<div style="padding: 10px">
			<table>
				<tr >
					<td style = "border-bottom: none;"> <h6> </h6> </td>
					<td style = "border-bottom: none;"> <h6> Hauspreis </h6> </td>
					<td style = "border-bottom: none; text-align: right;"> <h6><?php echo $this->Number->currency($proposal_view['MyHouse']['price'],'EUR',array('wholePosition'=>'after'));?></h6> </td>
				</tr>
				<tr >
					<td style = "border-bottom: none;"> <h6> Summe Sonderausstattung gemäß Sonderausstattungsliste </h6> </td>
					<td style = "border-bottom: none;"> <h6> + </h6> </td>
					<td style = "border-bottom: none; text-align: right;"> <h6><?php echo $this->Number->currency($summed_extras,'EUR',array('wholePosition'=>'after'));?></h6> </td>
				</tr>
				<?php if(!empty($enlagment)) { ?>
				<tr >
					<td style = "border-bottom: none;"> <h6> Summe Hausvergrößerung und Verkleinerung </h6> </td>
					<td style = "border-bottom: none;"> <h6> + </h6> </td>
					<td style = "border-bottom: none; text-align: right;"> <h6><?php echo $this->Number->currency($enlagment_price,'EUR',array('wholePosition'=>'after'));?></h6> </td>
				</tr>
				<?php }?>
				<tr>
				<tr >
					<th style = "border-bottom: none;"> <h6> &nbsp; </h6> </th>
					<th style = "text-align: right;"> <h6> &nbsp; </h6> </th>
					<th style = "text-align: right;"> <h6> &nbsp; </h6> </th>
				</tr>
				<tr >
					<th style = "border-bottom: none;"> <h6> &nbsp; </h6> </th>
					<th style = "border-bottom: none;"> <h6> &nbsp; </h6> </th>
					<th style = "border-bottom: none;"> <h6> &nbsp; </h6> </th>
				</tr>
				<tr>
					<th style = "border-bottom: none;"><h6> Summe inklusive MwSt. in der gesetzlichen Höhe </h6> </th>
					<th style = "border-bottom: none;"><h6> &nbsp; </h6> </th>
					<th style = "border-bottom: none;" align="right"><h6><?php echo $this->Number->currency($proposal_view['MyHouse']['price']+$summed_extras+$enlagment_price,'EUR',array('wholePosition'=>'after'));?></h6></th>
				</tr>
			</table>
			
		</div>
		
	</div>
	
	<pagebreak  />
	
	<!-------------------------------------- Second Page END -------------------------------------->
	
	<!-------------------------------------- Vertragsgegenstand START -------------------------------------->
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§1 Vertragsgegenstand</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
			<li>Der Auftragnehmer übernimmt die Errichtung des vorstehend genannten Bauvorhabens gemäß Bau- und Leistungsbeschreibung (§15) sowie die örtliche Bauleitung hierfür.
Vertragsgrundlagen sind in der aufgeführten Reihenfolge:
				<br>
				<br>
				<ol type="a">
					<li>dieser Vertrag einschließlich der getroffenen Zahlungsvereinbarungen</li>
					<li>Bauzeichnungen/Pläne zu diesem Vertrag (Grundrisse, Schnitte, Ansichten)</li>
					<li>Anlage Eigenleistungen</li>
					<li>Sonderausstattung</li>
					<li>Sonstige Vereinbarungen</li>
					<li>Baugenehmigung</li>
					<li>die gesetzlichen Regelungen des BGB. <br> &nbsp;</li>
				</ol> Bei Abweichungen oder Zweifelsfällen geht die Bau- und Leistungsbeschreibung (§15 des Vertrages) den Plänen vor. Bei Ausstattungen in den Plänen, die nicht in der Bau- und Leistungsbeschreibung enthalten sind, handelt es sich um unverbindliche Planungsvorschläge.
			</li>
			
			<li>
				<br>
				Der Auftragnehmer ist berechtigt, die gesamte Leistung oder Teilleistungen durch Nachunternehmer erbringen 
zu lassen.
			</li>
			
			<li>
				<br>
				Die Kalkulation des Pauschalpreises durch den Auftragnehmer beruht auf folgenden Voraussetzungen:
				<br>
				<br>
				<ol type="a">
					<li>Das Baugrundstück ist waagerecht, frei von Altlasten sowie Gebäude- und Baumbestand und bezogen auf das Straßenniveau höhengleich. Es liegt ein Bemessungssohlwiderstand von 200 kN/m² und ein Bettungsmodul von 20 MN/m³ vor. Der Boden des Grundstücks entspricht der Bodenklasse 3 oder 4 (Lösbarkeit des Bodens), lässt einen Böschungswinkel von 60° oder größer zu und erfüllt bezüglich der Frostempfindlichkeit die Frostempfindlichkeitsklasse 2. Das Baugrundstück befindet sich in der Bundesrepublik Deutschland und liegt in der Erdbebenzone 0, der Windlastzone 2-Binnenland, der Sommer-Klimaregion A oder B sowie dem Außenlärmpegelbereich II.</li>
					<li>Die Höhenlage des Hauses ist - bezogen auf die Oberkante des Schotterpolsters - ca. 15 cm über der Oberkante des Geländes.</li>
					<li>Der höchste langjährige Grundwasserstand liegt nicht höher als 1 m unter der Gründungssohle.</li>
					<li>Das Dach ist ausgelegt für Schneelastzone 2, Geländehöhe bis 300 m über NN.</li>
					<li>Das ausgehobene Erdreich kann auf dem Grundstück gelagert werden.</li>
					<li>Die Anforderungen gemäß EnEV 2014 sind erfüllt.</li>
					<li>Die Gesamthärte des Trinkwassers von 16° dH wird nicht überschritten.</li>
					<li>Die Nennspannung des Niederspannungsnetzes des Energieversorgungsunternehmers beträgt 220 V/ 380 V ~50 Hz. <br> &nbsp;</li>
				</ol>Sind diese Voraussetzungen nicht erfüllt, hat der Auftragnehmer gegen den Auftraggeber einen Anspruch auf Vergütung der (hieraus bedingten) Mehraufwendungen.
			</li>
			
			
			<li>
				<br>
				Als Rückstauebene wird der höchste Punkt der vorhandenen/geplanten Straße vor dem Grundstück
angenommen. Der Auftragnehmer schuldet nicht die Ausführung von Rückstausicherungen. Sollte der
Auftraggeber Rückstausicherungen wünschen, ist er verpflichtet, dem Auftragnehmer die entstehenden Mehraufwendungen zu vergüten.
			</li>
			
			<li>
				<br>
				Der Auftragnehmer schuldet für das Bauvorhaben einen Schallschutz nach den allgemeinen anerkannten Regeln der Technik. Wünscht der Auftraggeber einen hierüber hinausgehenden Schallschutz, dann hat der Auftragnehmer einen Anspruch auf Vergütung der Mehraufwendungen.
			</li>
			
			<li>
				<br>
				Sollten sich zwischen Vertragsabschluss und Erteilung der Baugenehmigung die EnEV oder sonstige öffentlich-rechtliche Vorschriften ändern, so erhält der Auftragnehmer hieraus resultierende
Mehraufwendungen vom Auftraggeber vergütet.
			</li>
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§2 Vergütung des Auftragnehmers</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Für die nach diesem Vertrag zu erbringenden Leistungen zahlt der Auftraggeber dem Auftragnehmer einen Pauschalpreis gemäß Deckblatt inklusive der zur Zeit des Vertragsabschlusses gültigen gesetzlichen Mehrwertsteuer. Bei Änderungen der Mehrwertsteuer ändert sich der Pauschalpreis entsprechend. Dies gilt nicht für Leistungen, die innerhalb von vier Monaten nach Vertragsabschluss erbracht werden sollen.
			</li>
			
			<li>
				<br>
				An den in Nr. 1.) genannten Pauschalpreis hält sich der Auftragnehmer für die Dauer von 12 Monaten ab Vertragsunterzeichnung gebunden. Kommt der Auftraggeber seinen notwendigen Mitwirkungshandlungen in dieser Zeit nicht nach, bestimmen sich die Rechte und Ansprüche des Auftragnehmers nach den §§642, 643, 645 BGB.
			</li>
			
			<li>
				<br>
				Zusätzliche Kosten, z.B. aus Sonderwünschen, sind - ebenso wie die Prüf- und Genehmigungskosten der Baubehörde selbst - nicht im Pauschalpreis enthalten.
			</li>
			
			<li>
				<br>
				Der Pauschalpreis ist in folgenden Raten zu zahlen:
				<br>
				<br>
				(Haus ohne Keller)
				<ol style="list-style-type: none;">
					<li>10,0 % mit Aushändigung des Bauantrags,Baugrundgutachtens und Planungsgespräch</li>
					<li>10,0 % mit Fertigstellung der Bodenplatte</li>
					<li>15,0 % mit Fertigstellung der tragenden Wände</li>
					<li>13,0 % mit Fertigstellung des Dachstuhls</li>
					<li>12,0 % mit Fertigstellung der Dachdeckung</li>
					<li>11,0 % mit Fertigstellung des Fenstereinbaus</li>
					<li>14,0 % mit Fertigstellung der Rohinstallationen der Gewerke Elektro, Sanitär, Heizung</li>
					<li>6,0 % mit Fertigstellung des Außenputzes oder des Verblendmauerwerks</li>
					<li>5,5 % mit Fertigstellung von Estrich und Geschosstreppe</li>
					<li>3,5 % mit Abnahme<br> &nbsp;</li>
				</ol>
				(Haus mit Keller)
				<li>
				</li>
				<ol style="list-style-type: none;">	
					<li>10,0 % mit Aushändigung des Bauantrags,Baugrundgutachtens und Planungsgespräch</li>
					<li>10,0 % mit Fertigstellung der Bodenplatte  </li>
					<li>10,0 % mit Fertigstellung der Kellerdecke  </li>
					<li>10,0 % mit Fertigstellung der tragenden Wände  </li>
					<li>10,0 % mit Fertigstellung des Dachstuhls </li>
					<li>11,0 % mit Fertigstellung der Dachdeckung  </li>
					<li>10,0 % mit Fertigstellung des Fenstereinbaus  </li>
					<li>14,0 % mit Fertigstellung der Rohinstallationen der Gewerke Elektro, Sanitär, Heizung  </li>
					<li>6,0 % mit Fertigstellung des Außenputzes oder des Verblendmauerwerks  </li>
					<li>5,5 % mit Fertigstellung von Estrich und Geschosstreppe  </li>
					<li>3,5 % mit Abnahme<br> &nbsp;</li>
				</ol>
				Der Bauablauf und damit die Fälligkeit der Teil-/Ratenzahlungen müssen nicht mit der vorstehenden
Reihenfolge übereinstimmen, sondern wird vom Auftragnehmer nach billigem Ermessen festgelegt. Sofern einzelne Leistungen nicht anfallen, ist der jeweilige Vomhundertsatz anteilig auf die übrigen Raten zu verteilen.

				<li>
				</li>
			</li>
			
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§3 Verbraucherbürgschaft</h4>
		<h6>	
		<p style="text-align: justify;">  <br>
		Der Auftragnehmer übergibt dem Auftraggeber zusammen mit der Rechnung für die erste Rate eine
Verbraucherbürgschaft gemäß §632a Abs. 3 BGB in Höhe von 5% der in diesem Vertrag vereinbarten Vergütung des Auftragnehmers.
Erhöht sich die in diesem Vertrag vereinbarte Vergütung des Auftragnehmers um mehr als 10%, ist der Auftragnehmer verpflichtet, dem Auftraggeber zusammen mit der Rechnung für die nächste Rate eine weitere Verbraucherbürgschaft gemäß §632a Abs.3 BGB in Höhe von 5% der zusätzlichen Vergütung zu übergeben.
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§4 Finanzierungsbestätigung des Auftraggebers</h4>
		<h6>	
		<p style="text-align: justify;">  <br>
		Der Auftraggeber ist verpflichtet, dem Auftragnehmer spätestens binnen zwei Wochen nach dem Planungsgespräch einen Nachweis der Verfügbarkeit der Finanzierungsmittel/des Eigenkapitals in Höhe des Vertragspreises durch Vorlage einer unwiderruflichen und unbefristeten Bestätigung eines Geldinstitutes zu erbringen. Aus der Bestätigung muss sich die Verpflichtung des Geldinstitutes gegenüber dem Auftragnehmer ergeben, Zahlungen nach dem vertraglichen Zahlungsplan (bei der Vergütung von Mehr- und Zusatzleistungen nur nach zusätzlicher Zahlungsfreigabe durch den Auftraggeber) ausschließlich direkt an den Auftragnehmer zu leisten. Die Kosten der Bestätigung trägt der Auftraggeber. Der Auftraggeber ist verpflichtet, das Geldinstitut anzuweisen, die vereinbarten
Raten einschließlich eventueller Ergänzungsaufträge nach Baufortschritt auszuzahlen. Etwaige
Leistungsverweigerungs- oder Zurückbehaltungsrechte des Auftraggebers, z.B. wegen Mängeln, bleiben hiervon unberührt.<br>
<br>
Kommt der Auftraggeber seiner Verpflichtung zur Vorlage der Finanzierungsbestätigung nicht fristgerecht nach, so ist der Auftragnehmer berechtigt, vom Vertrag zurückzutreten.
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§5 Bürgschaft des Auftraggebers</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Der Auftraggeber ist verpflichtet, binnen 14 Tagen nach dem Planungsgespräch dem Auftragnehmer eine unbefristete und selbstschuldnerische Bürgschaft eines zuverlässigen Bürgen (Kreditversicherer, Bank oder Sparkasse) in Höhe der letzten Rate (3,5 % - Abnahme) nach §2 Nr. 4 des Vertrages für die Erfüllung sämtlicher ihm obliegender Zahlungsverpflichtungen aus diesem Vertrag zu stellen.<br>
Die Vertragsparteien sind sich darüber einig, dass der Auftragnehmer vor Stellung der Bürgschaft nicht verpflichtet ist, die Arbeiten aufzunehmen. Kommt der Auftraggeber der Verpflichtung zur Stellung der Bürgschaft nicht fristgemäß nach, so ist der Auftragnehmer berechtigt, vom Vertrag zurückzutreten.<br>
Alternativ kann die letzte Rate (3,5% - Abnahme) auf das treuhänderisch verwaltete Baukonto überwiesen werden, wo sie sicher verwahrt ist und erst nach der Endabnahme des Hauses dem Auftragnehmer zu Verfügung steht. Soll sich der Auftraggeber für letztere Alternative entscheiden, erhält er hierzu eine Rechnung über die letzte Rate vor Baubeginn mit der Angabe des entsprechenden Kontos.
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	

	<div class="row">
		<div style="padding: 10px">
		
		<h4>§6 Ausführungszeit</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Der Vertrag kommt mit der schriftlichen Bestätigung des Auftrages durch den Auftragnehmer zustande. Soweit die Bestätigung des Auftragnehmers nicht spätestens 4 Wochen nach Vertragsunterzeichnung durch den Auftraggeber diesem zugeht, gilt der Vertrag als nicht angenommen.
			</li>
			
			<li>
				<br>
				Der Bauantrag wird dem Auftraggeber innerhalb eines Monats nach Vorliegen der in §15 Nr. 2 genannten erforderlichen Unterlagen für die Planung zur Unterschrift ausgehändigt.
			</li>
			
			<li>
				<br>
				Aufgrund des erhöhten Auftragsbestandes beginnt der Auftragnehmer mit der Baumaßnahme 30 Arbeitstage (als Arbeitstage gelten Montag bis Freitag) nach Vorlage aller nachstehend aufgeführten Voraussetzungen zum Baubeginn. Voraussetzungen für den Baubeginn sind:
				<br>
				<br>
				<ol type="a">
					<li>Vorlage der Baugenehmigung</li>
					<li>Vorlage der geprüften bautechnischen Nachweise durch Bauaufsichtsbehörde, das bautechnische
Prüfamt oder anerkannte Prüfingenieure in den Bundesländern, wo eine Prüfung der bautechnischen
Nachweise erforderlich ist</li>
					<li>Vollständige Zahlung der bis dahin laut Zahlungsplan angefallenen Beträge</li>
					<li>Bereitstellung von Bauwasser und Baustrom auf der Baustelle</li>
					<li>Fertigstellung von ausreichend tragfähigen Anfahrtswegen zum Bauobjekt nach §12 falls erforderlich</li>
					<li>Fertigstellung des Bauzauns nach §12, falls die Behörde diesen fordert</li>
					<li>Vorlage der Bürgschaft nach §5 oder der Eingang der Vorauszahlung nach §5</li>
					<li>Einmessung eines Schnurgerüstes durch einen Vermessungsingenieur</li>
					<li>Abschluss einer Wohngebäudeversicherung mit integrierter Feuerrohbauversicherung<br> &nbsp;</li>
				</ol>Alle unter §6 Nr. 3 aufgeführten Voraussetzungen zum Baubeginn sind durch den Auftraggeber zu erbringen.
			</li>
			
			<li>
				<br>
				Die Bauzeit/Ausführungszeit beträgt sechs Monate ab dem vertraglich zugesicherten Baubeginn. In der Bauzeit/Ausführungszeit nicht enthalten sind zusätzlich zu beachtende Austrocknungszeiten der Wand- und Fußbodenkonstruktionen für Maler-, Tapezier- und Bodenbelagsarbeiten.
			</li>
			
			<li>
				<br>
				Die Ausführungszeit verlängert sich im Falle von Bauzeitenverzögerungen; bei Bauunterbrechungen ist zusätzlich ein ausreichender Dispositionszeitraum zu berücksichtigen. Bauzeitverzögerungen sind insbesondere:
				<br>
				<br>
				<ol type="a">
					<li>Schlechtwettertage gemäß dem Berechnungsverfahren des deutschen Wetterdienstes, an denen
aufgrund des jeweiligen Bautenstandes und Wetters, die Arbeit am Bau als nicht zumutbar beurteilt wird,</li>
					<li>Tage der Verspätung des Eingangs der Raten beim Auftragnehmer, soweit die Verspätung nicht auf
Leistungsverweigerungs- und/oder Zurückbehaltungsrechten des Auftraggebers beruht,</li>
					<li>Verzögerungen infolge höherer Gewalt,</li>
					<li>Verzögerungen infolge anderer für den Auftragnehmer unabwendbarer Umstände, insbesondere
Verzögerungen der Baugenehmigungsbehörde und anderer öffentlicher Stellen, mit denen bei
Vertragsabschluss der Auftragnehmer normalerweise nicht rechnen musste und welche der
Auftragnehmer nicht zu vertreten hat,</li>
					<li>Verzögerungen, die aufgrund von Änderungs-/Sonderwünschen des Auftraggebers eingetreten sind.</li>
					<li>Verzögerungen, die nicht im Verantwortungsbereich des Auftragnehmers liegen.<br> &nbsp;</li>
				</ol>
			</li>
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§7 Abnahme</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Der Auftraggeber ist zur Abnahme des Kaufgegenstandes verpflichtet. Den Abnahmetermin hat der Aufragnehmer mit einer Frist von mindestens zwei Wochen schriftlich anzukündigen und dabei den Aufraggeber zur Abnahme aufzufordern. Zur Abnahme findet eine gemeinsame Begehung des Kaufgegenstandes statt. Über diese Begehung ist eine von den Vertragsbeteiligten zu unterzeichnende Niederschrift (das Abnahmeprotokoll) anzufertigen. Die Möglichkeiten einer Abnahme durch schlüssiges Verhalten oder gemäß §240 Abs. 1 Satz 3 BGB werden hierdurch nicht ausgeschlossen. Unwesentliche Mängel oder geringfügige Restarbeiten hindern die Abnahme nicht. Nach der Abnahme hat der Auftragnehmer dem Auftraggeber die Schlüssel zu übergeben.
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§8 Bauablauf</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Der Bauablauf wird durch den Auftragnehmer bestimmt. Dem Auftragnehmer steht das alleinige Hausrecht auf der Baustelle zu. <br>
Der Auftraggeber hat alles zu unterlassen, was die ordnungsgemäße Abwicklung des Bauvorhabens erschwert oder stört. <br>
Der Auftraggeber ist nicht berechtigt, vor Übergabe und Zahlung des gesamten Kaufpreises bauliche Veränderungen oder Eigenleistungen am Werk vorzunehmen. <br>
Das Betreten der Baustelle ist nur in Absprache mit dem Auftragnehmer zulässig. <br>
Das Betreten der Baustelle erfolgt in jedem Fall auf eigene Gefahr und Verantwortung des Auftraggebers. <br>
Die Bauleitung hat allein der Auftragnehmer. Der Aufraggeber ist zur Erteilung von Weisungen auf der Baustelle nicht befugt, insbesondere darf er keine Weisungen an die dort tätigen Subunternehmer geben. <br>

		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
 

	<div class="row">
		<div style="padding: 10px">
		
		<h4>§9 Mängelansprüche</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Für Mängel am Bauwerk gelten die Bestimmungen des Bürgerlichen Gesetzbuches über den Werkvertrag. Die Vertragsbeteiligten sind sich darüber einig, dass dem Auftragnehmer mindestens zwei Nachbesserungsversuche zustehen und es im Einzelfall auch angemessen sein kann, dem Auftragnehmer weitere Nachbesserungsversuche zu ermöglichen. <br>
Der Auftraggeber ist verpflichtet, für Teile von maschinellen, elektrotechnischen und elektronischen Anlagen, bei denen die Wartung Einfluss auf die Sicherheit und Funktionsfähigkeit hat, die vorgesehenen Wartungsarbeiten regelmäßig und vollständig durchzuführen oder durchführen zu lassen. Ist ein Mangel/Schaden darauf zurückzuführen, dass die vorgesehenen Wartungsarbeiten nicht, nicht vollständig oder nicht ordnungsgemäß durchgeführt wurden, stehen dem Auftraggeber Mängelansprüche gegen den Auftragnehmer nicht zu.

		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§10 Zahlungen</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Der Auftragnehmer teilt dem Auftraggeber den Eintritt der Fälligkeit der Raten (§2) mit. Die Fälligkeit der Raten tritt nur ein, wenn ein entsprechender Baufortschritt erreicht ist. Die Fälligkeit der ersten Rate tritt darüber hinaus nur ein, wenn der Auftragnehmer dem Auftraggeber eine Verbraucherbürgschaft gemäß §632a Abs. 3 BGB in Höhe von 5% der in diesem Vertrag vereinbarten Vergütung des Auftragnehmers übergeben hat. Die letzte Rate wird um die bei der Abnahme festgestellte Höhe der Restarbeiten unter Berücksichtigung etwaiger Leistungsverweigerungsrechte des Auftraggebers gekürzt. Der verbleibende Betrag, der nicht von Leistungsverweigerungs- oder Zurückbehaltungsrechten des Auftraggebers erfasst wird, ist mit Abnahme fällig. Im Übrigen wird die letzte Rate sofort nach Erledigung der im Abnahmeprotokoll aufgeführten Restarbeiten und nach Beseitigung der im Abnahmeprotokoll aufgeführten Mängel fällig; etwaige Leistungsverweigerungsrechte des Auftraggebers bleiben hiervon unberührt.
			</li>
			
			<li>
				<br>
				Die Raten sind binnen 14 Tagen nach Rechnungsdatum auf das von einem Steuerberater verwaltete und noch zu benennende Konto des Auftragnehmers zu überweisen. Die Überweisung muss dabei vor Ablauf der Zahlungsfrist bewirkt worden sein. Andere Zahlungsweisen sind ausgeschlossen. Werden einzelne Raten nicht fristgerecht gezahlt, sind sie nach gesetzlicher Regelung ab Verzugseintritt mit jährlich 5 Prozentpunkten über dem Basiszins gemäß §247 BGB, die letzte Rate ab Fälligkeit mit jährlich 4 % zu verzinsen. Die Geltendmachung eines weiteren Verzugsschadens bleibt dem Auftragnehmer vorbehalten.
			</li>
			
			<li>
				<br>
				Eine Aufrechnung gegen Ansprüche des Auftragnehmers ist nur mit unbestrittenen oder rechtskräftig festgestellten Forderungen zulässig, es sei denn, die Gegenforderung des Auftraggebers beruht auf demselben rechtlichen Verhältnis wie dieser Vertrag.
			</li>
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>

	<div class="row">
		<div style="padding: 10px">
		
		<h4>§11 Sonderwünsche</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Der Auftraggeber weist darauf hin, dass Sonderwünsche nur möglich sind, wenn es der Baufortschritt zulässt. Diese können ausschließlich mit dem Auftragnehmer vereinbart werden. Änderungswünsche oder Sonderwünsche dürfen nicht mit Dritten, insbesondere Subunternehmen vereinbart werden. <br>
Mit vorheriger Zustimmung des Auftragnehmers kann der Auftraggeber direkt mit Subunternehmen der Auftragnehmers Sonderwünsche im Auftrag geben.  <br>
Die Ausführung von Sonderwünschen ist im Übrigen nur dann möglich, wenn baurechtliche Vorschriften nicht entgegenstehen und wenn durch die Ausführung der allgemeine Bauablauf nicht beeinträchtigt werden. <br>
Der Auftraggeber hat keinen Rechtsanspruch auf die Berücksichtigung von Sonderwünschen.

		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§12 Leistungen, die der Auftraggeber in Eigenleistung oder durch Dritte zu erbringen hat</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
			<li>Nachstehende Leistungen hat der Auftraggeber in Eigenleistung oder durch Dritte erbringen zu lassen:
				<br>
				<br>
				<ol type="a">
					<li>Maler- und Tapezierarbeiten. Hierzu gehören auch die Malerarbeiten im Außenbereich wie, sofern diese Leistungen nicht explizit vereinbart sind.</li>
					<li>Fußbodenbeläge, soweit sie gemäß der Bau- und Leistungsbeschreibung nicht Leistung des Auftragnehmers sind</li>
					<li>Außenanlagen, u. a. auch notwendige Eingangsstufen, Podeste, Zuwegungen</li>
					<li>Erstellung der Hausanschlüsse und Hausanschlusskosten bis einschließlich Übergabepunkt (Zähler) im Haus (Der Auftraggeber ist für den Anschluss seines Hauses an die Ver- und Entsorgungsnetze verantwortlich. Dies bedeutet termingerechte Bereitstellung und Montage der Hausanschlüsse für Strom, Wasser, Gas, Telefon und Kabelanschluss sowie Anschluss von Schmutz- und ggf. Regenwasserleitungen an die Kanalisation inkl. Druckprobe. Hierzu sind die Informationen zur Ausführung den Anschlussbedingungen des jeweiligen Versorgers zu entnehmen.)</li>
					<li>Zusätzliche Kosten für die Heizung, falls kein Erdgasanschluss vorhanden ist</li>
					<li>Absperrung der Baustelle mit einem Bauzaun, falls dieser von einer Behörde gefordert wird</li>
					<li>Anpassung des Gründungskörpers und der Gründungsleistungen an die Baugrundverhältnisse, wenn die vereinbarten Baugrundverhältnisse gemäß §1 Nr. 3 nicht vorliegen</li>
					<li>Herstellung von ausreichend tragfähigen Anfahrtswegen zum Bauobjekt (Grundlage: schwere
Baufahrzeuge/Kran bis 75 t), Herstellung der freien und ungehinderten Zugänglichkeit des Grundstücks und Beseitigung von Baum- oder Gebäudebestand auf dem Grundstück</li>
					<li>Bauwasser (Mindestwasserdruck 2 bar) und Baustrom (16 A/ 220 V und 32 A/ 380 V) sind vor Baubeginn vom Auftraggeber auf dessen Kosten bereitzustellen</li>
					<li>Verbrauchskosten für Bauwasser, Baustrom sowie für das Aufheizen und Beheizen während der Bauzeit</li>
					<li>Vermessungsingenieurleistungen für Grob- und  Feinabsteckung, Schnurgerüsteinmessung und -erstellung, Sockelabnahme, eventuell erforderliche Kosten für Nivellierung, Bestandseinmessung, Entwässerungsplanung und sonstige Gebühren</li>
					<li>Genehmigungsgebühren für Baugenehmigung, Schlussabnahme und sonstige Abnahmegebühren, behördliche Gebühren einschließlich erforderlicher Prüfingenieurgebühren</li>
					<li>Kosten durch behördliche Auflagen für Schall-/Geräuschimissionsprognosen gemäß TA-Lärm,
Lärmschutzgutachten sowie Brandschutzgutachten</li>
					<li>Grunderwerbsteuer, insbesondere für den Fall, dass das zuständige Finanzamt die in diesem Vertrag vereinbarte Vergütung des Auftragnehmers der Bemessungsgrundlage hinzurechnet</li>
					<li>Anpassung der Gründung und des Hauseingangsbereichs an das Gelände, wenn die geforderte Ebenheit gemäß §1 Nr. 3 des Baugrundstückes nicht gegeben ist oder das Haus in einer anderen Höhe als der Standardhöhe zum Gelände errichtet werden soll bzw. aufgrund erforderlicher höhenmäßiger Anpassung des Hauses zum Anschluss an die Entwässerung</li>
					<li>Alle nicht ausdrücklich vereinbarten Ausstattungs-, Einrichtungsgegenstände oder Einbauteile.</li>
					<li>Erforderliche Zuarbeiten zum Baugesuch entsprechend §15.2</li>
					<li>Abschluss einer Wohngebäudeversicherung mit integrierter Feuerrohbauversicherung vor Baubeginn</li>
					<li>Leistungen, welche der Auftraggeber auf Grund vertraglicher Vereinbarung übernommen hat oder noch übernimmt.<br> &nbsp;</li>
				</ol> 
			</li>
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
 
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§13 Ausführungen von Eigenleistungen gemäß §12</h4>
		<h6>	
		<p style="text-align: justify;">  
		<br>
Der Auftraggeber hat die Eigenleistungen entsprechend den anerkannten Regeln der Technik zu erbringen. Der Auftraggeber wird ausdrücklich darauf hingewiesen, dass Eigenleistungen, welche für die Sicherheit, die Funktionstauglichkeit, die Nutzbarkeit und/oder den Bestand des Bauvorhabens bzw. das Bauvorhaben selbst von wichtiger Bedeutung sind (wie z.B. Abdichtungs-, Dämmungs-, Isolierungs-, Schall-/Brandschutzarbeiten), handwerkliche Fähigkeiten und Spezialkenntnisse voraussetzen, über welche der Auftraggeber ggf. nicht verfügt. Selbst wenn der Auftraggeber über solche Kenntnisse verfügen sollte, kann es dennoch zu Ausführungsfehlern kommen, welche Mängel und/oder Schäden am Bauvorhaben zur Folge haben können. Der Auftragnehmer empfiehlt dem Auftraggeber daher, solche Eigenleistungen nur durch fachkundige und befähigte Personen/Unternehmen ausführen zu lassen. Eine Bauleitung/-aufsicht/-überwachung des Auftragnehmers für die Eigenleistungen des Auftraggebers wird ausdrücklich ausgeschlossen. Eigenleistungen des Auftraggebers dürfen den Bauablauf weder behindern noch unterbrechen. Soweit der Auftraggeber seinen Leistungspflichten nicht oder nicht ordnungsgemäß nachkommt, kann der
Auftragnehmer hieraus resultierende Rechte und Ansprüche, insbesondere Schadensersatzansprüche, geltend machen. Dies gilt auch, wenn die nicht ordnungsgemäße Erbringung von Eigenleistungen zu einem Vermögensschaden des Auftragnehmers, beispielsweise einer Haftung gegenüber Dritten, insbesondere anderen Bauherren, führt.

		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§14 Kündigung</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Das Kündigungsrecht des Auftraggebers richtet sich nach §649 BGB. Das Kündigungsrecht des
Auftragnehmers richtet sich nach §§642, 643 BGB.
			</li>
			
			<li>
				<br>
				Erfolgt eine solche Kündigung vor Baubeginn, ohne dass sie vom Auftragnehmer zu vertreten ist, kann der Auftragnehmer eine pauschale Vergütung bzw. einen pauschalen Schadensersatz in Höhe von 10 % des zur Zeit der Kündigung vereinbarten Netto-Gesamtpreises (ohne Mehrwertsteuer) verlangen. Dem Auftraggeber bleibt es unbenommen nachzuweisen, dass ein Schaden nicht oder nicht in dieser Höhe angefallen ist.
			</li>
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>

	
	
	<div class="row">
		<div style="padding: 10px">
		
		<h4>§15 Bau- und Leistungsbeschreibung</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				<h5> Allgemeine Beschreibung</h5> <br>
Es wird ein ausgebautes Wohnhaus gemäß der nachfolgenden Bau- und Leistungsbeschreibung erstellt (ohne Leistungen nach §12).
			</li>
			
			<li>
				<br>
				<h5>Planungsphase und Ansprechpartner</h5> <br>
Für den Bau des Hauses steht eine erfahrene Baumannschaft von Anfang an als Ansprechpartner zur Verfügung. Diese Mannschaft begleitet den Auftraggeber bis zur Schlüsselübergabe. Welche Leistungen hier vom Auftragnehmer erbracht werden und welche vom Auftraggeber zu erbringen sind,
ist im Folgenden dargestellt.
				<br>
Erforderliche Zuarbeiten zum Baugesuch, die durch den Auftraggeber bis zum Planungsgespräch erbracht werden:
				<br>
				<br>
				<ol type="a">
					<li>Nachweis über die Eigentumsverhältnisse des Grundstücks (aktueller Grundbuchauszug, notarieller
Kaufvertrag, ggf. Zustimmung des Grundstückseigentümers)</li>
					<li>Skizze der gewünschten Lage des Hauses auf dem Grundstück </li>
					<li>aktueller beglaubigter Katasterauszug im Original (in der erforderlichen Anzahl)</li>
					<li>Angaben der unmittelbaren Grundstücksnachbarn</li>
					<li>Amtl. vermessener Lage- und Höhenplan, M 1:250 oder größer</li>
					<li>Skizze der gewünschten Lage des Hauses auf dem Grundstück</li>
					<li>Antrag auf Versorgung mit Wasser, Entwässerungsantrag g) </li>
					<li>sowie alle für die Bauantragserstellung sonst notwendigen Unterlagen, z.B. Freiflächenplanung, Grünordnungsplanung mit Ausgleichs- und Ersatzmaßnahmen, Biotopwertberechnung.<br> &nbsp;</li>
				</ol>
				Leistungen des Auftragnehmers:
				<li>
				</li>
				<ol type="a">	
					<li>Baugrundgutachten<br>
Um das Haus sicher auf dem Baugrund zu gründen, muss ein Baugrundgutachten vor Beginn der
Planungsarbeiten vorliegen. Die Erstellung des Baugrundgutachtens ist im Festpreis enthalten.</li>
					<li>Planungsgespräch<br>
Im Planungsgespräch werden die Grundlagen für die Planungsleistungen festgelegt. Es wird die Lage des Hauses auf dem Grundstück für den Bauantrag vorbereitet. Weiterhin werden die Ergebnisse des
Baugrundgutachtens dem Auftraggeber erklärt. Die Grundstückverhältnisse entsprechend §1 werden
überprüft. Falls wegen des Baugrundgutachtens oder den Grundstücksverhältnissen Änderungen des Hauses notwendig werden sollten, oder der Auftraggeber noch Planänderungen wünscht, so werden diese mit dem Auftraggeber abgestimmt. Nach dem Planungsgespräch wird mit den Planungsleistungen begonnen. Deshalb sind Planänderungen nach dem Planungsgespräch nur noch mit Zustimmung des Auftragnehmers (und gegen Aufpreis) möglich.
					</li>
					<li>Planungsleistungen
Es werden die kompletten Bauantragsunterlagen mit der Statik und Nachweis des energiesparenden
Wärmeschutzes gemäß Energieeinsparverordnung und die Bauzeichnungen im Maßstab 1:100 angefertigt. Weiterhin werden die Berechnung der Wohn- und Nutzflächen erstellt.
Die behördlichen Prüf- und Genehmigungskosten sind nicht im Festpreis enthalten.
Für die Ausführungsphase werden alle notwendigen Werkplanungen im Maßstab 1:50, sowie die notwendigen Detailplanungen unter Beachtung des Baugrundgutachtens erstellt.
					</li>
					<li>Bauantrag<br>
Die kompletten Bauantragsunterlagen zur Baugenehmigung werden dem Auftraggeber zur Einreichung bei der zuständigen Behörde übergeben.
<br> &nbsp;</li>
				</ol>
				
			</li>
			
			
			<li>
				
				Bauleitung und Fremdüberwachung durch Baugutachter<br>
Die Bauleitung koordiniert die Handwerksbetriebe, führt Gütekontrollen durch und überwacht die Ausführung der einzelnen Gewerke für den Auftraggeber. <br>
Durch den unabhängigen Baugutachter findet zunächst eine Überprüfung des Hauses während der Bauphase und dann die Überprüfung des Objekts vor der Abnahme statt. Die Fremdüberwachung erfolgt nur zu vom Auftragnehmer erbrachten Leistungen.
			</li>
			
			
			<li>
				<br>
				Baustelleneinrichtung<br>
Die Baustelle wird mit allen notwendigen Werkzeugen und Gerüsten und einem Baustellen-WC eingerichtet. Der Baustrom- und Bauwasseranschluss muss auf dem Grundstück vorhanden sein. Verpackungsreste und anfallender Bauschutt aus den Leistungen des Auftragnehmers werden entsorgt.
			</li>
			
			
			<li>
				<br>
				Erdarbeiten<br>
Der Mutterboden wird bis zu einer Stärke von 30 cm abgetragen. Nach dem Mutterbodenabtrag erfolgt der Aushub der Streifenfundamente in der statisch erforderlichen Breite und Tiefe. Der Bodenaushub verbleibt auf dem Grundstück. Unterhalb der Bodenplatte wird eine 15 cm starke Schicht aus frostsicherem Material eingebaut. Auf dieser Schicht wird als Trennlage eine Kunststoffbahn aufgebracht. <br>
Sofern vom Versorger zugelassen, werden die Leerrohre für die Medienzuführung zum Hausanschlussraum auf dem kürzesten Weg bis zu 50 cm vor die Hausaußenkante geführt.
			</li>
			
			<li><br>
			Entwässerungsarbeiten<br>
Die Abwasserleitungen mit einem Durchmesser von mindestens 100 mm bestehen einschließlich der
Formstücke aus PVC. Sie werden mit dem erforderlichen Gefälle nach DIN auf dem kürzesten Weg bis zu 50 cm vor die Hausaußenkante geführt.
			</li>
			
			
			<li><br>
			Bodenplatte<br>
Die Bodenplatte wird gemäß Zeichnung aus Stahlbeton oder Stahlfaserbeton nach Wahl des Auftragnehmers in der Betongüte C 25/30 ausgeführt. Zwischen den Haushälften wird aus Schallschutzgründen eine Fuge mit einer Trennwanddämpfung aus Mineralwolle versehen. Die
Streifenfundamente werden falls statisch notwendig, in der erforderlichen Breite und Tiefe hergestellt. Ein Erdungsband aus verzinktem Bandstahl wird eingebaut. Auf der Bodenplatte wird als zusätzlicher Schutz eine Abdichtung gegen Bodenfeuchtigkeit aufgebracht.
			</li>
			
			<li><br>
			Außen- und Innenwände<br>
Die Außenwände werden mit Porenbeton-Plansteinen in der Wandstärke gemäß Zeichnung erstellt. Die Innenwände im Erdgeschoss werden ebenfalls mit Porenbeton-Plansteinen in den Wandstärken gemäß Zeichnung ausgeführt. Bei zweigeschossigen Haustypen mit Obergeschoss werden die Innenwände auch mit Porenbeton-Plansteinen in den Wandstärken gemäß Zeichnung ausgeführt.<br>
Die Innenwände im Dachgeschoss werden als Gipskartonständerwände in den Wandstärken gemäß
Zeichnung mit innenliegender Schalldämmung tapezierfähig verspachtelt erstellt. In Bädern werden
Feuchtraumplatten zur Beplankung der Ständerwände verwendet.			
			</li>
			
			<li><br>
			Haustrennwände<br>
Doppel- und Reihenhaus:<br>
Zum Schutz von Aufenthaltsräumen gegen Schallübertragung aus fremden Wohn- und Arbeitsbereichen wird die Haustrennwand zwischen den Häusern als zweischalige schalldämmende Porenbeton- Plansteinwand mit innenliegender Dämmung aus Mineralwolle erstellt.			
			</li>
			
			<li><br>
			Geschossdecken<br>
Die Geschossdecken mit Ausnahme des Spitzbodens werden nach Wahl des Auftragnehmers als
Filigrandecke mit Aufbeton oder als Beton-Fertigteildecke ausgeführt. Die Deckenstärken laut Zeichnung können geringfügig variieren.			
			
			</li>
			
			<li><br>
			Dach mit Dacheindeckung und Spenglerarbeiten<br>
Die Dachkonstruktion wird aus Nadelholz hergestellt und mit allen erforderlichen Verbindungsmitteln
fachgerecht aufgerichtet. Die Holzabmessungen ergeben sich aus den statischen Erfordernissen. Sichtbare Sparrenköpfe werden gehobelt und grundiert. Die Untersichtschalung für die Trauf- und Giebelüberstände wird aus gehobelten und grundierten Nadelholzbrettern erstellt und wird farblos lasiert. Die Dachüberstände betragen im Traufbereich ca. 50 cm und im Giebelbereich ca. 20 cm.<br>
Die Dacheindeckung erfolgt mit BRAAS-Dachsteinen "Harzer Pfanne 7 (BIG)" (oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges") in den Farben Klassisch-Rot, Dunkelrot, Ziegelrot oder Granit.
Die Unterkonstruktion wird mit Traglattung und Konterlattung belüftet ausgeführt. Eine Flugschneesicherung ist z.B. durch eine Unterspannbahn hergestellt. Der First wird belüftet in mörtelfreier Verlegung ausgeführt. Im Festpreis enthalten sind alle für die Leistung erforderlichen Form- und Durchgangssteine. Die in der Richtlinie des Zentralverbandes des Deutschen Dachdeckerhandwerks (ZVDH) geregelten Maßnahmen zur Sturmsicherung der Dacheindeckung werden ausgeführt (Verklammerung der Dacheindeckung in sturmgefährdeten Teilen des Daches).<br>
Auf Verlangen der Behörde, in z.B. schneereichen Gebieten, kann ein Schneefanggitter vorgeschrieben werden. Dieses ist nicht im Leistungsumfang enthalten, kann aber im Rahmen der sonstigen Vereinbarungen bestellt werden. <br>
Die Dachrinnen und Fallrohre sind witterungsbeständig in Titanzink ausgeführt. Im Festpreis enthalten sind alle für die Leistung erforderlichen Dachrinnen, Formstücke und Regenfallrohre bis zur Oberkante Sockel.
Der nicht ausgebaute Spitzboden bzw. der nicht ausbaufähige Dachraum kann zu Abstellzwecken genutzt werden. Eine Abbretterung, sowie Anschlussleitungen für Strom sind im Spitzboden nicht vorhanden und können vom Auftraggeber in Eigenleistung ausgeführt werden.
			
			</li>
			
			<li><br>
			Putzarbeiten<br>
Die Außenwand bekommt nach Wahl des Auftragnehmers einen mineralischen Außenputz. Der Farbton wird gemeinsam vor Baubeginn nach Farbkarte des Auftragnehmers festgelegt. Die Oberfläche wird mit einer Körnung von 2-3 mm ausgerieben strukturiert. Der Außenputz erhält einen Egalisierungsanstrich.
Die Fensteranschlüsse sind regendicht mit einem Anschlussprofil ausgeführt. <br>
Der Sockelputz wird mit einem Trennprofil vom Wandputz getrennt und glatt ausgerieben. Der Sockelputz wird dabei beginnend im unteren Drittel der Bodenplatte ca. 40-45 cm hoch, jedoch mindestens 30 cm ab Oberkannte geplantem Gelände, ausgeführt. Der Sockelputz erhält einen geeigneten Anstrich.
Im Haus sind die Massivwände, außer im Bereich des Spitzbodens, mit einem mineralischen Dünnputz tapezierfähig (Qualitätsstufe Q2) verspachtelt. Falls ein gemauerter Drempel (Zeichnung) ausgeführt wird, wird dieser mit Gipskartonplatten verkleidet. Die Anschlüsse an die Geschossdecken erhalten einen Kellenschnitt. Die Flächen der Geschossdecken werden tapezierfähig hergestellt, die Fugen werden tapezierfähig verspachtelt.
			</li>
			
			<li><br>
			Fenster und Fenstertüren<br>
Die Fenster und Fenstertüren sind aus weißen Mehrkammer-Kunststoff-Profilen hergestellt, erhalten eine Dreischeiben-Wärmeschutzverglasung (Ug = 0,7 W/m²K) mit Randverbund und werden mit einem Dreh-Kipp-Beschlag ausgestattet. Alle Flügelfenster und Fenstertüren werden mit Anschlagdichtung geliefert und erhalten Einhandbeschläge. Die Fenster- und Fenstertüren sind nicht nur eingeschäumt, sondern zusätzlich auf der Innenseite mit einem Dichtvlies versehen.<br>
Zweiteiliges Terrassentürelement:<br>
Eine Fenstertür mit Dreh-Kipp-Beschlag und ein feststehendes bodentiefes Fensterelement.<br>
Zweiflügeliges Fenster:<br>
Nach Wahl des Auftragnehmers ein Dreh-Kipp-Flügel und ein feststehendes Fensterelement bzw.
Stulp-Fenster mit einem Dreh-Kipp-Flügel und einem Dreh-Flügel.<br>
Es werden Aufsatzrollläden eingebaut. Der Panzer besteht aus Kunststoff in der Farbe hell grau. Der Gurtwickler wird sichtbar angebracht. Die Rollläden für Fenster mit einer Breite ab 1,50 m werden anstelle des Gurtwicklers mit einer Kurbel ausgestattet. 
Dreiecksfenster und Kniestockfenster erhalten keine Rollläden. Vorhandene Dachflächenfenster sind mit einem Außenrollo Screen aus einem kunststoffbeschichteten Glasfasergewebe ausgestattet.
			</li>
			
			<li><br>
			Fensterbänke<br>
Die Außenfensterbänke werden als witterungsbeständige eloxierte Aluminiumfensterbänke eingebaut. Die bodentiefen Fenstertüren im Erdgeschoss erhalten eine steinerne Außensohlbank. Die Innenfensterbänke bestehen aus Marmor oder Granit Rosa Beta, nach Wahl des Auftraggebers. Die Fensterbänke im Bad sind abweichend hiervon gefliest.
			</li>
			
			<li><br>
			Haustür<br>
Die Haustür ist aus weißen Mehrkammer-Kunststoff-Profilen mit glasteilenden Sprossen gemäß Zeichnung hergestellt und erhält eine Ornamentverglasung. Sie besitzt eine Mehrfachverriegelung und wird mit einem Profilzylinder und drei Schlüsseln ausgestattet. Den Haustürgriff liefern wir in beschichteter Ausführung in der Farbe Weiß. Die Haustür wird ebenfalls wie die Fenster nicht nur eingeschäumt sondern auf der Innenseite mit einem Dichtvlies versehen.
			</li>
			
			<li><br>
			Innentüren<br>
Die Innentüren werden als Röhrenspankerntüren Klimaklasse I, Beanspruchungsgruppe N mit den Dekoren Buche, Eiche, Ahorn und Weiß nach Wahl des Auftraggebers eingebaut. Sie werden mit zwei Türbändern, einem Buntbartschloss, einem Schlüssel und einer Drückergarnitur als Rosettengarnitur versehen.
			</li>
			
			<li><br>
			Geschosstreppe und Bodeneinschubtreppe<br>
Es wird eine Treppenanlage in einer offenen Bauweise (System Treppenmeister oder gleichwertig nach Wahl des Auftragnehmers gemäß §15,"Sonstiges") eingebaut.<br>
<br>
System Treppenmeister:<br>
Die Buche Massivholzstufen sind parkettverleimt akzent und mehrfachversiegelt, das Geländer besteht aus silberfarbenen Metallstäben, Rechteckpfosten im An- und Austritt in der Holzart Buche parkettverleimt akzent und einem Rechteckhandlauf aus Buche parkettverleimt massiv. Über die Bauzeit erhält die Treppe einen Stufenschutz auf Trittflächen und Kanten, der vom Auftraggeber in Eigenleistung entfernt wird.
<br>
<br>
In der Dachgeschossdecke wird eine dreiteilige Bodeneinschubtreppe mit wärmegedämmten
Sandwichdeckel, raumseitig weiß beschichtet mit Lukendeckeldichtung und Schnappriegelverschluss eingebaut. Das Rohbau-Lukenmaß beträgt ca. 60/120 cm. Ein
Lukenschutzgeländer ist nicht vereinbart.
			</li>
			
			<li><br>
			Fußboden<br>
Der Fußboden in bewohnten Räumen ist als schwimmender Estrich mit Randstreifen auf Wärme- bzw.
Trittschalldämmung ausgeführt. Der Aufbau ergibt sich wie folgt:<br>
<br>
Erdgeschoss:<br>
ca. 85 mm Wärmedämmung (PS-Hartschaum, WLG 035)<br>
PE-Folie<br>
ca. 45 mm Zementestrich<br>
Bei höheren Anforderungen an die Wärmedämmung aus der Energieeinsparverordnung wird diese Dämmung angepasst.<br>
<br>
Ober- und Dachgeschoss:<br>
ca. 40 mm Trittschalldämmung (PS-Hartschaum)<br>
PE-Folie<br>
ca. 45 mm Zementestrich<br>
Bei höheren Anforderungen an die Trittschalldämmung nach DIN wird diese angepasst.
			</li>
			
			<li><br>
			Dämmung und Gipskartonverkleidung<br>
Die Decken und Dachschrägen im ausgebauten Bereich des Dachgeschosses erhalten zwischen den
Sparren und Kehlbalken eine mineralische Wärmedämmung der Wärmeleitgruppe und Stärke nach
Energieeinsparverordnung. Um die Dämmung trocken zu halten, wird raumseitig eine Dampfbremse (PEFolie) angebracht. Auf der Lattung wird die Gipskartonverkleidung angebracht. Diese ist verspachtelt und tapezierfähig (gemäß Qualitätsstufe Q2) hergestellt. Die Anschlussfugen zwischen Decken bzw. Dachschrägen und angrenzenden Bauteilen sind Wartungsfugen und werden durch den Auftraggeber im Zuge der Tapezierarbeiten geschlossen. Der Drempel wird ebenfalls mit Gipskartonplatten verkleidet.
			</li>
			
			<li><br>
			Prüfung der Winddichtigkeit ("Blower-Door-Test")<br>
Die Winddichtigkeit ist ein entscheidender Qualitäts-Faktor für das Haus. Deshalb wird sie mit dem
Blower-Door-Test überprüft und dem Auftraggeber mit einem Zertifikat bestätigt.
			</li>
			
			<li><br>
			Fliesenarbeiten<br>
Bad:
An den Wänden werden Fliesen zum Materialpreis EUR 20,00 pro m² inkl. Mehrwertsteuer türhoch verlegt. Dachschrägen werden nicht gefliest. Der Fußboden ist mit Fliesen zum gleichen Materialpreis gefliest. Unterhalb der Bodenfliesen und im Spritzwasserbereich über der Badewanne und der Dusche wird eine Flüssigdichtung als zusätzlicher Schutz aufgebracht.<br>
<br>
Gäste- WC:<br>
Das Gäste- WC erhält einen Fliesenspiegel über dem Waschbecken, sowie Bodenfliesen zum 
Materialpreis EUR 20,00 pro m² inkl. Mehrwertsteuer.<br>
<br>
 Es werden Fliesen mit den Kantenlängen > 12 cm und < 30 cm vorgesehen. Sockelfliesen, Sonderverlegungen, andere Formate und Dekore, sowie Mehrverfliesungen sind im Rahmen der sonstigen Vereinbarungen möglich. Die Anschlussfugen zwischen Boden- und Wandfliesen werden elastisch versiegelt.

			</li>
			
			<li><br>
			Heizungsanlage und Trinkwassererwärmung<br>
Das Haus wird mit einer Gas-Brennwerttherme und drei Flachkollektoren zur solaren
Warmwasserbereitung ausgestattet (Hersteller Vaillant oder gleichwertig nach Wahl des
Auftragnehmers gemäß §15,"Sonstiges").<br>
<br>
Heizungsanlage<br>
<br>
System Vaillant:<br>
Brennwert-Gaswandheizgerät nach DIN/EN 677, Baureihe eco-tec entsprechend Energieeinsparverordnung mit Edelstahl-Wärmetauscher. Die Nenn-Wärmeleistung beträgt ca. 3,2 bis 14,4 KW. In Abhängigkeit von der Außentemperatur steuert eine witterungsgeführte Solar-Systemregelung Typ auroMATIC das Temperaturniveau. Über ein Zeitprogramm können Heizzyklen und Warmwassererwärmung individuell bestimmt werden.<br>
<br>
Standort:<br>
Der Aufstellungsort der Therme ist innerhalb der thermischen Hülle des Hauses vorgesehen, in der Regel im Hausanschlussraum des Erdgeschosses. Abweichend hiervon kann sich je nach Haustyp der Standort der Gas-Therme auch im Bad, Abstellraum oder Studio befinden (den genauen Standort entnehmen Sie bitte den Grundrisszeichnungen).<br>
<br>
Luft-Abgasführung:<br>
Die Luft-/Abgasführung der raumluftunabhängigen Brennwertgeräte erfolgt als konzentrische
Luft-/Abgasführung über Dach.<br>
<br>
Heizkörper:<br>
Jeder ausgebaute Wohnraum des Hauses (außer Hausanschlussraum) wird mit fertig lackierten
Flachheizkörpern ausgestattet, deren Größe und Anzahl gemäß Wärmebedarfsberechnung durch den
Heizungsinstallateur festgelegt werden. Die Heizkörper erhalten je ein Thermostatregelventil, so dass eine individuelle Wärmeregulierung in allen beheizten Räumen möglich ist.<br>
<br>
Heizleitungen:<br>
Die Rohrleitungen für die Heizkörper werden auf dem Rohfußboden im Zwei-Rohr-System verlegt. Die
Dämmung der Heizleitungen erfolgt gemäß geltender Energieeinsparverordnung. Je Wohnung wird ein Heizkreis installiert.
Trinkwassererwärmung<br>
<br>
System Vaillant:<br>
Die Trinkwarmwasserversorgung des Hauses erfolgt zentral ohne Zirkulationsleitungen. Zur
Warmwasserversorgung des Bades, des Gäste-WCs und der Küche wird das zuvor beschriebene
Brennwert-Gaswandheizgerät mit mindestens drei, auf das System abgestimmten, Solar- Flachkollektoren Typ auroTHERM VFK 145 V/H für Aufdachmontage, Kollektorfläche ca. 7,5 m² und einem bivalenten Solarspeicher Typ VIH S mit mindestens 400 l Speicherinhalt kombiniert. Die Auslegung der Kollektorfläche und des damit verbundenen Solarspeichers erfolgt gemäß Energieeinsparverordnung. Zum Schutz vor Verbrühungen wird ein Thermostatmischer vorgesehen.
<br>
Hinweis:<br>
Der maximale Ertrag ist bei reiner Südausrichtung und 45° Dachneigung zu erzielen. In der Praxis kommt es jedoch bei Ausrichtungen zwischen Südost und Südwest, sowie Dachneigungen von 30° bis 50° kaum zu Einbußen. Für einen maximalen Wirkungsgrad der Solaranlage sollte das Dach nicht von Bebauungen oder Bäumen verschattet werden.

			</li>
			
			<li><br>
			Sanitäranlage und Installation<br>
<br>
Installation<br>
Die Abwasserleitungen bestehen aus heißwasserbeständigem Kunststoffrohr und werden von den sanitären Einrichtungsgegenständen bis in die Grundleitungen geführt. Die Abwasserleitungen werden gemäß Entwässerungsplanung über Dach entlüftet. <br>
Die Installation der Wasserleitungen in hochwertigem Mehrschichtverbundrohr für die Trinkwasserinstallation nach DIN 1988 (DIN EN 806) erfolgt im Haus ab der Wasseruhr im Hausanschlussraum/Hauswirtschaftsraum. Die Warmwasserleitungen werden gemäß DIN mit einer Wärmedämmung versehen, die Kaltwasserleitungen sind durch das Schutzrohr gegen Schwitzwasser geschützt.<br>
<br>
Sanitäreinrichtungsgegenstände<br>
<br>
Wannenbad:<br>
Standort entsprechend der zeichnerischen Darstellung:<br>
• eingeflieste Badewanne aus Acryl (Hersteller: Ideal Standard oder gleichwertig nach Wahl des
Auftragnehmers gemäß §15, "Sonstiges"), ca. 170 cm x 75 cm mit verchromter Einhand-Badebatterie mit Wannenset. Eine Mittelablaufwanne ist nicht vereinbart.<br>
• eingeflieste Brausewanne aus Acryl (Hersteller: Ideal Standard oder gleichwertig nach Wahl des
Auftragnehmers gemäß §15, "Sonstiges, ca. 80 cm x 80 cm mit verchromter Einhand-Brausebatterie mit Brauseset. Ablaufgarnitur aus Kunststoff, verchromt. Eine Duschtrennwand oder Kabine ist nicht vereinbart.<br>
• Kristallporzellanwaschtisch, ca. 60 cm breit mit verchromter Einhand - Waschtischbatterie.<br>
• wandhängendes WC mit wassersparendem 2 - Mengen - Unterputzspülkasten, Sitz und Deckel.<br>
Sanitärkeramik, Farbe weiß, Hersteller VIGOUR, Serie Clivia (produziert durch namhafte deutsche Hersteller wie Villeroy & Boch, Keramag oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges").
Die Armaturen des Herstellers VIGOUR, Serie Clivia (produziert durch namhafte deutsche Hersteller wie Grohe oder gleichwertig nach Wahl des Auftragnehmers gemäß §15,"Sonstiges") werden als
Aufputzarmaturen ausgeführt.<br>
<br>
Gäste-WC:<br>
Standort entsprechend der zeichnerischen Darstellung:<br>
• Kristallporzellanwaschtisch, ca. 45 cm breit mit verchromter Einhand- Waschtischbatterie.<br>
• wandhängendes WC mit wassersparendem 2 - Mengen - Unterputzspülkasten, Sitz und Deckel.<br>
Sanitärkeramik, Farbe weiß, Hersteller VIGOUR, Serie Clivia (produziert durch namhafte deutsche Hersteller wie Villeroy & Boch, Keramag oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges").
Die Armaturen des Herstellers VIGOUR, Serie Clivia (produziert durch namhafte deutsche Hersteller wie Grohe oder gleichwertig nach Wahl des Auftragnehmers gemäß §15,"Sonstiges") werden als
Aufputzarmaturen ausgeführt.<br>
<br>
Küche:<br>
Es werden Anschlüsse für Abwasser, Warm- und Kaltwasserversorgung sowie verchromte Eckventile zum Anschluss für die Spülmaschine installiert.<br>
<br>
Waschmaschinenanschluss:<br>
Waschmaschinenanschluss mit Siphon gemäß Zeichnung im Hausanschlussraum, Bad, Küche oder
Abstellraum.<br>
<br>
Allgemeines:<br>
Mess-, Regel- oder Übergabeeinrichtungen innerhalb oder außerhalb des Gebäudes sind nicht Leistungen des Auftragsnehmers. Die Installationsarbeiten beginnen nach dem Zähler des Versorgers. Es wird ein DIN-DVGW geprüfter Wasserfilter aus Rotguss eingebaut. Sollten durch die Versorgungsunternehmen oder die örtlichen Gegebenheiten der Einbau eines Druckminderers oder zusätzlicher Sammeleinrichtungen erforderlich sein, so sind diese Kosten vom AG zu tragen.<br>
<br>
Außenwasserhahn:<br>
Außenwasserhahn (Kaltwasser) mit Entleerung an der Außenwand im Bereich Küche oder
Hausanschlussraum.
			</li>
			
			
			<li><br>
			Frischluftautomatik (Kontrollierte Wohnungslüftung System LUNOS)<br>
			Das IZ-Haus wird mit einer kontrollierten Wohnungslüftung gemäß E DIN 1946-6 ausgestattet. Aus den Ablufträumen Küche, Gäste-WC, Badezimmer und Hausanschlussraum wird die Abluft gemäß Lüftungsplanung entweder mit Unterputz-Außenwandlüftern, Zweiraumlüftern für Hausanschlussraum und Gäste-WC, Über-Dach-Lüftern oder Überström-Luftdurchlässen abgesaugt und ein Unterdruck erzeugt. Dabei wird mindestens ein Lüfter mehrstufig schaltbar ausgeführt.<br>
In allen Aufenthaltsräumen wie Wohnzimmer, Kinderzimmer, Gästezimmer und Schlafzimmer werden
Außenwand-Luftdurchlässe vorgesehen, durch die, auf Grund des sich einstellenden Unterdruckes, die gleiche Menge an frischer Luft nachströmt, so dass die Raumluft kontinuierlich erneuert wird.<br>
Die Außenwand-Luftdurchlässe sind dabei mit einer Schalldämmung, Filter und Winddrucksicherung
ausgerüstet. Außenseitig werden sie mit einem schlagregendichten Außengitter mit Insektenschutz versehen.<br>
Um den Luftaustausch zwischen den einzelnen Räumen zu gewährleisten, werden die Innentüren mit einem ca. 1,0 cm breitem Luftspalt unterhalb des Türblattes ausgeführt.
			</li>
			
			<li><br>
			Elektrische Anlage<br>
Die Elektroinstallationen werden fachgerecht in Abstimmung mit den zuständigen Energieversorgungsträgern ausgeführt.<br>
Die Installation beginnt ab Hausanschluss / Panzersicherung innerhalb des Hauses. Im Hausanschlussraum wird ein Zählerschrank gemäß Vorschriften des Energieversorgers mit den entsprechenden Sicherungsarmaturen gesetzt. Es werden zwei FI-Schalter eingebaut. In Abhängigkeit vom Haustyp werden mindestens 12 Stromkreise installiert. Der Elektroherd, die Geschirrspülmaschine, die Waschmaschine und der Wäschetrockner erhalten jeweils eigene Stromkreise. Die verbleibenden Stromkreise werden für Lichtauslässe und Steckdosen aufgeteilt. Die Ausstattung sämtlicher Wohnräume erfolgt mit weißen bzw. cremeweißen Flächenschaltern und Steckdosen der Hersteller Gira oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges". Die Installation in den Wohngeschossen erfolgt selbstverständlich unter Putz.<br>
Die genaue Lage der Schalter, Steckdosen und Lichtauslässe wird mit dem Auftraggeber individuell vor Baubeginn festgelegt.<br>
<br>
Hauseingang:<br>
ein Wandauslass für Beleuchtung mit Schalter<br>
<br>
Flur EG:<br>
eine Steckdose, ein Deckenauslass mit Kreuzschaltung<br>
<br>
Gäste-WC:<br>
eine Steckdose, ein Wandauslass mit Schalter<br>
<br>
HAR:<br>
zwei Doppelsteckdosen, Anschlussdosen für Waschmaschine und Wäschetrockner, ein Deckenauslass mit Schalter<br>
<br>
Küche:<br>
Anschlussdosen für Elektroherd, Geschirrspülmaschine, Dunstabzugshaube, Kühlschrank sowie sechs Steckdosen, davon zwei Doppelsteckdosen über der Arbeitsplatte, ein Deckenauslass mit Schalter<br>
<br>
Abstellraum:<br>
eine Doppelsteckdose, ein Deckenauslass mit Schalter<br>
<br>
Wohnzimmer:<br>
zwei Einzelsteckdosen, vier Doppelsteckdosen, zwei Deckenauslässe mit Serienschalter<br>
<br>
Schlafzimmer:<br>
zwei Steckdosen, zwei Doppelsteckdosen, ein Deckenauslass mit Schalter<br>
<br>
Schlafzimmer:<br>
zwei Steckdosen, zwei Doppelsteckdosen, ein Deckenauslass mit Schalter<br>
<br>
Kinderzimmer:<br>
zwei Steckdosen, zwei Doppelsteckdosen, ein Deckenauslass mit Schalter<br>
<br>
Gast:<br>
zwei Steckdosen, zwei Doppelsteckdosen, ein Deckenauslass mit Schalter<br>
<br>
Bad:<br>
drei Steckdosen, ein Deckenauslass mit Schalter, ein Wandauslass<br>
<br>
Flur OG:<br>
eine Steckdose, ein Deckenauslass mit Kreuzschaltung<br>
<br>
Flur DG:<br>
eine Steckdose, ein Deckenauslass mit Kreuzschaltung<br>
<br>
Studio:<br>
sechs Steckdosen, zwei Deckenauslässe mit Serienschalter<br>
<br>
Terrasse:<br>
eine Steckdose (schaltbar), ein Wandauslass mit Schalter<br>
<br>
Telefonanschluss:<br>
Telefondose im Wohnzimmer, Kinderzimmer, Gästezimmer, Arbeitszimmer einschl. Kabel bis in den HAR<br>
<br>
Antennenanschluss:<br>
Antennenanschluss im Wohnzimmer, Schlafzimmer, Kinderzimmer, Gästezimmer, Arbeitszimmer einschl. Kabel bis in den HAR bzw. nach Wahl des Auftraggebers auch in den Spitzboden<br>
<br>
Klingelanlage:<br>
bestehend aus Taster und Läutwerk je Wohnung<br>
<br>
Rauchmelder:<br>
Jedes Schlaf-, Kinder-, Arbeits- und Gästezimmer erhält einen Rauchmelder. Pro Etage wird zusätzlich jeweils ein Rauchmelder auf dem Flur installiert. Die Rauchmelder werden an der Decke angebracht. Es werden batteriebetriebene optische Rauchmelder mit Warnton, ABUS VDS, installiert (oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges".

			</li>
			
			
			<li><br>
			Sonderbauteile<br>
			Sonderbauteile sind Ausstattungsmerkmale, die nur dann zur Ausführung kommen, wenn sie in der
Grundausstattung enthalten und deshalb zeichnerisch dargestellt sind. Dazu gehören:<br>
<br>
Dachflächenfenster:<br>
Kunststoff-Dachflächenfenster (Hersteller Roto, VELUX oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges" ); Farbe: weiß; mit 2-Scheiben-Wärmeschutzverglasung (Uw = 1,3 W/m²K); Fensteraußenmaß gemäß Zeichnung.
Für die Verschattung des Dachflächenfensters wird das Aussenrolllo Screen (System Roto oder gleichwertig nach Wahl des Auftragnehmers gemäß §15, "Sonstiges") eingebaut. Das Aussenrolllo besteht aus kunststoffbeschichteten Glasfasergewebe.

			</li>
			
			
			<li><br>
			Maler- und Bodenbelagsarbeiten<br>
Alle Maler- und Bodenbelagsarbeiten, die nicht explizit als Leistung des Auftragnehmers beschrieben sind, sind Eigenleistung des Auftraggebers und können erst nach Abnahme und Übergabe des Hauses begonnen werden.

			</li>
			
			<li><br>
			Sonstiges<br>
Mit "SO-WU" gekennzeichnete Einrichtungsgegenstände in den Plänen sind als Sonderwunsch gegen
Mehrpreis erhältlich.<br>
Technische Änderungen sowie eine Änderung eines vereinbarten Herstellers bleiben, soweit sie geringfügig und/oder gleichwertig sind, dem Auftragnehmer vorbehalten, wenn sie durch nachträgliche behördliche Auflagen bedingt sind oder wenn sie sich nachträglich als technisch notwendig erweisen, sie den Wert, die Qualität und die Gebrauchstauglichkeit des Bauvorhabens / Objektes nicht mindern und dem Auftraggeber zumutbar sind.

			</li>
			
			
			<li>
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>

<div class="row">
		<div style="padding: 10px">
		
		<h4>§16 Sonstige Vereinbarungen</h4>
		<h6>	
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Mündliche Nebenabreden sind nicht getroffen. Änderungen, Ergänzungen und Nebenabreden sollen - aus Beweisgründen - schriftlich vereinbart werden.
			</li>
			
			<li>
				Mehrere Auftraggeber - auch Ehegatten und eingetragene Lebenspartner - haften für sämtliche
Verpflichtungen aus diesem Bauwerkvertrag als Gesamtschuldner. Sie bevollmächtigen sich hiermit
gegenseitig - unter dem Vorbehalt eines jederzeit möglichen (schriftlichen) Widerrufs der Bevollmächtigung - zur Abgabe von Erklärungen, welche diesen Vertrag betreffen, gegenüber dem Auftragnehmer und zur Entgegennahme solcher Erklärungen des Auftragnehmers. Die gegenseitige Bevollmächtigung gilt nicht für die Abgabe oder die Entgegennahme von vertragsbeendenden und/oder -auflösenden Erklärungen; derartige Erklärungen müssen von oder gegenüber allen Auftraggebern abgegeben werden. Die gegenseitige Bevollmächtigung gilt auch dann nicht, wenn die Auftraggeber im Rahmen der Abgabe oder Entgegennahme der Erklärung etwas Abweichendes mitteilen.

			</li>
			
			<li>
				Der Auftragnehmer ist berechtigt, Baustellenbesichtigungen zu Werbezwecken durchzuführen, daraus entstandenes Material unbegrenzt zu nutzen und bis zur Abnahme des Hauses Bauschilder auf dem Grundstück aufzustellen.
Der Auftragnehmer ist berechtigt, das Haus auch nach Fertigstellung kostenlos fotografisch zu Werbezwecken zu nutzen.

			</li>
			<li>
				Eine Bauleitung/-überwachung des Auftragnehmers für nicht von diesem Vertrag erfasste Leistungen sowie für die Eigenleistungen des Auftraggebers wird ausdrücklich ausgeschlossen. Eigenleistungen des Auftraggebers dürfen den Bauablauf weder behindern noch unterbrechen.
			</li>
			<li>
				Der Auftraggeber wird darauf hingewiesen, dass - unter bestimmten Voraussetzungen - die in diesem Vertrag vereinbarte Vergütung des Auftragnehmers ebenfalls der Bemessungsgrundlage der Grunderwerbsteuer zugerechnet wird. Dem Auftraggeber wird empfohlen, insoweit Rücksprache mit seinem steuerlichen Berater zu halten.
			</li>
			<li>
				Der Auftragnehmer schließt für jedes Bauvorhaben eine Bauleistungsversicherung und eine
Bauherrenhaftpflichtversicherung ab. Weiterhin erhält der Auftraggeber vom Auftragnehmer eine Baufertigstellungsbürgschaft und eine Mängelansprüchebürgschaft ("Baugewährleistungsbürgschaft"). Das Zertifikat über die Baufertigstellungsbürgschaft wird mit Baubeginn übergeben.

			</li>
			<li>
				Dieser Werkvertrag unterliegt deutschem Recht. Gerichtsstand ist Deutschland.
			</li>
			
			
			
			<li>
			
			</li>
		</ol>
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>

	<div class="row">
		<h5><?php echo __('Von dem vor beschriebenen Vertragsinhalt habe/n ich/wir Kenntnis genommen.'); ?>
		<br/></h5>
		
	</div>
	
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>

	<pagebreak  />
	<!-------------------------------------- Vertragsgegenstand END -------------------------------------->
	
	<!-------------------------------------- Grundrisse & Ansichten Coverpage START -------------------------------------->
	<div class="row">
		<h2 style = "text-align: center;">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/><?php echo __('Grundrisse & Ansichten'); ?></h2>
		<h3 style = "text-align: center;">
		<br/><?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?></h3>
		
	</div>
	
	
	<pagebreak  />
	<!-------------------------------------- Grundrisse & Ansichten Coverpage  END -------------------------------------->
	
	
	<!-------------------------------------- Grundrisse & Ansichten START -------------------------------------->
					<?php 
					foreach ($floorplan_house_pictures_view as $key=>$x){ ?>
						<div class="row">
							<h4><?php echo $x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description']; ?></h4>
							<p style="padding-top: 5cm"> <?php 
							echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] ));?>
							</p>
						</div>
						<pagebreak  />
					<?php }
					if ($bool_basement){
						foreach ($basement_house_pictures_view as $key=>$x){?>
							<div class="row">
								<h4><?php echo $x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description']; ?></h4>
								<p style="padding-top: 5cm"> <?php 
								echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] ));?>
								</p>
							</div>
							<pagebreak  />
						<?php } 
					}else{
						foreach ($sideview_nobasement_house_pictures_view as $key=>$x){?>
							<div class="row">
								<h4><?php echo $x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description']; ?></h4>
								<p style="padding-top: 5cm"> <?php 
								echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] ));?>
								</p>
							</div>
							<pagebreak  />
						<?php } 
					}?>
	
	
	<!-------------------------------------- Grundrisse & Ansichten END -------------------------------------->
	
	<?php if(!empty($enlagment)) { ?>
	<!-------------------------------------- Hausvergrößerung und Verkleinerung Coverpage START -------------------------------------->
	<div class="row">
		<h2 style = "text-align: center;">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/><?php echo __('Hausvergrößerung und Verkleinerung'); ?></h2>
		<h3 style = "text-align: center;">
		<br/><?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?></h3>
		
	</div>
	<pagebreak  />
	<!-------------------------------------- Hausvergrößerung und Verkleinerung Coverpage END -------------------------------------->	
	
	
	<!-------------------------------------- Hausvergrößerung und Verkleinerung START -------------------------------------->
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?><?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo ', '.$proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?> &nbsp;&nbsp;&nbsp;&nbsp; ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )</h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Haustyp</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date = date('d-m-Y');?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vertragsdatum</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	<div class="row">
		<div style="padding: 10px">
		
		
		<h6>	
		<p style="text-align: justify;">  
		Ihr Hauses inklusive aller gewählten Sonderausstattungen wird gemäß nachstehender Skizze
in seinen Außenabmessungen individuell angepasst, sowie entsprechend der Bau- und
Leistungsbeschreibung ausgeführt. Der gewählte Energiestandard wird beibehalten. Die sich
aus der „Hausverlängerung-Hausverkürzung“ ergebene Wohnfläche Ihres Hauses ist dabei nur
ein Richtwert, Abweichungen sind möglich. Wenn vorhanden, ist die Richtung der First, die
Größe des Carports und Wintergartens stets einzuhalten. Alle erforderlichen Planungskosten
sind enthalten.
		<p style="clear: both;">  </p>
		
		</p>
		</h6>	
		</div>	
	</div>
	
	<div class="row" style="padding: 10px">
		<h6><?php echo 'Vergrößerung des Grundrisses um: ' .$enlagment['MyExtra']['size_dependent_flag']. 'm<sup>2</sup>'; ?>
		<br/></h6>
		
	</div>
	
	
	<div class="row" style="padding: 10px">
		<h6><?php echo 'Preis: '.$this->Number->currency($enlagment_price,'EUR',array('wholePosition'=>'after')); ?>
		<br/></h6>
		
	</div>
	<?php if(!empty($enlagment['MyBoughtExtra']['comment'])){ ?>
	<div class="row" style="padding: 10px">
		<h6>Zusätzliche Anmerkungen:
		<br/>		
		<?php if(!empty($enlagment['MyBoughtExtra']['comment'])) echo $enlagment['MyBoughtExtra']['comment'];?>
		</h6>
		
	</div>
	<?php } ?>
	
	
	<div class="row" style="padding: 10px">
		<h6><?php echo __('Mit Ihrer Unterschrift bestätigen Sie die Richtigkeit der hier angegebene Vergrößerung.'); ?>
		<br/></h6>
		
	</div>
	
	
	<div class="row" style="padding: 10px">
		<h5><?php echo __('Von dem vor beschriebenen Vertragsinhalt habe/n ich/wir Kenntnis genommen.'); ?>
		<br/></h5>
		
	</div>
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	<pagebreak  />
	<!-------------------------------------- Hausvergrößerung und Verkleinerung END -------------------------------------->	
	<?php } ?>
	
	
	
	
	
	<!-------------------------------------- Sonderausstattungen Coverpage START -------------------------------------->
	<div class="row">
		<h2 style = "text-align: center;">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/><?php echo __('Sonderausstattungen'); ?></h2>
		<h3 style = "text-align: center;">
		<br/>(Mehrleistungen gegenüber Grundtyp gemäß Bauleistungsbeschreibung)</h3>
		
	</div>
	<pagebreak  />
	<!-------------------------------------- Sonderausstattungen Coverpage END -------------------------------------->	
	
	<!-------------------------------------- Sonderausstattungen START -------------------------------------->

	<div class="row">
		<div class="col-md-12">
		<?php $idx = 0;
		 $last_cat_id =-1;
			foreach($bought_extras_view as $index=>$x) { 
			
			$idx = $idx+1;?>
			
			<?php if ($last_cat_id != $x['MyExtra']['category_id']){ 
			$last_cat_id = $x['MyExtra']['category_id'];?>
			<div class="row" style="padding: 10px;">
				<div class="row">
					<h4>
						<?php echo 'Kategorie: ' . $x['MyExtra']['MyCategory']['name']; ?>
					</h4>
				</div>
			</div>
			
			
			<?php }?>
			
			<div class="row" style="padding: 10px;">
				<div class="row">
					<h5>
						<?php echo $idx.'. '; ?>
						<?php if ($x['MyExtra']['bool_custom']){ echo 'Kundenspezifische Sonderausstattung:';}?> 
						<?php echo $x['MyExtra']['name']; ?>
						<?php if($x['MyBoughtExtra']['factor']!=1){ ?>
							&nbsp;&nbsp;&nbsp;&nbsp;( <?php echo $x['MyBoughtExtra']['factor'].' '.$extra_unit['factor'][$x['MyExtra']['units']]; ?> )
						<?php }?>
					</h5>
				</div>
				
				
				<div class="row">
					<h6>
					<div style="width:80%;float:left; text-align: justify; ">
					<?php if (!empty($x['MyExtra']['picture'])){ ?>
						<div style="width:30%;float:left;padding: 10px;">
						<?php echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); ?> 
						</div>	
					<?php } ?>
					
						<p><?php echo $this->Text->autoParagraph($x['MyExtra']['description']); ?></p> 
						<?php if(!empty($x['MyBoughtExtra']['comment'])){ ?>
						<p> <?php echo 'Zusätzliche Anmerkungen: '.$this->Text->autoParagraph($x['MyBoughtExtra']['comment']); ?> </p>
						<?php }?>
						
						
						
					</div>	
					</h6>
				</div>
				
				<div class="row" style="text-align: right">
					<h5>
						<?php echo 'Preis: '; ?>
						<?php
						if ($x['MyExtra']['size_dependent_flag']==-2){
							echo $this->Number->currency(($proposal_view['MyHouse']['size_din']+$enlargement*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
						}elseif ($x['MyExtra']['size_dependent_flag']==-1){ 
							echo $this->Number->currency(($proposal_view['MyHouse']['size_din']/$proposal_view['MyHouse']['floors']+$enlargement)*$x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
						}elseif($x['MyExtra']['size_dependent_flag']>0){
							echo $this->Number->currency(($x['MyBoughtExtra']['price']*$x['MyExtra']['size_dependent_flag']*$proposal_view['MyHouse']['floors'])*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
						}else{
							echo $this->Number->currency($x['MyBoughtExtra']['price']*$x['MyBoughtExtra']['factor'],'EUR',array('wholePosition'=>'after'));
						}
						?>
					</h5>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
	
	<div class="row" style="padding-top: 50px">
		
		
		<div  style="text-align: right">
		<h4> Summe Sonderausstattung: <?php echo $this->Number->currency($summed_extras,'EUR',array('wholePosition'=>'after'));?></h4>
		</div>
		
		
	</div>
	
	<div class="row" style="padding: 10px">
		<h5><?php echo __('Von dem vor beschriebenen Vertragsinhalt habe/n ich/wir Kenntnis genommen.'); ?>
		<br/></h5>
		
	</div>
	
	
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	
	<pagebreak  />
	<!-------------------------------------- Sonderausstattungen END -------------------------------------->	
	
	
	<!-------------------------------------- Verbraucherbürgschaft START -------------------------------------->	
	<!--
	<div class="row" style="width: 100%;">
		<?php //echo $this->Html->image('addInfoContract/Verbraucher_1.png', array( "class" => "featurette-image img-responsive", "style"=>"center")); ?>
	</div>
	<div class="row" style="width: 100%;">
		<?php //echo $this->Html->image('addInfoContract/Verbraucher_2.png', array( "class" => "featurette-image img-responsive", "style"=>"center")); ?>
	</div>
	
	<pagebreak  />
	--->
	<!-------------------------------------- Verbraucherbürgschaft END -------------------------------------->
	
	
	
	
	<!-------------------------------------- Rücktrittsvereinbarung START -------------------------------------->	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?><?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo ', '.$proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?>  &nbsp;&nbsp;&nbsp;&nbsp; ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )</h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Haustyp</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date = date('d-m-Y');?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vertragsdatum</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	<div class="row" style="padding: 10px; text-align: justify;">
		<h5> Rücktrittsvereinbarung </h5>
		<h6>
		Der Auftraggeber ist berechtigt, nach Maßgabe der nachfolgenden Bestimmungen vom<br>
		Bauwerkvertrag zurückzutreten:<br>
		<br>
		[ ] Finanzierung<br>
		[ ] öffentliche Mittel<br>
		[ ] Grundstück<br>
		<br>
		Die Erklärung zur Ausübung des Rücktrittsrechtes bedarf zu Ihrer Wirksamkeit der Schriftform.<br>
		Der Auftraggeber wurde darauf hingewiesen, dass die Pläne und sonstigen Unterlagen von
		IZ-Haus GmbH projektiert und entwickelt wurden und der
		Auftraggeber bei Ausübung des Rücktrittsrechtes nach diesen Plänen und Unterlagen nicht
		bauen darf. Bei einer schuldhaften Zuwiderhandlung verpflichtet sich der Auftraggeber, einen
		pauschalen Schadensersatz für die Planung und die Statik in Höhe von EUR 7.500,00 an den
		Auftragnehmer zu leisten. Dem Auftragnehmer bleibt es unbenommen, nachzuweisen, dass
		ein Schaden nicht oder nicht in dieser Höhe angefallen ist.<br>
		Das Rücktrittsrecht erlischt, sobald der jeweilige Rücktrittsgrund wegfällt. Für weitere
		Einzelheiten wird auf die Ausführung zum jeweiligen Rücktrittsgrund verwiesen.
		<br/></h6>
		
		<h5> Finanzierung </h5>
		<h6>
		<p style="text-align: justify;">  
		<ol>
		
			<li>
				Der Auftraggeber ist berechtigt, nach Maßgabe der nachfolgenden Bestimmungen vom
Bauwerkvertrag zurückzutreten, wenn für ihn nicht die Möglichkeit besteht, ein
Baufinanzierungsdarlehen für die Durchführung des Bauwerkvertrages zu erhalten.
			</li>
			
			<li>
				<br>
				Wird für die Finanzierung eine Bestätigung des Sachverständigen zum Antrag
				"Energieeffizient Bauen" (KfW-Förderprogrammnummer 153) erforderlich, ist eine
				Aufwandsentschädigung in Höhe von EUR 200,-- an den Auftragnehmer zu entrichten.
				Im Fall der Realisierung des Bauvorhabens werden diese EUR 200,-- mit dem Werklohn
				verrechnet.
			</li>
			
			<li>
				<br>
				Bei einer Notwendigkeit der Erstellung eines Baugesuchs für den Auftraggeber ist eine
Aufwandsentschädigung in Höhe von EUR 4.000,-- an den Auftragnehmer zu entrichten.
Im Fall der Realisierung des Bauvorhabens werden diese EUR 4.000,-- mit dem
Werklohn verrechnet. Dem Auftraggeber bleibt der Nachweis unbenommen, dass ein
Aufwand überhaupt nicht oder in dieser Höhe angefallen ist.
			</li>
			
			<li>
				<br>
				Das Rücktrittsrecht besteht nur, wenn feststeht, dass das vom Auftraggeber für die
Errichtung des bestellten Bauwerks benötigte Baufinanzierungsdarlehen und/ oder
Fördermitteldarlehen nicht gewährt werden kann. Der Auftraggeber verpflichtet sich
insoweit, ein Baufinanzierungsdarlehen in angemessener Höhe bei einem anerkannten
Kreditinstitut seiner Wahl zu beantragen. Erteilt das ausgewählte Kreditinstitut eine
Kreditabsage, ist der Auftraggeber verpflichtet, einen Antrag auf Gewährung der
benötigten Baufinanzierung bei anderen Kreditinstituten zu stellen. Ferner hat der
Auftraggeber dem Auftragnehmer im Falle der Erteilung einer ersten Kreditabsage
Gelegenheit zu geben, die Finanzierungsmöglichkeiten durch den Finanzierungsservice
des Auftragnehmers zu prüfen und dem Auftraggeber ein Baufinanzierungsdarlehen in
angemessener Höhe und zu marktüblichen Konditionen bei einem anerkannten
Kreditinstitut zu vermitteln. Der Auftraggeber ist insoweit verpflichtet, dem
Finanzierungsservice vom Auftragnehmer vollständig und richtig Auskunft über seine
Vermögensverhältnisse zu geben und alles zu tun, um eine positive Kreditentscheidung
zu ermöglichen.
			</li>
			
			<li>
				<br>
				Liegen mindestens drei Kreditabsagen anerkannter Kreditinstitute vor und ist auch der
Finanzierungsservice des Auftragnehmers trotz vollständiger Auskunft über die
Vermögensverhältnisses des Auftraggebers und dessen Unterstützung nicht in der
Lage, die Erteilung des benötigten Baufinanzierungsdarlehens zu vermitteln, steht damit
fest, dass ein Baufinanzierungsdarlehen nicht gewährt werden kann.
			</li>
			
			<li>
				<br>
				Der Auftraggeber verpflichtet sich, den Baufinanzierungsantrag bei den Kreditinstituten
sachgerecht zu stellen und den Kreditinstituten sämtliche für die
Baufinanzierungsentscheidung erforderlichen Informationen vollständig und richtig zu
erteilen. Beruht die Kreditabsage eines oder mehrerer Kreditinstitute auf fehlerhafter
Antragstellung, unvollständigen Angaben des Auftraggebers oder der Nichterfüllung
sonstiger Mitwirkungspflichten des Auftraggebers, besteht kein Rücktrittsrecht.
			</li>
			
			<li>
				<br>
				Tritt der Auftraggeber zu einem Zeitpunkt zurück, in welchem der Auftragnehmer bereits
das notwendige Baugrundgutachten in Auftrag gegeben hat, zahlt der Auftraggeber dem
Auftragnehmer für den hierfür entstandenen Aufwand einen Betrag von EUR 1.000,--.
Dem Auftraggeber bleibt der Nachweis unbenommen, das ein Aufwand überhaupt nicht
oder nicht in dieser Höhe angefallen ist.
			</li>
			
			<li>
				<br>
				Das Rücktrittsrecht erlischt zeitgleich mit der Mitteilung des Kreditinstitutes, dass das
beantragte Baufinanzierungsdarlehen gewährt wird. Das Rücktrittsrecht erlischt ferner,
wenn der Auftragnehmer in Abstimmung mit dem Auftraggeber mit der Durchführung
des vertraglich gebundenen Bauvorhabens (Bautätigkeit) beginnt.
			</li>
			
			<li>
			
			</li>
		</ol>
		</p>
		</h6>

		<h5> Öffentliche Mittel </h5>
		<h6>
		(bitte ausfüllen)<br>
		<br>
		<hr>
		<br>
		<hr>
		<br>
		<hr>
		<br/></h6>
		
		<h5> Grundstück </h5>
		<h6>
		Der Auftraggeber ist berechtigt, vom Bauwerkvertrag zurückzutreten, wenn er binnen 6 Monate
nach Vertragsabschluss kein Grundstück erwirbt oder für den Erwerb aussucht. Das
Rücktrittsrecht des Auftraggebers erlischt sechseinhalb Monate nach Vertragsabschluss. Das
Rücktrittsrecht des Auftraggebers erlischt allerdings schon vor Ablauf dieser Frist, wenn der
Auftragnehmer auf Wunsch des Auftraggebers einen Bauantrag bzw. die notwendigen
Planungsleistungen hierfür in Auftrag gegeben hat.<br>
Hat der Auftraggeber binnen 3 Monaten nach Vertragsabschluss noch kein Grundstück
erworben oder ausgesucht, ist der Auftragnehmer berechtigt, dem Auftraggeber Grundstücke
nachzuweisen (Andienungsrecht). Der Auftraggeber verpflichtet sich im Falle des Rücktritts,
alle nachgewiesenen und von ihm abgelehnten Grundstücke binnen 2 Jahren nach Ausübung
des Rücktrittsrechts nicht anderweitig zu bebauen. Verstößt der Auftraggeber gegen diese
Verpflichtung, indem er ein abgelehntes Grundstück binnen vorgenannter Frist anderweitig
bebaut, so hat der Auftraggeber an den Auftragnehmer eine Pauschale in Höhe von 10 % des
zum Zeitpunkt des Rücktritts vereinbarten Nettopreises (ohne Mehrwertsteuer) zu zahlen. Dem
Auftraggeber bleibt es unbenommen, nachzuweisen, dass der im konkreten Fall angemessene
Betrag wesentlich niedriger ist als die vereinbarte Pauschale von 10%.<br>
<br>
Tritt der Auftraggeber zu einem Zeitpunkt zurück, in dem bereits die Baufinanzierung durch
das finanzierende Kreditinstitut zugesagt wurde und er sich für ein Grundstück, auch ohne es
zu erwerben, entschieden hatte, ist der Auftraggeber ebenfalls zur Zahlung einer Pauschale
von 10 % des zum Zeitpunkt des Rücktritts vereinbarten Nettopreises (ohne Mehrwertsteuer)
verpflichtet. Dem Auftraggeber bleibt es unbenommen, nachzuweisen, dass der im konkreten
Fall angemessene Betrag wesentlich niedriger ist als die vereinbarte Pauschale von 10%.
		</h6>
		
		
	</div>
	

	
	
	<div class="row" style="padding: 10px">
		<h5><?php echo __('Mit der beschriebenen Rücktrittsvereinbarung sind wir einverstanden.'); ?>
		<br/></h5>
		
	</div>
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	<pagebreak  />
	<!-------------------------------------- Rücktrittsvereinbarung END -------------------------------------->
	
	
	<!-------------------------------------- Datenschutzerklärung START -------------------------------------->	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?><?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo ', '.$proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?> &nbsp;&nbsp;&nbsp;&nbsp; ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )</h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Haustyp</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date = date('d-m-Y');?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vertragsdatum</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	<div class="row" style="padding: 10px; text-align: justify;">
		<h6>
		Ich/wir willige/n ein, dass IZ-Haus GmbH unsere
		allgemeinen Vertragsdaten in gemeinsamen Datensammlungen führt, soweit dies der
		ordnungsgemäßen Durchführung unseres Bauvorhabens und des damit zusammenhängenden
		Sicherheitspaketes dient. Darüber hinaus bin/sind ich/wir damit einverstanden, dass IZ-Haus GmbH
		 unter Verwendung meiner/unserer persönlichen Daten
		eine Kundenzufriedenheitsanalyse durchführt.<br/>
		Meine/unsere Einwilligung kann jederzeit gegenüber IZ-Haus GmbH, widerrufen werden.<br/>
		<br/></h6>
		
	</div>
	
	
	
	<div class="row" style="padding: 10px">
		<h5><?php echo __('Mit der beschriebenen Datenschutzerklärung sind wir einverstanden.'); ?>
		<br/></h5>
		
	</div>
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	<pagebreak  />
	<!-------------------------------------- Datenschutzerklärung END -------------------------------------->
	
	
	<!-------------------------------------- Widerrufsbelehrung START -------------------------------------->	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?><?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo ', '.$proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp;  <?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?> &nbsp;&nbsp;&nbsp;&nbsp; ( <?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']]; 
					} ?> )</h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Haustyp</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td >&nbsp;&nbsp;&nbsp;&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $date = date('d-m-Y');?></h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vertragsdatum</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	<div class="row">
		<div class="panel panel-default">
           	<div class="panel-heading">
				<h4> Widerrufsbelehrung </h4>
			</div>
			<div class="panel-body">
			<h5> Widerrufsrecht </h5>
			<h6> Sie können Ihre Vertragserklärung innerhalb von 14 Tagen ohne Angabe von Gründen in Textform (z. B. Brief,
			Fax, E-Mail) widerrufen. Die Frist beginnt nach Erhalt dieser Belehrung in Textform, jedoch nicht vor
			Vertragsschluss und Erfüllung unserer Informationspflichten gemäß Artikel 246 §2 in Verbindung mit §1
			Absatz 1 und 2 EGBGB und nicht, bevor Ihnen auch eine Vertragsurkunde, Ihr schriftlicher Antrag oder eine
			Abschrift der Vertragsurkunde oder des Antrags zur Verfügung gestellt worden ist. Zur Wahrung der
			Widerrufsfrist genügt die rechtzeitige Absendung des Widerrufs. Der Widerruf ist zu richten an:
			IZ-Haus GmbH
			Jungfernweg 35A
			41564 Kaarst </h6>
			<h5> Widerrufsfolgen </h5>
			<h6> Im Falle eines wirksamen Widerrufs sind die beiderseits empfangenen Leistungen zurückzugewähren und
			gegebenenfalls gezogene Nutzungen (z. B. Zinsen) herauszugeben. Können Sie uns die empfangene Leistung
			sowie Nutzungen (z.B. Gebrauchsvorteile) nicht oder teilweise nicht oder nur in verschlechtertem Zustand
			zurückgewähren bzw. herausgeben, müssen Sie uns insoweit Wertersatz leisten. Dies kann dazu führen, dass
			Sie die vertraglichen Zahlungserpflichtungen für den Zeitraum bis zum Widerruf gleichwohl erfüllen müssen.
			Verpflichtungen zur Erstattung von Zahlungen müssen innerhalb von 30 Tagen erfüllt werden. Die Frist beginnt
			für Sie mit der Absendung Ihrer Widerrufserklärung, für uns mit deren Empfang. </h6>
			<h5> Besondere Hinweise </h5>
			<h6> Ihr Widerrufsrecht erlischt vorzeitig, wenn der Vertrag von beiden Seiten auf Ihren ausdrücklichen Wunsch
			vollständig erfüllt ist, bevor Sie ihr Widerrufsrecht ausgeübt haben.
			</h6>
			<h5> Finanzierte Geschäfte </h5>
			<h6> Wenn Sie diesen Vertrag durch ein Darlehen finanzieren und ihn später widerrufen, sind Sie auch an den
			Darlehensvertrag nicht mehr gebunden, wenn beide Verträge eine wirtschaftliche Einheit bilden. Dies ist
			insbesondere anzunehmen, wenn wir gleichzeitig Ihr Darlehensgeber sind oder wenn sich Ihr Darlehensgeber
			im Hinblick auf die Finanzierung unserer Mitwirkung bedient. Wenn uns das Darlehen bei Wirksamwerden des
			Widerrufs oder der Rückgabe bereits zugeflossen ist, tritt Ihr Darlehensgeber im Verhältnis zu Ihnen
			hinsichtlich der Rechtsfolgen des Widerrufs oder der Rückgabe in unsere Rechte und Pflichten aus dem
			finanzierten Vertrag ein.
			Wollen Sie eine vertragliche Bindung so weitgehend wie möglich vermeiden, machen Sie von ihrem
			Widerrufsrecht Gebrauch und widerrufen Sie zudem den Darlehensvertrag, wenn Ihnen auch dafür ein
			Widerrufsrecht zusteht.
			</h6>
			
			


			</div>
		</div>
	</div>
	

	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	<pagebreak  />
	<!-------------------------------------- Widerrufsbelehrung END -------------------------------------->
	
	
	
	
	<!-------------------------------------- Widerruf Muster START -------------------------------------->	
	<div class="row" style="padding: 10px; text-align: justify;">
		<h4 style="text-align: center;">
			Muster-Widerrufsformular
		</h4>
		<h6 >
		(Wenn Sie den Vertrag widerrufen wollen, dann füllen Sie bitte dieses Formular aus und
		senden Sie es zurück.)<br/>
		<br/>
		<br/>
		An<br/>
		<br/>
		IZ-Haus GmbH<br/> 
		Jungfernweg 35A <br/>
		41564 Kaarst <br/>
		Tel.:  02131 / 1333971<br/>
		Fax: 02131 / 1333973<br/>
		Mail:info@tc-architekt.de<br/>
		<br/>
		<br/>
		Hiermit widerrufe(n) ich/wir (*)den von mir/uns (*) abgeschlossenen Vertrag über die
		Erbringung der folgenden Dienstleistung:<br/>
		<br/>
		<hr>
		<br/>
		<hr>
		<br/>
		<hr>
		<br/>
		bestellt am: <br/>
		<br/>
		<hr>
		<br/>
		Name des/der Verbraucher(s):<br/>
		<br/>
		<hr>
		<br/>
		Anschrift des/der Verbraucher(s):<br/>
		<br/>
		<hr>
		<br/>
		<br/>
		<hr>
		<br/>
		<br/>
		<hr>
		<br/>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp;</h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Unterschrift des/der Verbraucher(s)<br>
(nur bei Mitteilung auf Papier)</td>		
				</tr>
				
				
			</table>
			
		</div>
<br/>
(*) Unzutreffendes streichen
		<br/></h6>
		
	</div>
	<pagebreak  />
	<!-------------------------------------- Widerruf Muster END -------------------------------------->
	
	
	<!-------------------------------------- ausgehändigt START -------------------------------------->	
	
	
	<div class="row" style="padding: 10px">
		<h5><?php echo __('Der Vertrag wurde dem /den Auftraggeber/n ausgehändigt.'); ?>
		<br/></h5>
		
	</div>
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	<pagebreak  />
	<!-------------------------------------- ausgehändigt END -------------------------------------->
	
	
	
	<!-------------------------------------- ldentitätsdaten START -------------------------------------->	

	<div class="row" style="padding: 10px; text-align: justify;">
		<h4 style="text-align: center;">
			Erfassung der Identitätsdaten des Auftraggebers
		</h4>
		
		<h5>
			Auftraggeber ist eine natürliche Person
		</h5>
		<div class="panel panel-default">
           	<div class="panel-heading">
				<h6> Auftraggeber </h6>
			</div>
			<div class="panel-body">
				<table>
					<tr>
						<td > <h6>Vor- und Zuname </h6> </td>
						<td > <h6><?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?> </h6> </td>
					</tr>
					<tr>
						<td > <h6>Geburtsort </h6> </td>
						<td > <h6>&nbsp; </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Geburtsdatum </h6> </td>
						<td > <h6> <?php echo date("d-m-Y",strtotime($proposal_view['MyCustomer']['birthday']));?> </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Staatsangehörigkeit </h6> </td>
						<td > <h6>&nbsp; </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Anschrift <br>
										<br>
										<br>
										<br>
							  </h6> </td>
						<td > <h6><?php echo $proposal_view['MyCustomer']['address1'];?> <br>
								<?php echo $proposal_view['MyCustomer']['zipcode'].' '.$proposal_view['MyUser']['city'];?> </h6> </td>						
					</tr>
					<tr>
						<td > <h6>ja / nein <sup>*</sup></h6> </td>
						<td > <h6>Eine Kopie des Personalausweises liegt vor </h6> </td>						
					</tr>
					<tr>
						<td > <h6>ja / nein <sup>*</sup></h6> </td>
						<td > <h6>Politisch exponierte Person </h6> </td>						
					</tr>
					
					
				</table>
			
			</div>
		</div>
		
		<?php if(!empty($proposal_view['MyCustomer']['2nd_name'])){ ?>
		
		<div class="panel panel-default">
           	<div class="panel-heading">
				<h6> Ehepartner / Mitauftraggeber </h6>
			</div>
			<div class="panel-body">
				<table>
					<tr>
						<td > <h6>Vor- und Zuname </h6> </td>
						<td > <h6> <?php if(!empty($proposal_view['MyCustomer']['2nd_name'])) echo $proposal_view['MyCustomer']['2nd_name'].' '.$proposal_view['MyCustomer']['2nd_surname'];?></h6> </td>
					</tr>
					<tr>
						<td > <h6>Geburtsort </h6> </td>
						<td > <h6>&nbsp; </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Geburtsdatum </h6> </td>
						<td > <h6> <?php if(!empty($proposal_view['MyCustomer']['2nd_birthday'])) echo date("d-m-Y",strtotime($proposal_view['MyCustomer']['2nd_birthday']));?> </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Staatsangehörigkeit </h6> </td>
						<td > <h6>&nbsp; </h6> </td>						
					</tr>
					<tr>
						<td > <h6>Anschrift <br>
										<br>
										<br>
										<br>
							  </h6> </td>
						<td > <h6> &nbsp; </h6> </td>						
					</tr>
					<tr>
						<td > <h6>ja / nein <sup>*</sup></h6> </td>
						<td > <h6>Eine Kopie des Personalausweises liegt vor </h6> </td>						
					</tr>
					<tr>
						<td > <h6>ja / nein <sup>*</sup></h6> </td>
						<td > <h6>Politisch exponierte Person </h6> </td>						
					</tr>
					
					
				</table>
			
			</div>
		</div>
		<?php } ?>
	</div>
	
	<div class="row">
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td > <h6>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date = date('d-m-Y');?></h6> </td>
				</tr>
				<tr>
					<td >Ort, Datum<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Auftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Ehepartner / Mitauftraggeber</td>		
				</tr>
				
				
			</table>
			
		</div>
		<div style="width: 200px;float:left; padding: 10px">
			<p style="clear: both;">  </p>
			<table>
				<tr>
					<td style = "border-bottom: none;"> <h6>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
				</tr>
				<tr>
					<td >&nbsp;<br>
					<br>
						<h6>&nbsp;&nbsp;&nbsp;&nbsp; </h6></td>		
				</tr>
				<tr >
					<td style = "border-bottom: none;">Vermittler</td>		
				</tr>
				
				
			</table>
			
		</div>
	</div>
	
	<div class="row" style="padding: 10px; text-align: justify;">
		<h5>
			Die Erfassung der Daten des Auftraggebers (=Identifizierung) ist nach den §§3, 4 Geldwäschegesetzt (GwG) vorgeschrieben. Zur Aufzeichnung
und Aufbewährung der vorgenannten Daten sowie zur Vorlage an die zuständige Behörde im Verdachtsfall sind wir nach §2, Abs. 1, Nr. 10, §§8,
11 GwG verpflichtet.
		</h5>
		<h5>
			<sup>*</sup> unzutreffendes streichen
		</h5>
		
	</div>
	
	
	<!-------------------------------------- ldentitätsdaten END -------------------------------------->