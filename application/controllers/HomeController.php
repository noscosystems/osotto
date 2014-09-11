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
	{		$this->render('index');
	}

	public function actionContact()
	{
		$form = New Form('application.forms.enquiry', New Enquiry);
		$frm = $form->model;

		if ($form->submitted() && $form->validate()){
			$phNumber = ($frm->phNumber!='')?("\nMy callback number is: ".$frm->phNumber):('');
			// $Name = "Admin_Is_MyName"; //senders name
			$emailFrom = $frm->emailFrom; //senders e-mail adress
			$recipient = 'clive.dann@googlemail.com'; //recipient
			$mail_body = $frm->msgText.$phNumber;
			$subject = $frm->subject;
			$head = 'From:'.$emailFrom;

			$mailToBeSent = mail($recipient, $subject, $mail_body,$head);

			if($mailToBeSent)
			  	Yii::app()->user->setFlash('Sent', 'A code has been sent to you to restore your password.');
			else
				Yii::app()->user->setFlash('Try again','Try again.');

		}
		$this->render('contact', array('form'=>$form));
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