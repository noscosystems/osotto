<?php
    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class AddProductType extends FormModel
    {

        public $name;

        public function rules()
        {
        	return array(
                array('name', 'required'),
                array('name', 'length', 'max'=>128)
            );
        }
    }