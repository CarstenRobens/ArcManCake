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
		<br/><?php echo __('Unverbindliches Angebot'); ?>
		<br/><?php if(!empty($proposal_view['MyHouse']['name'])) echo $proposal_view['MyHouse']['name'];?> ( <?php echo $house_side[$proposal_view['Proposal']['duplex_side']]?> )
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
	
	<div class="row">
		<h4 style = "text-align: center;">
		<br/><?php echo __('Für: '); ?> <?php echo $proposal_view['MyCustomer']['name'].' '.$proposal_view['MyCustomer']['surname'];?>
		<br/>
		</h4>
		<h5 style = "text-align: center;">
		<br/> <?php if(!empty($proposal_view['MyCustomer']['address1'])) echo $proposal_view['MyCustomer']['address1'].' '.$proposal_view['MyCustomer']['address2'];?>
		<br/> <?php if(!empty($proposal_view['MyCustomer']['zipcode'])) echo $proposal_view['MyCustomer']['zipcode'].' '.$proposal_view['MyCustomer']['city'];?>
		</h5>
	</div>
	
	
	<div class="row">
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<br/>
		<h5 style = "text-align: center;">
		<br/> Gesamtpreis Ihres Traumhauses inklusiver gewählten Sonderausstattungen: <?php echo $this->Number->currency($proposal_view['MyHouse']['price']+$summed_extras+$enlagment_price,'EUR',array('wholePosition'=>'after'));?>
		</h5>
	</div>
	
	
	<pagebreak  />
	<!-------------------------------------- First Page END -------------------------------------->
	
	<!---------------------------------------------EXTRAS---------------------------------------------------->

<?php if (!empty($bought_extras_view)){ ?>	
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Extras');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_extras_view as $index=>$x) { ?>
	<div class="row">
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:65%;float: left">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<?php echo $x['MyExtra']['name']; ?>
		</div>
		
		
		<div style="width:5%;float: left">
			<strong><?php echo __('Price:'); ?></strong>
		</div>
		
		<div style="width:10%;float: left; text-align: right;">
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

		</div>
		<div style="width:10%;float: left">
		&nbsp;
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-2"> </div>
		
		<div class="col-md-<?php if (!empty($x['MyExtra']['picture'])){ echo '6';}else{ echo '8';}?>">
			
			<?php echo $this->Text->autoParagraph($x['MyExtra']['description']); ?> 
			<?php if(!empty($x['MyBoughtExtra']['comment'])){ ?>
			<?php echo '<strong>'.__('Comment:').' </strong>'.$this->Text->autoParagraph($x['MyBoughtExtra']['comment']); ?>
			<?php }?>
			<?php if($x['MyBoughtExtra']['factor']!=1){ ?>
			<p> <?php echo $x['MyBoughtExtra']['factor'].' '.$extra_unit['factor'][$x['MyExtra']['units']]; ?> </p>
			<?php }?>
		</div>
		
		<?php if (!empty($x['MyExtra']['picture'])){ ?>
			<div class="col-md-2">
				<?php echo $this->Html->image('uploads/extras/'.$x['MyExtra']['picture'], array('class' => 'featurette-image img-responsive')); ?> 
			</div>
		<?php } ?>
				
		<div class="col-md-2"> </div>
	</div>

	<hr>
<?php } ?>

<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }?>
    	








	
	
	
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
	