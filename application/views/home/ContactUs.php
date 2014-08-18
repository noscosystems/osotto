<?php
/* @var $this HomeController */

$this->breadcrumbs=array(
	'Home Controller',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<?php
	$form->attributes = array('class' => 'form-horizontal');
	echo $form->renderBegin();
	$widget = $form->activeFormWidget;
?>
<?php if(Yii::app()->user->hasFlash('registerSuccess')): ?>
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo Yii::app()->user->getFlash('registerSuccess'); ?>
    </div>
<?php endif; ?>

<?php
if($widget->errorSummary($form)){
    echo '<div class="alert alert-danger">' . $widget->errorSummary($form) . '</div>';
}
?>

<div class="row">
    <div class="col-sm-3 control-label">Enter subject:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'subject', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter your question:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'msgText', array('class' => 'form-control') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2 col-sm-offset-3">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-lg btn-success') ); ?>
    </div>
</div>
<?php echo $form->renderEnd(); ?>
<!-- <p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p> -->