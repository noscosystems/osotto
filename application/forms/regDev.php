<?php

    use \application\models\db\ProductCategories;

    $options = ProductCategories::model()->findAll();
    $categories =[];
    
    foreach ($options as $option)
        $categories[$option->id] = $option->name;

    return array(
        'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'type' => array(
                'type' => 'dropdownlist',
                'items' => $categories,
                'prompt' => 'Please Select'
            ),
            'productId' =>array(
            	'type' => 'dropdownlist',
                /*'items' => array('' => ''),*/
            	'prompt' => 'Please Select'
            ),
            'serial_number' => array(
                'type' => 'text',
                'maxlength' => 50
            ),
            'MAC' => array(
                'type' => 'text',
                'maxlength' => 12
            ),
            'date_purchased' => array(
            	'type' => 'text'
            ),
            'purchased_from' => array(
            	'type' => 'text',
            	'maxlength' => 45
            ),
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Register'),
            ),
        ),
    );