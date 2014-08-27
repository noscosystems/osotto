<?php
	use \application\models\db\Product;
	// if (isset($_POST['send'] && strlen($_POST['send']))>0){
		$products = Product::model()->findAllByAttributes(array('catId'=>$_POST['send']));
		$prod = [];
		foreach ($products as $product){
			$prod[] = array( 0 => $product->model_number, 1=>$product->short_desc);
		}
		$productJSON = json_encode($prod);
		echo $productJSON;
	// }