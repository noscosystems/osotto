<?php 
	php_info();
	exit;
?>
<div class="jumbotron">
	<div class="container">
		<h1 class="text-center">Administration</h1>
		<p>Welcome to the administration section. Here you can add prdocuts to the database.</p>
		<p>
			<!-- <a class="btn btn-primary btn-lg">Learn more</a> -->
		</p>
	</div>
</div>

<div class="row col-md-12">
	<div class="col-sm-2"><?php echo CHtml::link('AddCategorie', array('/admin/product/AddProductCategorie'), array('class'=> 'btn btn-sm btn-primary')); ?></div>
	<div class="col-sm-2"><?php echo CHtml::link('AddProduct', array('/admin/product/index'), array('class'=> 'btn btn-sm btn-primary')); ?></div>
</div>