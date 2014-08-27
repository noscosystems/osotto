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
    use \application\models\form\ChangePass;

	class AccountController extends Controller{

		public function actionRegister(){
			if (Yii::app()->user->isGuest){
            $form = new Form('application.forms.register', new Register);

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
                    $user->title = 1;
                    $user->priv = 10;
                    $user->active = 1;
                    //$user->password = \CPasswordHelper::hashPassword($user->password);
                    $user->middlename=($frm->middlename=='')?(null):($frm->middlename);
                    $user->title = 1;
                    $email = CustomerContactDetails::model()->findAllByAttributes(array('email' => $frm->email));
                    ($email)?
                        ($frm->addError('email','Email already taken by another user'))
                        :($userDetails->email = $frm->email);

                    if ($frm->mobile==''){
                        $userDetails->mobile = null;
                    }
                    else {
                        $mobile = CustomerContactDetails::model()->findAllByAttributes(array('mobile' => $frm->mobile));
                        ($mobile)?
                            ($frm->addError('mobile','Mobile number already taken by another user'))
                            :'';
                    }
                    $userAddress->attributes = $form->model->attributes;

                    if (empty($frm->errors)){
                    	if ($user->save()){
                    		$userDetails->customerId = $userAddress->customerId=$user->id;
                    		$userDetails->save();
                    		$userAddress->save();
                            Yii::app()->user->setFlash('registerSuccess','Registered successfully.');
                    	}
                    }
                }
            }
        }
        else {
            $this->redirect(array('/home'));
        }
			$this->render('register',array('form'=>$form));
		}
        public function actionchangePass(){
            $form = new Form ('application.forms.changePass', new ChangePass);
            $user = Users::model()->findByPk(Yii::app()->user->id);
            if ($user){
                if ($form->submitted() && $form->validate()){
                    $frm = $form->model;
                    if ($user->password($frm->old_pass) && $frm->password == $frm->rep_pass){
                        $user->password = $frm->password;
                        // $user->password = \CPasswordHelper::hashPassword($frm->password);
                        ($user->save())?(Yii::app()->user->setFlash('changePassSuccess','Successfully changed password.')):('');
                    }
                }
            }

            $this->render('changePass',array('form'=> $form));
        }

        public function actionLogout(){
            Yii::app()->user->logout();
            Yii::app()->user->setFlash('account.logout.success', 'Successfully logged out. Hope to see you soon, again.');
            $this->render('logout');
        }
	}
