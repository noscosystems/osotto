<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class FileUplForm extends FormModel
    {

        public $id;

        public function rules()
        {
            return array(
				array('id', 'required'),
                array('id', 'numerical', 'integerOnly'=>true)
				
			);
        }


    }

