<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class ListUsers extends FormModel{
        
        public $search;

        public function rules(){
            return array(
                array('search', 'required'),
                array('search', 'length', 'max' => 64),
            );
        }
    }