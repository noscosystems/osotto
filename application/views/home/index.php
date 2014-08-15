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
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo $assetUrl; ?>/images/carousel1.png" alt="...">
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
      <img src="<?php echo $assetUrl; ?>/images/carousel3.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/carousel4.png" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="<?php echo $assetUrl; ?>/images/carousel5.png" alt="...">
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
<?php
/*
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>
*/
?>
