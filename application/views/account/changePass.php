<?php

$form->attributes = array('class' => 'form-horizontal');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<div class="page-header">
    <h1>Change password <small>Please enter new password</small></h1>
</div>

<?php if(Yii::app()->user->hasFlash('changePassSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('changePassSuccess'); ?>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>

<div class="row">
    <div class="col-sm-3 control-label">Enter old password:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'old_pass', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter new password:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'password', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Repeat new password:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'rep_pass', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 col-sm-offset-6">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-md btn-success') ); ?>
    </div>
</div>
<?php echo $form->renderEnd(); ?>
