additionSuccessfull
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
		<div class=" col-sm-offset-2 col-sm-12 help-block">
			Allowed image types are: jpeg and png.
		</div>
	</div>
<?php echo $form->renderEnd(); ?>
