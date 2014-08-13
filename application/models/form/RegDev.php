<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class RegDev extends FormModel
    {

        public $serial_number,$productId,$MAC,$purchased_from,$date_purchased,$type ;

        public function rules()
        {
            return array(
                array('productId, serial_number, type', 'required'),
                array('productId', 'numerical', 'integerOnly'=>true),
                array('serial_number', 'length', 'max'=>50),
                array('MAC', 'length', 'max'=>12),
                array('purchased_from', 'length', 'max'=>45),
                array('date_purchased', 'date', 'format' => 'MM/dd/yyyy', 'timestampAttribute' => 'date_purchased')
            );
        }
    }