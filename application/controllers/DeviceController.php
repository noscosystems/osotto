<?php

    namespace application\controllers;

    use \Yii;
    use \CException as Exception;
    use \application\components\Controller;
    use \application\components\Form;
    use \application\models\form\RegDev;
    use \application\models\db\Registration;
    
class DeviceController extends Controller
{
	public function actionRegDevice()
	{
		if (Yii::app()->user->isGuest)
			$this->redirect(array('device/notregistered'));
		else {
			$form = new Form('application.forms.regDev', new RegDev);
			$frm = $form->model;

			if ($form->submitted() && $form->validate()){
				$reg = New Registration;
				$reg->attributes = $form->model->attributes;
				$reg->customerId=Yii::app()->user->id;
				$reg->dateRegistered = time("Today");
				if($reg->date_purchased > time("Now")){
					$frm->addError('dateInvalid','Purchase date can not be past today\'s date!');
				}
				if (empty($reg->errors) && empty($frm->errors)){
					($reg->save())?(Yii::app()->user->setFlash('regDevSuccess','Registered device successfully')):'';
				}
			}

			$frm->date_purchased = date("m/d/Y");
		}
		$this->render('regDevice',array ('form'=>$form ));
	}

	public function actionnotregistered(){
		$this->render('notregistered');
	}

	public function actionsendArray(/*$send*/){
		$this->renderPartial('sendArray'/*, array('send' => $send)*/);
	}
}