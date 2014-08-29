<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class AddProduct extends FormModel
    {

        public $name,$catId,$model_number,$short_desc,$long_desc,$spec_brief;

        public function rules()
        {
            return array(
				array('model_number, name, catId', 'required'),
                array('name', 'length', 'max'=>64),
                array('catId', 'numerical', 'integerOnly'=>true),
				array('model_number', 'length', 'max'=>20),
				array('short_desc, spec_brief', 'length', 'max'=>128),
				array('long_desc', 'safe')
			);
        }


    }

