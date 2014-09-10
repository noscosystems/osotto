<?php

$form->attributes = array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Ppf upload </h1>
    <!-- <small>Please enter your product's details</small> -->
</div>

<?php if(Yii::app()->user->hasFlash('UplSuccess')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('UplSuccess'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>
<div class="row">
    <div class="col-sm-3 control-label">Upload new pdf on top of the old one:</div>
    <div class="col-sm-3">
        <input type="file" name="pdf">
        <?php echo $widget->input($form, 'id', array('class' => '') ); ?>
    </div>
    <div class="col-sm-2">
    	<?php echo $widget->button($form, 'submit', array('class' => 'btn btn-xs btn-success') ); ?>
	</div>
</div>

<?php echo $form->renderEnd(); ?>