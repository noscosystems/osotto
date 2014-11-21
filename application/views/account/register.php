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
                    <h1>Register <small>Please enter your information</small></h1>
                </div>
            </div>
        </div>

        <?php
        if($widget->errorSummary($form)){
            echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
        }
        ?>

        <div class="row">
            <div class="col-sm-3 control-label">Username:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'username', array('class' => 'form-control') ); ?>
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
            <div class="col-sm-3 control-label">First Name:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'firstname', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Middle Name:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'middlename', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Last Name:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'lastname', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Age Group:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'ageGroup', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Email Address:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'email', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Mobile Number:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'mobile', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Secondary Number:</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'other_number', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Address Line 1</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'address1', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Address Line 2</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'address2', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Town</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'town', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">County</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'county', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Country</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'country', array('class' => 'form-control') ); ?>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3 control-label">Postcode</div>
            <div class="col-sm-7">
                <?php echo $widget->input($form, 'postcode', array('class' => 'form-control') ); ?>
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