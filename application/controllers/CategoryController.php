<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\UserIdentity;
    use \application\components\Form;

    class CategoryController extends Controller
	{
		public function actionView($id)
		{
			$category = \application\models\db\ProductCategories::model()->findByPk($id);

			if(!$category)
				throw new \CHttpException(400, 'Could not find a category with the ID specified');

			$variables = array(
				'category' => $category
			);

			Yii::app()->request->isAjaxRequest
            ? $this->renderPartial('view', $variables)
            : $this->render('view', $variables);
		}
	}