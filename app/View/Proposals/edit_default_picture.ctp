
<div class="row">
	<h3>
		<?php echo __( 'Select the default picture for this house ');?>
	</h3>
</div>

<div class="row">
	<div class="col-md-1"></div>
	
	<div class="col-md-10" align=center>
		<?php for($j=0; $j<=count($house_pictures_view)-1; $j++) {
			if (($j % 3) ==0){ ?>
				<div class="row">
				<?php for ($i=0; $i<=2; $i++){ ?>
					<div class="col-md-4" align=center>
						<?php if (!empty($house_pictures_view[$j+$i])){
							echo $this->Html->link(
									$this->Html->image('/img/uploads/houses/'.$house_pictures_view[$j+$i]['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')),
									array('controller'=>'Proposals','action'=>'selected_default_picture', $proposal_id_view, $house_pictures_view[$j+$i]['MyHousePicture']['id']),
									array('escape' => false)
							);
						}?>
					</div>
				<?php }?>
				</div>
			<?php }
		}?>
		
		<div class="row">
			
		</div>
	</div>
	
	<div class="col-md-1"></div>
	
</div>