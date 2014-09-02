<?php

$assetMngr = Yii::app()->assetManager;

if ($imgs!=null){ ?>
<div class="galleria">
	<?php foreach ($imgs  as $img ): ?>
		<img src="<?php echo $assetMngr->publish($img->url); ?>" data-title="My title" data-description="My description">
	<?php endforeach; ?>
</div>
<?php }else{ ?>
    <div>Product doesn't have any images.</div>
<?php } ?>

<style>
    .galleria{
    	position:absolute;
    	top:0;
    	left:0;
/***********************************************
    	margin-left:-320px;
    	margin-top:-240px;
        width: 640px;
        height: 480px;
***********************************************/
		width:100%;
		height:100%;
        background: #000;
    }
</style>
<?php $bootstrap = Yii::app()->assetManager->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist')); ?>
<script type="text/javascript" src="<?php echo $bootstrap; ?>/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="<?php echo $bootstrap; ?>/js/galleria/galleria-1.3.6.min.js"></script>
<script>
$(function() {
//$( document ).ready(function() {
// Handler for .ready() called.
	var galleria = document.getElementsByClassName('galleria');
	if (galleria.length>0){
		Galleria.loadTheme('<?php echo $bootstrap; ?>/js/galleria/themes/classic/galleria.classic.min.js');
	    Galleria.run('.galleria', {
		    extend: function(options) {

		        Galleria.log(this) // the gallery instance
		        Galleria.log(options) // the gallery options

		        // listen to when an image is shown
		        this.bind('image', function(e) {

		            Galleria.log(e) // the event object may contain custom objects, in this case the main image
		            Galleria.log(e.imageTarget) // the current image
		            
		            // lets make galleria open a lightbox when clicking the main image:
		            $(e.imageTarget).click(this.proxy(function() {
		               this.openLightbox();
		            }));
		        });
		    }
		});
	}
});

</script>