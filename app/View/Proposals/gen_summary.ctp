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
		<br/><?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?>
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
							echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" "));?>
							</p>
						</div>
						<pagebreak  />
					<?php }
					if ($bool_basement){
						foreach ($basement_house_pictures_view as $key=>$x){?>
							<div class="row">
								<h4><?php echo $x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description']; ?></h4>
								<p style="padding-top: 5cm"> <?php 
								echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" "));?>
								</p>
							</div>
							<pagebreak  />
						<?php } 
					}else{
						foreach ($sideview_nobasement_house_pictures_view as $key=>$x){?>
							<div class="row">
								<h4><?php echo $x['MyHousePicture']['name'].': '.$x['MyHousePicture']['description']; ?></h4>
								<p style="padding-top: 5cm"> <?php 
								echo $this->Html->image('/img/uploads/houses/'.$x['MyHousePicture']['picture'], array( "class" => "featurette-image img-responsive", "alt"=>" "));?>
								</p>
							</div>
							<pagebreak  />
						<?php } 
					}?>
	
	
	<!-------------------------------------- Grundrisse & Ansichten END -------------------------------------->
	
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
	