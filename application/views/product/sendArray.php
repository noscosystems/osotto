<?php
	use \application\models\db\Product;
	// if (isset($_POST['send'] && strlen($_POST['send']))>0){
		$baseURL = Yii::app()->baseUrl;
		$products = Product::model()->findAllByAttributes(array('catId'=>$_POST['send']));
		$prod = [];
		foreach ($products as $product){
			$prod[] = array(
							array( 0 => $product->name, 1 => $product->model_number, 2=>$product->short_desc),
							array( 0 => $product->long_desc, 1 => $product->pdf->url, 2 => $baseURL.'/product/viewProduct?id='.$product->id)
						);
		}
		$productJSON = json_encode($prod);
		echo $productJSON;
	// }