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

    // Depricated (Use actionView)
    public function actionviewProduct($id){
        $product = Product::model()->findByPk($id);
        $imgs = $product->productImages;
        $this->renderPartial('viewProduct', array('imgs' => $imgs) );//($product)?(array('product' => $product)):(null));
    }

    public function actionView($id)
    {
        $product = \application\models\db\Product::model()->findByPk($id);

        if(!$product)
            throw new \CHttpException(400, 'Could not find a product with the ID specified');

        $variables = array(
            'product' => $product
        );

        Yii::app()->request->isAjaxRequest
        ? $this->renderPartial('view', $variables)
        : $this->render('view', $variables);
    }
}
?>