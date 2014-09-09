<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class EditProduct extends FormModel
    {

        public $active,$featured,$catId,$name,$model_number,$spec_brief,$spec_full,$short_desc,$long_desc;

        public function rules()
        {
            return array(
            	array('model_number, name, catId, featured, active', 'required'),
				array('catId', 'numerical', 'integerOnly'=>true),
				array('active, featured', 'boolean'),
				array('model_number', 'length', 'max'=>255),
				array('short_desc, spec_brief', 'length', 'max'=>128),
				array('name', 'length', 'max'=>64),
				array('long_desc, spec_full', 'safe'),
            );
        }
    }