<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class AddProduct extends FormModel
    {

        public $name,$model_number,$short_desc,$long_desc,$spec_brief,$spec_full;

        public function rules()
        {
            return array(
				array('model_number', 'required'),
                array('name', 'length', 'max'=>64),
				array('model_number', 'length', 'max'=>255),
				array('short_desc, spec_brief', 'length', 'max'=>128),
				array('long_desc, spec_full', 'safe')
			);
        }


    }

