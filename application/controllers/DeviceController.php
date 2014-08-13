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
		$form = new Form('application.forms.regDev', new RegDev);
		if ($form->submitted() && $form->validate()){
			$frm = $form->model;
			$reg = New Registration;
			$reg->attributes = $form->model->attributes;
			$reg->customerId=Yii::app()->user->id;
			if($reg->date_purchased>time("Now")){
				$frm->addError('dateInvalid','Invalid date!');
			}
			if (empty($reg->errors)){
				($reg->save())?(Yii::app()->user->setFlash('regDevSuccess','Registered device successfully')):'';
			}
		}
		$this->render('regDevice',array ('form'=>$form));
	}
	public function actionsendArray(/*$send*/){
		$this->renderPartial('sendArray'/*, array('send' => $send)*/);
	}
}