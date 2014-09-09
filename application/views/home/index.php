<?php
/* @var $this HomeController */

	$this->breadcrumbs=array(
		'Home',
	);
?>
	<?php $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets'); ?>
	<div style="height:400px; overflow:hidden; z-index:100;" id="image-cycle" class="carousel slide" data-ride="carousel" data-interval="4000" data-wrap="true">
		<!-- Indicators -->
	    <ol class="carousel-indicators">
	        <li data-target="#image-cycle" data-slide-to="0" class="active"></li>
	        <li data-target="#image-cycle" data-slide-to="1"></li>
	        <li data-target="#image-cycle" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
			<div class="item active">
				<img src="<?php echo $assetUrl; ?>/images/carousel-bg-dark.png" style="height:400px; width:100%" class="img-responsive">
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<img src="<?php echo $assetUrl; ?>/images/carousel-bg-light.png" style="height:400px; width:100%" class="img-responsive">
				<div class="carousel-caption">
				</div>
			</div>
			<div class="item">
				<img src="<?php echo $assetUrl; ?>/images/carousel-bg-blue.png" style="height:400px; width:100%" class="img-responsive">
				<div class="carousel-caption">
				</div>
			</div>
		</div>

		<!-- Controls -->
	    <a class="left carousel-control" href="#image-cycle" data-slide="prev">
	        <span class="glyphicon glyphicon-chevron-left"></span>
	    </a>
	    <a class="right carousel-control" href="#image-cycle" data-slide="next">
	        <span class="glyphicon glyphicon-chevron-right"></span>
	    </a>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-6" style="height:400px; overflow:hidden; padding-right:0px;">
			<div style="width:100%; height:100%; background:#AAA;"><br /></div>
		</div>
		<div class="col-xs-12 col-sm-6" style="height:400px; overflow:hidden; padding-left:0px;">
			<div style="width:100%; height:100%; background:#BBB;"><br /></div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-6" style="height:400px; overflow:hidden; padding-right:0px;">
			<div style="width:100%; height:100%; background:#CCC;"><br /></div>
		</div>
		<div class="col-xs-12 col-sm-6" style="height:400px; overflow:hidden; padding-left:0px;">
			<div style="width:100%; height:100%; background:#DDD;"><br /></div>
		</div>
	</div>
