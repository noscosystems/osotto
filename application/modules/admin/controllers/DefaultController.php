<?php

	// namespace application\controllers;

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;

	class DefaultController extends Controller
	{

		public function actionIndex()
		{
			if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->model()->priv <= 50)
                $this->redirect(array('/home'));
            else if (Yii::app()->user->model()->priv >= 50)
                $this->render('index');
		}
	}