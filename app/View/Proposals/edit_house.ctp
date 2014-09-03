
<div class="row">
	<br>
	<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
</div>

<div class="CategorieTitleBox">
        <div id="GroupMembers">
        <?php __( 'Select house');?>
        </div>
</div>


<hr>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">

<?php foreach($houses_view as $key=>$House ){?>
		<div class="col-md-6">

			<div class="col-md-4">
				<div class="row">
					<?php if(!empty($House['MyHousePicture'])){
						foreach ($House['MyHousePicture'] as $x){
							if($x['type_flag']==0){
								if($House['MyHouse']['bool_duplex']){ ?>
									<a href=# data-toggle="modal" data-target="#duplex_<?php echo $House['MyHouse']['id']?>"><?php echo $this->Html->image('/img/uploads/houses/'.$x['picture'], array('class' => 'featurette-image img-responsive'));?></a>
								<?php }else{
									echo $this->Html->link(
										$this->Html->image('/img/uploads/houses/'.$x['picture'], array('class' => 'featurette-image img-responsive')),
										array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']),
										array('escape' => false)
									);
								}
								break;
							}
						}
					} ?>
				</div>
			</div>

			<div class="col-md-8">
				<div class="row">
					<p>&nbsp;
						<?php echo __('Type').' '.$house_type[$House['MyHouse']['type']].': ';
						if($House['MyHouse']['bool_duplex']){ ?>
							<a href=# data-toggle="modal" data-target="#duplex_<?php echo $House['MyHouse']['id']?>"><?php echo $House['MyHouse']['name']; ?></a>
						<?php }else{
							echo $this->Html->link($House['MyHouse']['name'], array('controller'=>'Proposals','action'=>'selected_house', $proposal_id_view, $House['MyHouse']['id']));
						}?>
						<br>
						&nbsp; &nbsp; &nbsp;<?php echo ' <small>with '.$House['MyHouse']['size'].__(' m<sup>2</sup> in ').$House['MyHouse']['floors'].__(' floors.').'</small>'; ?>
					</p>
				</div>
			</div>
		
		</div>
		
		
		
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
</div>
<div class="col-md-1"></div>
</div>