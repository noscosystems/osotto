<?php

	namespace application\controllers;

	use \Yii;
    use \CException as Exception;
	use \application\components\Form;
	use \application\components\Controller;
	use \application\components\UserIdentity;
	use \application\models\db\Users;
	use \application\models\db\CustomerContactDetails;
	use \application\models\db\CustomerAddress;
	use \application\models\form\Register;


	class AccountController extends Controller{

		function actionRegister(){
			if (Yii::app()->user->isGuest){
            $form = new Form('application.forms.register', new Register);
            if ($form->validate()){
            	echo 'Validated!';
            }
            if($form->submitted() && $form->validate()) {
                $frm = $form->model;
                $user = Users::model()->findAllByAttributes(array('username' => $frm->username));
                if($user){
                    $frm->addError('username', 'The username specified is already taken! Please choose another.');
                } else {
                    $user = new Users;
                    $userDetails = new CustomerContactDetails;
                    $userAddress = new CustomerAddress;
                    $user->attributes = $frm->attributes;
                    $email = CustomerContactDetails::model()->findAllByAttributes(array('email' => $frm->email));
                    $mobile = CustomerContactDetails::model()->findAllByAttributes(array('mobile' => $frm->mobile));
                    var_dump ($email);
                    var_dump ($mobile);
                    // $other = Users::model()->findAllByAttributes(array('other_number' => $frm->other_number));
                    ($email)?
                    	($frm->addError('email','Email already taken by another user'))
                    	:($userDetails->email = $frm->email);
                    ($mobile)?
                    	($frm->addError('mobile','Mobile number already taken by another user'))
                    	:($userDetails->mobile = $frm->mobile);
                    // $userDetails->attributes = $form->model->attributes;
                    //$userAddress->attributes = $form->model->attributes;
                    //($user->save())?($userDetails->customerId = $user->id,$userAddress->customerId = $user->id,$userDetails->save())?:'';
                    // (empty($user->errors) && empty($userDetails->errors) && empty($userAddress->errors))?
                    // 	(($user->save())?
                    // 		($userDetails->customerId=$userAddress->customerId=$user->id,$userDetails->save(),$userAddress->save()):''):'';
                    	var_dump( $userAddress->errors );
                    if (empty($user->errors) && empty($userDetails->errors) && empty($userAddress->errors)){
                    	if ($user->save()){
                    		$userDetails->customerId=$userAddress->customerId=$user->id;
                    		$userDetails->save();
                    		$userAddress->save();
                    	}
                    }
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
