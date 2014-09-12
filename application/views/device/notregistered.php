<?php $baseUrl = Yii::app()->baseUrl ?>
<meta http-equiv="refresh" content="2; url=<?php echo $baseUrl;?>/account/register">
<br />
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    You must register with Osotto before you can register your device.
    <?php echo CHtml::link('Register with Osotto', array('/account/register'), array('class' => 'alert-link')); ?>
</div>