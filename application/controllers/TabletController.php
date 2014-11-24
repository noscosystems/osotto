<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Form;
    use \application\components\Controller;
    use \application\components\UserIdentity;

    class TabletController extends Controller
    {
        public function actionIndex()
        {
            throw new \CHttpException(404, "Sorry, we couldn't locate this page for you, try selecting another option above!");
        }

        public function actionT42()
        {
            $this->render('t42');
        }

        public function actionT84()
        {
            $this->render('t84');
        }
    }