<?php
	use \application\models\db\Product;
	// if (isset($_POST['send'] && strlen($_POST['send']))>0){
		$products = Product::model()->findAllByAttributes(array('type'=>$_POST['send']));
		// echo '<pre>';
		// var_dump($products);
		// echo '</pre>';
		// exit;
		$prod = [];
		foreach ($products as $product){
			$prod[] = array('id' => $product->id,'name'=>$product->name);
		}
		$productJSON = json_encode($prod);
		echo $productJSON;
	// }