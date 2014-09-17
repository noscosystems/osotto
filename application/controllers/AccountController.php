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

                $user = Users::model()->findByAttributes(array('password' => $param1, 'username' => $param2));
                echo '<pre>';
                var_dump($param1);
                echo '</pre>';
                echo '<br><pre>';
                var_dump($param2);
                echo '</pre>';

            if ( $form->submitted() && $form->validate() ){
                
                echo '<pre>';
                var_dump($user);
                echo '</pre>';
                exit;

                $frm = $form->model;

                if ($user->password == $param1 && $frm->password == $frm->rep_pass){

                    $user->password = $frm->password;
                    $user->save();
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

                        $tmpPass = $user->setPassword(md5(time()));
                        $Name = "Admin_Is_MyName"; //senders name
                        $email = "noreply@osotto.co.uk"; //senders e-mail adress
                        $recipient = $userDetails->email; //recipient
                        $mail_body = "Password reset for www.osotto.co.uk. \n Follow this link and fill in the required fields: \n 
                        http://osotto.co.uk/account/forgottenPasswordRestore?param1=".$tmpPass."&param2=".$user->username; //mail body
                        $subject = "Password reset."; //subject
                        $head = 'From:'.$email;

                        $mailToBeSent = mail($recipient, $subject, $mail_body,$head);
                        if ($mailToBeSent)
                            Yii::app()->user->setFlash('Sent', 'A code has been sent to you to restore your password.');
                        else
                            Yii::app()->user->setFlash('Try again','Try again.');
                    }
                    $user->password = $tmpPass;
                    $user->save();
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

                        $emailExists = CustomerContactDetails::model()->findAllByAttributes(array('email' => $frm->email));

                        if ($emailExists)
                            $frm->addError('email','Email already taken by another user');

                        $mobileExists = CustomerContactDetails::model()->findAllByAttributes(array('mobile' => $userDetails->mobile));

                        if ($mobileExists)
                            $frm->addError('mobile','Mobile number already taken by another user');

                        $userAddress->attributes = $form->model->attributes;
                        
                        if (empty($frm->errors)){
                        	if ($user->save()){
                        		$userDetails->customerId = $userAddress->customerId=$user->id;
                        		$userDetails->save();
                        		$userAddress->save();

                                $this->identity = new UserIdentity($form->model->username, $form->model->password);

                                if($this->identity->authenticate()){
                                    Yii::app()->user->login($this->identity);
                                    Yii::app()->user->setFlash('registerSuccess','Registered successfully.');
                                    $this->redirect(array('device/regDevice'));
                                }
                        	}
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
