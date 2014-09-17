<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class ChangePass extends FormModel
    {

        public $old_pass,$password,$rep_pass;

        public function rules()
        {
            return array(
                array('old_pass, password, rep_pass', 'required'),
                array('old_pass, password, rep_pass', 'length','min' => 5, 'max' => 64)
            );
        }
    }