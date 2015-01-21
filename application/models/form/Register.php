<?php

    namespace application\models\form;

    use \Yii;
    use \CException;
    use \application\components\FormModel;

    class Register extends FormModel
    {

        public $username,$password,$confirmpassword,$firstname,$middlename,$lastname,$ageGroup,$email,$mobile,$other_number,$country,$county,$town,$postcode,$address1,$address2,$optIn;

        public function rules()
        {
            return array(
                // Username and password are required.
                array('email, password, confirmpassword', 'required'),
                // The database has a maximum username length of 64 characters.
                array('username', 'length','min' => 5, 'max' => 64),
                array('password', 'length','min' => 5, 'max' => 64),
                array('firstname', 'length','min' => 3, 'max' => 36),
                array('middlename', 'length','min' => 3, 'max' => 36),
                array('lastname', 'length','min' => 3, 'max' => 36),
                array('ageGroup',  'numerical', 'integerOnly'=>true, 'max' => 11,  ),
                array('email', 'match', 'pattern' => '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){128,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD'),
                array('mobile', 'match', 'pattern' => '/^0[0-9]{9,10}$/'),
                array('other_number', 'match', 'pattern' => '/^0[0-9]{8,25}$/'),
                array('other_number', 'length' , 'max' => 25),
                array('country', 'length', 'max' => 64 ),
                array('county', 'length', 'max' => 64 ),
                array('town', 'length', 'max' => 64 ),
                array('postcode', 'length', 'max' => 10 ),
                array('address1', 'length', 'max' => 64 ),
                array('address2', 'length', 'max' => 64 ),
                array('optIn','boolean')
            );
        }


    }