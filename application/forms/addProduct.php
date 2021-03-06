<?php
    
    use \application\models\db\ProductCategories;

    $categories = ProductCategories::model()->findAll();
    $productCategories = [];
    $rating = [];

    foreach ($categories as $cat)
        $productCategories[$cat->id] = $cat->name;



    for ($i=1; $i<10; $i++)
        $rating[$i] = $i;

    return array(
        // 'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'name' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please fill in your device\'s model number.'),
            ),
            'catId' => array(
                'type' => 'dropdownlist',
                'items' => $productCategories,
                'prompt' => 'Please Select'
            ),
            'featured' => array(
                'type' => 'dropdownlist',
                'items' => array(1 => 'Featured', 0 => 'Not Featured' ),
                'prompt' => 'Please Select'
            ),
            'model_number' => array(
                'type' => 'text',
                'maxlength' => 255,
                'hint' => Yii::t('application', 'Please fill in your device\'s model number.'),
            ),
            'short_desc' => array(
                'type' => 'text',
                'maxlength' => 128,
                'hint' => Yii::t('application', 'Please enter your password; it is case-sensitive.'),
            ),
            'long_desc' => array(
                'type' => 'textarea',
                'maxlength' => 65535,
                'hint' => Yii::t('application', 'Please enter a description for your device'),
            ),
            'spec_brief' => array(
                'type' => 'text',
                'maxlength' => 128,
                'hint' => Yii::t('application', 'Please enter brief (not more than 128 symbols) spec of your device.'),
            )
            
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Add'),
            ),
        ),
    );