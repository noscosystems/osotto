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
        width: 620px;
        height: 465px;
        background: #000;
    }
	.textarea{
		resize: none;
	}
</style>
<?php $bootstrap = Yii::app()->assetManager->publish(Yii::getPathOfAlias('composer.twbs.bootstrap.dist')); ?>
<script src="plugins/flickr/galleria.flickr.min.js"></script>
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