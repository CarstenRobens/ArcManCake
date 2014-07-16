<?php echo $this->Html->link('Back', array('controller'=>'Proposals','action'=>'view',$proposal_id_view)) ?>
<?php echo $this->Form->create('Proposal'); ?>

<div class="control-group">
	<label class="control-label" for="radios">Select one picture</label>
	<div class="controls">
		<?php foreach($house_pictures_view as $x){ ?>
			<label class="radio" for="radios-0">
				<input type="radio" name="data[Proposal][default_house_picture_id]" id="<?php echo $x['MyHousePicture']['id'];?>" value="<?php echo $x['MyHousePicture']['id'];?>">
					<?php echo $this->Html->image('uploads/houses/'.$x['MyHousePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
			</label>
		<?php } ?>
	</div>
</div>



<?php echo $this->Form->end('Add house to proposal'); ?>

