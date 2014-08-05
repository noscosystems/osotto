<?php

	namespace application\controllers;

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;
	use \application\models\db\Users;
	use \application\models\db\CustomerContactDetails;
	use \application\models\form\Register;


	class AccountController extends Controller{

		function actionRegister(){
			if (Yii::app()->user->isGuest){
            $form = new Form('application.forms.register', new Register);

            if($form->submitted() && $form->validate()) {
                $user = Users::model()->findAllByAttributes(array('username' => $form->model->username));
                if($user){
                    $form->model->addError('username', 'The username specified is already taken! Please choose another.');
                } else {
                    $user = new Users;

                    $user->attributes = $form->model->attributes;
                    $user_details = new CustomerContactDetails;
                    echo '<pre>';
                    var_dump ( $user );
                    echo '</pre>';
      //               $sql = 'SELECT *
						// 	    FROM `users`
						// 	    WHERE `id`!=:id AND `email`=:email';
						// $sql1 = 'SELECT *
						// 	    FROM `users`
						// 	    WHERE `id`!=:id AND `mobile`=:mobile';
						// $users = Users::model()->findAllBySql($sql,
						// 	array(
						// 		':id' => (int)Yii::app()->user->id,
						// 		':email' => (string)$form->model->email
						// 		/*':mobile_number' => ($form->model->mobile_number)*/
						// 		)
						// 	);
					//$user->email = (empty($form->model->email))?(null):(($user->email === $form->model->email)?($user->email):'');
					//$user->mobile_number = (empty($form->model->mobile_number))?(null):(($user->mobile_number === $form->model->mobile_number)?($user->mobile_number):'');
						// $users = Users::model()->findAllByAttributes(array('mobile_number' => $form->model->mobile_number));
						// if ($users){
						// 	$form->model->addError('email','This Email is already taken.');
						// }
						// if ($users = Users::model()->findAllBySql($sql1, array(
						// 		':id' => (int)Yii::app()->user->id,
						// 		':mobile_number' => (string)$form->model->mobile_number
						// 		))) {
						// 	$form->model->addError('mobile_number','Mobile number already taken by another user.');
						// }
      //               $user->password = \CPasswordHelper::hashPassword($user->password);
      //               $user->created = time();                    // Finally, save.
                    // (empty($form->model->errors))?($user->save()?(Yii::app()->user->setFlash('success','Registered successfully.')):''):'';
                }
            }
        }
        else {
            $this->redirect(array('/home'));
        }
			$this->render('register',array('form'=>$form));
		}
	}
