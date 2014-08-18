<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\UserIdentity;
    use \application\components\Form;
    use \application\models\form\Enquiry;
    
class HomeController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionAboutUs()
    {
        $this->render('AboutUs');
    }

    public function actionContactUs()
    {
    	$form = new Form('application.forms.enquiry',new Enquiry);

    	if ($form->submitted() && $form->validate()){

    	}
        $this->render('ContactUs', array('form' => $form));
    }

	// Uncomment the following methods and override them if needed
	/*

	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}