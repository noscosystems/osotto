<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class RegDev extends FormModel
    {

        public $serial_number,$productId,$MAC,$purchased_from,$date_purchased ;

        public function rules()
        {
            return array(
                array('productId, serial_number', 'required'),
                array('productId', 'numerical', 'integerOnly'=>true),
                array('serial_number', 'length', 'max'=>50),
                array('MAC', 'length', 'max'=>12),
                array('purchased_from', 'length', 'max'=>45),
                array('date_purchased', 'safe', 'length', 'max'=>11)
            );
        }
    }