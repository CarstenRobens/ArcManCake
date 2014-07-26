<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>

<div class="CategorieTitleBox">
        <div id="GroupMembers">
        <?php __( 'Select house',false);?>
        </div>
</div>

<hr>
    <?php foreach($houses_view as $House ){?>

      <div class="row"id="<?php echo $id = str_replace(' ', '+', $House['MyHouse']['name']);?>">
	  <?php if(true){?>
        
		<div class="col-md-2"></div>
		
		<div class="col-md-2">
			<div class="row">
				<?php if(!empty($House['MyHousePicture'])){
					echo $this->Html->link(
						$this->Html->image('/img/uploads/houses/'.$House['MyHousePicture'][0]['picture'], array('class' => 'featurette-image img-responsive')),
						array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']),
						array('escape' => false)
					);
				} ?>
			</div>
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-12">
					<p >
						<?php echo 'Type'.$House['MyHouse']['type'].': <b><u>'; echo $this->Html->link($House['MyHouse']['name'], array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']));?></u></b>
						<br>
						&nbsp; &nbsp;<?php echo ' <small>with '.$House['MyHouse']['size'].__(' m<sup>2</sup> in ').$House['MyHouse']['floors'].__(' floors.').'</small>'; ?>
					</p>
					<p>
						<?php echo $House['MyHouse']['description']; ?>
					</p>
				</div>
			</div>
        </div>
        
		<div class="col-md-2"> </div>
		
		<?php }?>
      </div>
	<hr>
    <?php }?>