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
			$registration = New Registration;
		}
		$this->render('regDevice',array ('form'=>$form));
	}
	public function actionsendArray($send){
		$this->renderPartial('sendArray', array('send' => $send));
	}
}