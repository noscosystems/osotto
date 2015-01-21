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
                    <h1>Register <small>Enter your information below</small></h1>
                </div>
            </div>
        </div>

        <?php
        if($widget->errorSummary($form)){
            echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
        }
        ?>

        <div class="row">
            <div class="col-sm-3 control-label">Email Address:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'email', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Password:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'password', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Confirm Password:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'confirmpassword', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-7">
                <div class="checkbox radio-primary">
                    <label>
                        <input type="checkbox" checked>
                        I would like to recieve news and updates.
                    </label>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-3">
                <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-success') ); ?>
            </div>
        </div>
        <?php echo $form->renderEnd(); ?>
        <!-- form -->
    </div>
</div>