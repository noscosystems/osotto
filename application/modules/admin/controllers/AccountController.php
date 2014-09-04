<?php

	use \Yii;
    use \CException as Exception;
    use \application\components\Form;
    use \application\components\Controller;
    use \application\components\UserIdentity;
	use \application\models\db\Users;
	use \application\models\form\ListUsers;
    use \application\models\form\EditUser;

	class AccountController extends Controller{


        public function actionEditUser($id){

            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = New Form('application.forms.editUser', New EditUser);
            else
                $this->redirect(array('/home'));

            $user = Users::model()->findByAttributes(array('id' => $id));
            $address = $user->address;
            $details = $user->contactDetails;

            if ($form->submitted() && $form->validate()){
                $frm = $form->model;
                $user->attributes = $frm->attributes;
                $address->attributes = $frm->attributes;
                $details->attributes = $frm->attributes;
            }
            $this->render('EditUser', array('form' => $form, 'user' => $user, 'address' => $address, 'details' => $details));
        }
		public function actionlistUsers(){

            if(Yii::app()->user->isGuest)
                $this->redirect(array('/login'));
            else if (Yii::app()->user->priv >=50)
                $form = New Form('application.forms.listusers', New ListUsers);
            else
                $this->redirect(array('/home'));
            
            $criteria = new \CDbCriteria;
            $count = Users::model()->count($criteria);
            $pages = new \CPagination( $count );
            $pages->pageSize = 10;
            $pages->applyLimit($criteria);
            $users = Users::model()->findAll($criteria);

            if ($form->submitted() && $form->validate()){
                $foundUser = Users::model()->findByAttributes(array('username' => $form->model->search));
                $this->redirect (array('/admin/account/EditUser', 'id' => $foundUser->id));
            }
            $this->render('listusers', array('form'=>$form,
                                         'pages' => $pages,
                                         'users' => $users
                                         )
            );
        }

        public function actionDeleteUser(){
            if(Yii::app()->user->isGuest){
                $this->redirect(array('/login'));
            }
            else if (Yii::app()->user->priv >=50){

                if (isset($_POST['id']) && !empty($_POST['id'])) {
                    $user = Users::model()->findByPk($_POST['id']);
                    if (Yii::app()->user->priv > $user->priv){
                        if ($_POST['butt_value'] == 'Inactive'){
                            $user->active =0;
                            echo 'Active';
                        }
                        else {
                            $user->active = 1;
                            echo 'Inactive';
                        }
                        $user->save();
                    }
                    else
                        echo 'You do not have the required privilige level for this command.';
                }
            }
            else {
                $this->redirect(array('/home'));
            }
        }

    }