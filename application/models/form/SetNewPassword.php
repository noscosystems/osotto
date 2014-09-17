<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class SetNewPassword extends FormModel
    {

        public $password,$rep_pass;

        public function rules()
        {
            return array(
                array('password, rep_pass', 'required'),
                array('password, rep_pass', 'length','min' => 5, 'max' => 64)
            );
        }
    }