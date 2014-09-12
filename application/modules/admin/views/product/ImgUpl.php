<?php if(Yii::app()->user->hasFlash('additionSuccessfull')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('additionSuccessfull'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php endif; ?>
<div class="page-header">
	<h1>Want<small> to add another image ?</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('emptyImg')): ?>
    <div class="alert alert-warning">
        <?php echo Yii::app()->user->getFlash('emptyImg'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php endif;
	$form->attributes = array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data');
	echo $form->renderBegin();
	$widget = $form->activeFormWidget;

	if (Yii::app()->user->hasFlash('SuccessUpl')): 
?>
	<div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('SuccessUpl'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php endif; ?>

	<div class="row">
		<div class="col-sm-2 control-label"></div>
		<div class="col-sm-3">
			<?php echo $widget->input($form, 'id'); ?>
			<input type="file" name="image1">
			
		</div>
		<div class="col-sm-3">
			<?php echo $widget->button($form, 'submit', array('class' => 'btn btn-xs btn-success') ); ?>
		</div>
		<div class="col-sm-3">
			<?php echo CHtml::link('Finished', array('/home'), array('class'=> 'btn btn-xs btn-success')); ?>
		</div>
		<div class=" col-sm-offset-2 col-sm-12 help-block">
			Allowed image types are: jpeg and png.
		</div>
	</div>
<?php echo $form->renderEnd(); ?>

<div class="row" >
		<!-- <table class="table"> -->
		<!-- <tbody> -->
		<?php foreach ($images as $k => $v):?>
			<?php //if ($k==0 || $k%3==0): ?>
			<!-- <tr> -->
			<?php //endif; ?>
			<!-- <td> -->
			<div  class="col-sm-4" >
				<div class="image-hover">
					<?php echo CHtml::image(Yii::app()->assetManager->publish($v->url), $v->productId,
					array(
					'class' => 'img-rounded',
					'height' => '240',
					'width' => '300'
					));
					?>
					<div class="overlay">
						<?php echo CHtml::link('Delete', array('DeleteImage', 'id' => $v->id), array('class' => 'btn btn-danger')); ?>
					</div>
				</div>
			</div>
			<!-- </td> -->
		<?php endforeach; ?>
		<!-- </tr> -->

<style>

	.image-hover{
		position:relative;
	}
	.overlay {
		top:0;
		left:0;
		width:100%;
		height:100%;
		z-index:50;
		display: none;
		position: absolute;
		background: rgba (0,0,0, 0.2);
	}

</style>
<script>
$(function() {
	$(".image-hover").hover( function(){
			// What happens when the mouse is hovered
			$(this).children('.overlay').show();
		}, function(){
			// What happens the mouse leaves
			$(this).children('.overlay').hide();

		});
});
</script>
