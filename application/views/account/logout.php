<br />
<meta http-equiv="refresh" content="2; url=http://<?php echo $_SERVER['SERVER_NAME'].Yii::app()->getBaseUrl();?>">
<?php if(Yii::app()->user->hasFlash('account.logout.success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	   <?php echo Yii::app()->user->getFlash('account.logout.success'); ?>
	</div>
<?php endif;?>

