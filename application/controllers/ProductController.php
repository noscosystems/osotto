<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\UserIdentity;
    use \application\components\Form;
    use \application\models\db\ProductCategories;
    use \application\models\db\Product;
    use \application\models\db\ProductImages;
    
class ProductController extends Controller
{
	public function actionIndex()
	{
        $categories = ProductCategories::model()->findAll();
		$this->render('index',($categories)?(array('categories' => $categories)):(null));
	}

    public function actionsendArray(/*$send*/){
        $this->renderPartial('sendArray'/*, array('send' => $send)*/);
    }

    public function actionviewProduct($id){
        $product = Product::model()->findByPk($id);
        $imgs = $product->productImages;
        $this->renderPartial('viewProduct', array('imgs' => $imgs) );//($product)?(array('product' => $product)):(null));
    }
}
?>