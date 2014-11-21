<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Form;
    use \application\components\Controller;
    use \application\components\UserIdentity;

    class HifiController extends Controller
    {
        public function actionIndex()
        {
            throw new \CHttpException(404, "Sorry, we couldn't locate this page for you, try selecting another option above!");
        }

        public function actionPm10()
        {
            $this->render('pm10');
        }

        public function actionMh51()
        {
            $this->render('mh51');
        }
    }