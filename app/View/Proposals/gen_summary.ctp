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
		<br/> Gesamtpreis Ihres Traumhauses inklusive der ausgewählten Sonderausstattungen: <?php echo $this->Number->currency($proposal_view['MyHouse']['price']+$summed_extras+$enlagment_price,'EUR',array('wholePosition'=>'after'));?>
		</h5>
	</div>
	
	
	<pagebreak  />
	<!-------------------------------------- First Page END -------------------------------------->
	
	<!---------------------------------------------HousePictures START---------------------------------------------------->
	
	<?php 
foreach ($normal_house_pictures_view as $x){
	if ($x['MyHousePicture']['id']==$proposal_view['Proposal']['default_house_picture_id']){
		$default_picture=$x['MyHousePicture'];
		break;
	}
}?>
	
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           		<div class="panel-heading">
				<h3 class="panel-title" style="text-align:left;">
					<?php echo __( 'House').': '.$proposal_view['MyHouse']['name'];?>
					<a alt="<?php echo $company['name'].': '.$company['keywords'];?>" class="locked" style="float:right;" href=<?php echo $this->Html->url(array('controller' => 'Proposals','action' => 'edit_house',$proposal_view['Proposal']['id']));?> ><span  class="glyphicon glyphicon-random"></span></a>
				</h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	

			
	
	
	<div class="row">
	
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:80%;float: left;">
				<div class="green-text" style="width:25%;float: left;">
					<?php echo __('Size:'); ?>
				</div>
				<div style="width:25%;float: left;">
				<?php if($enlargement>0){
					echo $proposal_view['MyHouse']['size'].' + '.$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}elseif($enlargement<0){
					echo $proposal_view['MyHouse']['size'].' - '.-1*$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}else{
					echo $proposal_view['MyHouse']['size'].__(' m<sup>2</sup> in ').$proposal_view['MyHouse']['floors'].__(' floors.');
				}?>
				</div>
				<br>
				<div class="green-text" style="width:25%;float: left;">
					<?php echo __('Size according to DIN 227:'); ?>
				</div>
				<div style="width:25%;float: left;">
				<?php if($enlargement>0){
					echo $proposal_view['MyHouse']['size_din'].' + '.$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup>');
				}elseif($enlargement<0){
					echo $proposal_view['MyHouse']['size_din'].' - '.-1*$enlargement*$proposal_view['MyHouse']['floors'].__(' m<sup>2</sup>');
				}else{
					echo $proposal_view['MyHouse']['size_din'].__(' m<sup>2</sup>');
				}?>
				</div>
				<div style="width:50%;float: left;text-align:right">
					<?php if($bool_standalone){ 
						echo $house_side[3];
					}elseif($proposal_view['MyHouse']['bool_duplex']){
						 echo $house_side[$proposal_view['Proposal']['duplex_side']].' '.__('side'); 
					} ?>
				</div>
		</div>
		
		
		<div style="width:10%;float: left">
		&nbsp;
		</div>
	</div>
	<br/>	
	<div class="row">	
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:80%;float: left;">
			<?php if(!empty($default_picture)){ 
					echo $this->Html->image('uploads/houses/'.$default_picture['picture'], array( "class" => "featurette-image img-responsive", "alt"=>$company['name'].": ".$company['keywords'] )); 
				}?>
		</div>
		
		
		<div style="width:10%;float: left">
		&nbsp;
		</div>
	</div>
	<br/>	
	<div class="row">	
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:80%;float: left;">
			<div class="green-text">
					<?php echo __('Description:'); ?>
			</div>
			<div style="text-align: justify;">
			<?php echo $this->Text->autoParagraph($proposal_view['MyHouse']['description']); ?> 
			</div>
			
		</div>
		
		
		<div style="width:10%;float: left">
		&nbsp;
		</div>
	</div>		

<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
	
	
	
	<!---------------------------------------------HousePictures END---------------------------------------------------->
	
	<!---------------------------------------------Floorplans START---------------------------------------------------->
	<!---------------------------------------------Floorplans END---------------------------------------------------->
	
	
	<!---------------------------------------------Sonderausstattung START---------------------------------------------------->

<?php if (!empty($bought_extras_view)){ ?>	
	<div class="row">
		<div class="col-md-12">
		<div class="panel panel-success">
           	<div class="panel-heading">
				<h3 class="panel-title"><?php echo __( 'Sonderausstattung');?></h3>
			</div>
			<div class="panel-body">
			
			
<!----------PANEL CONTENT------------------>	
			
			
<?php foreach($bought_extras_view as $index=>$x) { ?>
	<div class="row">
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:65%;float: left">
			<div class="green-text">
			<?php if ($x['MyExtra']['bool_custom']){ echo __('Custom: ');}?> 
			<?php echo $x['MyExtra']['name']; ?>
			</div>
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
	<br/>
	
	<div class="row">
	
		<div style="width:10%;float: left">
		&nbsp;
		</div>
		
		<div style="width:80%;float: left;text-align: justify;">
			<?php echo $this->Text->autoParagraph($x['MyExtra']['description']); ?> 
			<?php if(!empty($x['MyBoughtExtra']['comment'])){ ?>
			<?php echo '<strong>'.__('Comment:').' </strong>'.$this->Text->autoParagraph($x['MyBoughtExtra']['comment']); ?>
			<?php }?>
			<?php if($x['MyBoughtExtra']['factor']!=1){ ?>
			<p> <?php echo $x['MyBoughtExtra']['factor'].' '.$extra_unit['factor'][$x['MyExtra']['units']]; ?> </p>
			<?php }?>
		</div>
		
		
		<div style="width:10%;float: left">
		&nbsp;
		</div>
	
		
	</div>

	<hr>
<?php } ?>

<!----------END PANEL CONTENT-------------->			
			
			
			</div>
		</div>
		</div>
	</div>
<?php }?>
    	

	<!---------------------------------------------Sonderausstattung END---------------------------------------------------->

	
	