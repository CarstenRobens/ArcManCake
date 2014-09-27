<?php $pic_dir='uploads/home/'; ?>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      
	  <ol class="carousel-indicators">
		<?php
		for($i = 0; $i < count($home_pictures_view); $i++){
			if($i==0){?>
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<?php
			}else{?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>"></li>
		<?php
			}}?>
      </ol>
      <div class="carousel-inner">
      <?php foreach($home_pictures_view as $key=>$x){ ?>
        <div class="item <?php if($key==0){ echo 'active';}?>" >
          <?php echo $this->Html->image($pic_dir.$x['HomePicture']['picture'], array('class' => 'featurette-image img-responsive')); ?>
          <div class="container">
            <div class="carousel-caption">
              <h1><?php echo $x['HomePicture']['title']; ?></h1>
              <p><?php echo $x['HomePicture']['description']; ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->



    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <?php 
			  echo $this->Html->image('Angebote.png', array('width'=>'140px','height'=>'140px','class' => 'img-circle'));
			?>
		  <h2>Immobilienscout Angebote</h2>
          <p>Sie sind auf der Suche nach einem direktem Angebot? Dann stöbern Sie in unseren Angeboten</p>
		  <br>
          <p> <?php echo $this->Html->link('Angebote anschauen', array('controller' => 'Offer', 'action' => 'index'),array('class' => 'btn btn-md btn-success'));?> </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
			<?php 
			  echo $this->Html->image('Hausausstellung.png', array('width'=>'140px','height'=>'140px','class' => 'img-circle'));
			?>
          <h2>Hausausstellung</h2>
          <p>Sie wissen genau wonach Sie suchen, oder möchten Sich einen überblick verschaffen? Dann schauen Sie sich in unserer Hausausstellung um.</p>
          <p> <?php echo $this->Html->link('Hausausstellung anschauen', array('controller' => 'Houses', 'action' => 'index'),array('class' => 'btn btn-md btn-success'));?> </p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <?php 
			  echo $this->Html->image('Proposal.png', array('width'=>'140px','height'=>'140px','class' => 'img-circle'));
			?>
		  <h2>Portfolio</h2>
          <p>Lassen Sie sich von unserer langjährigen Erfahrung überzeugen und schauen Sie sich vergangene Bauprojekte an.</p>
          <p> <?php echo $this->Html->link('Portfolio anschauen', array('controller' => 'GalleryPictures', 'action' => 'index'),array('class' => 'btn btn-md btn-success'));?> </p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
      
