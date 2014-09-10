<?php

    use \application\models\db\Option;

    $options = Option::model()->findAllByAttributes(array ('column' => 'ageGroup'));

    foreach ($options as $option)
        $ageGroup[$option->id] = $option->name;

    return array(
        'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'username' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please enter your username; it is case-insensitive.'),
            ),
            'password' => array(
                'type' => 'password',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please enter your password; it is case-sensitive.'),
            ),
            'firstname' => array(
                'type' => 'text',
                'maxlength' => 36,
                'hint' => Yii::t('application', 'Please enter your firstname; it is case-insensitive.'),
            ),
            'middlename' => array(
                'type' => 'text',
                'maxlength' => 36,
                'hint' => Yii::t('application', 'Please enter your middlename; it is case-insensitive.'),
            ),
            'lastname' => array(
                'type' => 'text',
                'maxlength' => 36,
                'hint' => Yii::t('application', 'Please enter your lastname; it is case-insensitive.'),
            ),
            'ageGroup' => array(
                'type' => 'dropdownlist',
                'items' => $ageGroup,
                'prompt' => 'Please Select'
                // 'hint' => Yii::t('application', 'Please enter your password; it is case-sensitive.'),
            ),
            'email' => array(
                'type' => 'text',
                'maxlength' => 128,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'mobile' => array(
                'type' => 'text',
                'maxlength' => 20,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'other_number' => array(
                'type' => 'text',
                'maxlength' => 25,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'country' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'county' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'town' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'postcode' => array(
                'type' => 'text',
                'maxlength' => 10,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'address1' => array(
                'type' => 'text',
                'maxlength' => 255,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'address2' => array(
                'type' => 'text',
                'maxlength' => 255,
                'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            ),
            'optIn' => array(
                'type' => 'checkbox'
                // 'hint' => Yii::t('application', 'Please enter your date of birth; it is case-sensitive.'),
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Register'),
            ),
        ),
    );