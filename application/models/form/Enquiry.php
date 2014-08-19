<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class Enquiry extends FormModel
    {

        public $msgText,$subject;

        public function rules()
        {
            return array(
				array('msgText, to', 'required'),
                array('msgText', 'length', 'max'=>300),
                array('subject', 'length', 'max'=>50)
			);
        }


    }