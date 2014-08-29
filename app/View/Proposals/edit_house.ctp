
<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
</div>

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
					if($House['MyHouse']['bool_duplex']){ ?>
						<a href=# data-toggle="modal" data-target="#duplex_<?php echo $House['MyHouse']['id']?>"><?php echo $this->Html->image('/img/uploads/houses/'.$House['MyHousePicture'][0]['picture'], array('class' => 'featurette-image img-responsive'));?></a>
					<?php }else{
						echo $this->Html->link(
							$this->Html->image('/img/uploads/houses/'.$House['MyHousePicture'][0]['picture'], array('class' => 'featurette-image img-responsive')),
							array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']),
							array('escape' => false)
						);
					}
				} ?>
			</div>
		</div>
		
		<div class="col-md-6">
		
			<div class="row">
				<div class="col-xs-12">
					<p >
						<?php echo 'Type'.$House['MyHouse']['type'].': <b><u>'; 
						if($House['MyHouse']['bool_duplex']){ ?>
							<a href=# data-toggle="modal" data-target="#duplex_<?php echo $House['MyHouse']['id']?>"><?php echo $House['MyHouse']['name']; ?></a>
						<?php }else{
							echo $this->Html->link($House['MyHouse']['name'], array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']));
						}?></u></b>
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

<div class="modal fade" id="duplex_<?php echo $House['MyHouse']['id']?>" >
	<div class="modal-dialog">
		<div class="modal-content">
			
			<div class="modal-body" align="center">

				<div><?php echo __('This house is a duplex, choose in which side you want the house:');?> </div>
				<div>
				<a class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id'],1));?> ><span class="glyphicon glyphicon-chevron-left"></span> <?php echo $house_side[1];?> </a>
				<?php echo __('or');?>
				<a class="btn btn-md btn-success" href=<?php echo $this->Html->url(array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id'],2));?> > <?php echo $house_side[2];?> <span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>

			</div>
			
		</div>
	</div>
</div>
<?php }?>