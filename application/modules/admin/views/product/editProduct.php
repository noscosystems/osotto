<?php

$form->attributes = array('class' => 'form-horizontal', 'enctype'=>'multipart/form-data');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Edit product <small>Please enter your product's details</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('editSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('editSuccess'); ?>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>

<div class="row">
    <div class="col-sm-3 control-label">Enter device specs:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'spec_brief', array('class' => 'form-control') ); ?>
        <?php echo $widget->hint($form, 'spec_brief', 'div', array('class' => 'help-block')); ?>
    </div>

</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter short description for device:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'short_desc', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter description for device:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'long_desc', array('class' => 'form-control textarea') ); ?>
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