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
    use \application\models\form\ForgottenPassword;
    use \application\models\form\SetNewPassword;

	class AccountController extends Controller{

        protected $identity;

        public function actionForgottenPasswordRestore($param1,$param2){

            (Yii::app()->user->isGuest)
            ?($form = New Form('application.forms.setNewPassword', new SetNewPassword))
            :( $this->redirect ( array ('/home') ) );

            if ( $form->submitted() && $form->validate() ){
                
                $user = Users::model()->findByAttributes(array('password' => $param1, 'username' => $param2));
                $frm = $form->model;

                if ($user->password == $param1 && $frm->password == $frm->rep_pass){

                    $user->password = $frm->password;

                    if ($user->save())
                        Yii::app()->user->setFlash('pass', 'New password set successfully.');
                }
            }
            $this->render('forgottenPasswordRestore', array ('form' => $form) );
        }


        public function actionForgottenPassword(){

                (Yii::app()->user->isGuest)
                ?($form = New Form('application.forms.forgottenPassword', new ForgottenPassword))
                :($this->redirect(array('/home')));

                $frm = $form->model;

                if ($form->submitted() && $form->validate()){

                    $user = Users::model()->findByAttributes( array ('username' => $frm->username));
                    $userDetails = $user->contactDetails;

                    if ((bool)($userDetails->email)!=false){

                        $user->password = md5(time());
                        $Name = "Admin_Is_MyName"; //senders name
                        $email = "noreply@osotto.co.uk"; //senders e-mail adress
                        $recipient = $userDetails->email; //recipient
                        $mail_body = "Password reset for www.osotto.co.uk. \n Follow this link and fill in the required fields: \n 
                        http://osotto.co.uk/account/forgottenPasswordRestore?param1=".$user->password."&param2=".$user->username; //mail body
                        $subject = "Password reset."; //subject
                        $head = 'From:'.$email;

                        $mailToBeSent = mail($recipient, $subject, $mail_body,$head);
                        if ($user->save()){
                            if ($mailToBeSent)
                                Yii::app()->user->setFlash('Sent', 'A code has been sent to you to restore your password.');
                            else
                                Yii::app()->user->setFlash('Try again','Try again.');
                        }
                    }
                }

            $this->render ('forgottenPassword', array ('form' => $form ));
        }

		public function actionRegister(){

			if (Yii::app()->user->isGuest){
                $form = new Form('application.forms.register', new Register);
                $frm = $form->model;
                $frm->country = 'UK';

                if($form->submitted() && $form->validate()) {

                    $user = Users::model()->findAllByAttributes(array('username' => $frm->username));

                    if($user)
                        $frm->addError('username', 'The username specified is already taken! Please choose another.');
                    else {
                        $user = new Users;
                        $userDetails = new CustomerContactDetails;
                        $userAddress = new CustomerAddress;
                        $user->attributes = $frm->attributes;
                        $user->title = 1;
                        $user->priv = 10;
                        // $user->active = 1;
                        $user->created = time();
                        //$user->password = \CPasswordHelper::hashPassword($user->password);
                        $user->middlename=($frm->middlename=='')?(null):($frm->middlename);
                        $user->title = 1;
                        $userDetails->attributes = $frm->attributes;
                        $user->firstname = "n/a";
                        $user->lastname = "n/a";
                        $user->ageGroup = 1;
                        $user->username = "n/a";
                        $user->email = $frm->email;

                        $emailExists = Users::model()->findAllByAttributes(array('email' => $frm->email));

                        if ($emailExists)
                            $frm->addError('email','Email already taken by another user');

                        $userAddress->attributes = $form->model->attributes;
                        
                        if (empty($frm->errors)){
                            if (!$user->save()) {
                                var_dump($user->errors); 
                                exit; 
                            }
                            Yii::app()->user->setFlash('success', 'You have registered successfully.');
                            $form = null;
                            $form = new Form('application.forms.register', new Register);
                        }
                    }
                }
            }
            else 
                $this->redirect(array('/home'));

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
