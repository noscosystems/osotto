<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class ImgForm extends FormModel
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

