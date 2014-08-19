<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home',
);
?>
<?php $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets'); ?>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <!-- <li data-target="#carousel-example-generic" data-slide-to="4"></li> -->
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $assetUrl; ?>/images/carousel3.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/carousel2.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/hifi1.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/soundbar1.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>
  

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
<div class="col-sm-12 text-center">
  <h3 style="font-size: 4em;" class="font-ubuntu text-dark text-shadow-light">Welcome to Osotto - your high tech solutions</h3>
</div>
<div class="col-sm-12">
  <div class="col-sm-6"><p>
    Bluetooth, Optical, Auxiliary & Co-axial, USB, SD, MS, MMC inputs

    True 5.1 Surround Sound & Dolby Pro-logic II. 

    Full MP3 & WMA audio file playback

    Output for remote active sub

    Full remote control

    Size: 1098mm (l) x 235mm (w) x 165mm (h)

    High piano-gloss finish to front panel

    Output Power – RMS 125watt (5x15w + 50w)
</p><p>Speakers:</p>
    <ul style="list-style-type:none;">

      <li>Front 3” x2 + 1” tweeter x 2</li>

      <li>Centre 3” x 2 + 1” tweeter</li>

      <li>Surround 3” x 2</li>
    
    <li>Frequency Response: 85hz – 25khz</li>
    </ul>
    <p>Subwoofers:</p>
    <ul style="list-style-type:none;">
      <li>5.25” x 2 with side reflex ports.</li>

      <li>Frequency response: 40hz – 150hz</li>

      <li>S/N Ratio: >86db</li>
  </div>
  <div class="col-sm-6">
    <?php echo CHtml::image($assetUrl.'/images/soundbar.png', 'alt', array ('height' => '320', 'width' => '420')); ?>
  </div>
  </div>
<?php
/*
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
*/
?>
