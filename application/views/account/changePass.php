<?php

$form->attributes = array('class' => 'form-horizontal');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>

<br />
<div class="col-sm-8 col-sm-offset-2">
    <div class="well">
        <div class="row">
            <div class="col-sm-11 col-sm-offset-1">
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
                    <div class="col-sm-4 control-label">Current Password:</div>
                    <div class="col-sm-7">
                        <?php echo $widget->input($form, 'old_pass', array('class' => 'form-control') ); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 control-label">New Password:</div>
                    <div class="col-sm-7">
                        <?php echo $widget->input($form, 'password', array('class' => 'form-control') ); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 control-label">Confirm New Password:</div>
                    <div class="col-sm-7">
                        <?php echo $widget->input($form, 'rep_pass', array('class' => 'form-control') ); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-success') ); ?>
                    </div>
                </div>
                <?php echo $form->renderEnd(); ?>
            </div>
        </div>
    </div>
</div>