<?php

$form->attributes = array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Product addition <small>Please enter your product's details</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('catSuccessfullyAdded')): ?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('catSuccessfullyAdded'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>
<div class="row">
    <div class="col-sm-3 control-label">Enter new product type:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'name', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-offset-3 col-sm-2">
        <input name="image1" type="file">
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2 col-sm-offset-3">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-lg btn-success') ); ?>
    </div>
</div>
<?php echo $form->renderEnd(); ?>
<!-- form -->