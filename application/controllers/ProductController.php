<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\UserIdentity;
    use \application\components\Form;
    use \application\models\db\ProductCategories;
    
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
}
?>