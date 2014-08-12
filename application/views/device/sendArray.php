<?php
	use \application\models\db\Product;
	// if (isset($_POST['send'] && strlen($_POST['send']))>0){
		$products = Product::model()->findAllByAttributes(array('type'=>$send));
		$prod = [];
		foreach ($products as $product){
			$prod[$product->name] = $product->name;
		}
		$productJSON = json_encode($prod);
		echo $productJSON;
	// }
?>