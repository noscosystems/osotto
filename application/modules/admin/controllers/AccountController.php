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

            $frm = $form->model;

            $user = Users::model()->findByAttributes( array('id' => $id) );
            $address = $user->address;
            $details = $user->contactDetails;
            $frm->attributes = $user->attributes;
            $frm->password = null;
            $frm->attributes = $address->attributes;
            $frm->attributes = $details->attributes;
/******************************************************************************************************            
            echo '<pre>';
            var_dump ($address);
            echo '</pre>';
            echo '<pre>';
            var_dump ($details);
            echo '</pre>';
            exit;
******************************************************************************************************/
            if ($form->submitted() && $form->validate()){

                $flash = Yii::app()->user;
                

                if ($flash->priv > $user->priv){

                    if ($frm->password!='' && $frm->password == $frm->repPass){
                        var_dump($user->password);
                        exit;
                    }
                    if ($frm->priv!='')
                        $user->priv = $frm->priv;
                    // foreach ($address->attrbiutes as $k => $attribute){
                    //     var_dump($k);
                    //     var_dump($attribute);
                    // }
                    // exit;    
                    $address->attributes = $frm->attributes;
                    $details->attributes = $frm->attributes;

                    if (empty($frm->errors)){
                        if ($address->save() && $details->save() && $user->save())
                            $flash->setFlash('update','User account updated successfully.');
                        else
                            $flash->setFlash('fail','Failed updating user account, please reload the page and try again.');
                    }
                }
                else {
                    $flash->setFlash('privLevelLow','You do not have the required privilige level to edit this user\'s account.');
                }
            }
            $this->render('EditUser', array( 'form' => $form ));
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