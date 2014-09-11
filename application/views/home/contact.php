
<?php
	$form->attributes = array('class' => 'form-horizontal');
	echo $form->renderBegin();
	$widget = $form->activeFormWidget;
?>
<div class="col-sm-12">
	<h2>How can we help you ?</h2>
	<div class="row col-sm-offset-1">
		<h3>Have a question for us:</h3>
	</div>
<?php if($widget->errorSummary($form)): ?>
    <div class="alert alert-danger">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<?php echo $widget->errorSummary($form); ?>
    </div>
<?php endif;?>
<?php if(Yii::app()->user->hasFlash('Sent')): ?>
    <div class="alert alert-success">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<?php echo Yii::app()->user->getFlash('Sent'); ?>
    </div>
<?php endif;?>
<?php if(Yii::app()->user->hasFlash('Try again')): ?>
    <div class="alert alert-success">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    	<?php echo Yii::app()->user->getFlash('Try again'); ?>
    </div>
<?php endif;?>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter your email:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'emailFrom', array('class' => 'form-control')); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Phone number for callback:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'phNumber', array('class' => 'form-control')); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Subject of your email:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'subject', array('class' => 'form-control')); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-3 control-label">Enter description for device:</div>
    <div class="col-sm-6">
        <?php echo $widget->input($form, 'msgText', array('class' => 'form-control textarea') ); ?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2 col-sm-offset-3">
        <?php echo $widget->button($form, 'submit', array('class' => 'btn btn-md btn-success') ); ?>
    </div>
</div>
</div>
<?php echo $form->renderEnd(); ?>
<div class="col-sm-offset-4 col-sm-4" style="margin-top:50px;">
	<div class="col-sm-6">
		<h1 class="text-center" class="advertise">Contact us</h1>
		<div class="row">
			<div class="col-sm-6" >By Phone:</div>
			<div class="col-sm-6" ><p class="p">044/02920400998 </p></div>
		</div>
		<div class="row">
			<div class="col-sm-6" >By mail:</div>
			<div class="col-sm-6" ><p class="p"><a href="mailto:sales@osotto.co.uk?Subject=Question" target="_blank">sales@osotto.co.uk</a></p></div>
		</div>
	</div>
</div>

<style>
	.advertise{
		font-family:sans-serif;
	}
	div > .p{
		color:#0689d8;
		font-weight:bold;
	}
</style>

<!-- telephone number 02920 400998
email sales@osotto.co.uk -->