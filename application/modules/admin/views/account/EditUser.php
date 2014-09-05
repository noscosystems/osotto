<?php
	/**
     * @var AccountController $this
     */
    $this->pageTitle = false;
    $assetUrl = Yii::app()->assetManager->publish(Yii::app()->theme->basePath . '/assets');


$form->attributes = array('class' => 'form-horizontal');
echo $form->renderBegin();
$widget = $form->activeFormWidget;
?>


<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>

<?php if (Yii::app()->user->hasFlash('privLevelLow')): ?>
    <div class="alert alert-danger" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('privLevelLow') ?>
    </div>
<?php endif; ?>

<?php if (Yii::app()->user->hasFlash('update')){ ?>
    <div class="alert alert-success" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('update') ?>
    </div>
<?php }else if (Yii::app()->user->hasFlash('fail')){ ?>
    <div class="alert alert-danger" >
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('fail') ?>
    </div>
<?php } ?>

<div class="page-header">
    <h1>User profile <small>Please enter your changes to</small></h1>
</div>

<div class="row">
    <div class="col-sm-3 control-label">Change password:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'password', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Repeat password:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'repPass', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Change email:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'email', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Change mobile number:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'mobile', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Select privilige level for this user:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'priv', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Fill in second phone number</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'other_number', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Country</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'country', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">County</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'county', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Town</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'town', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Postcode</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'postcode', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Addressline 1</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'address1', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Addressline2</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'address2', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2 col-sm-offset-3">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-lg btn-success') ); ?>
    </div>
</div>

<?php echo $form->renderEnd(); ?>
</div><!-- form -->




