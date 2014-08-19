<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\UserIdentity;
    use \application\components\Form;
    use \application\models\form\Enquiry;
    
class ProductController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
}
?>