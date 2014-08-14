<?php
    
    use \application\models\db\Option;

    $optType = Option::model()->findAllByAttributes(array('column' => 'type'));
    $types = [];

    foreach ($optType as $opt)
        $types[$opt->id] = $opt->name;

    return array(
        // 'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'name' => array(
                'type' => 'text',
                'maxlength' => 64,
                'hint' => Yii::t('application', 'Please fill in your device\'s model number.'),
            ),
            'type' => array(
                'type' => 'dropdownlist',
                'items' => $types,
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
                'type' => 'text',
                'maxlength' => 65535,
                'hint' => Yii::t('application', 'Please enter a description for your device'),
            ),
            'spec_brief' => array(
                'type' => 'text',
                'maxlength' => 36,
                'hint' => Yii::t('application', 'Please enter brief spec of your device.'),
            ),
            'spec_full' => array(
                'type' => 'text',
                'maxlength' => 65535,
                'hint' => Yii::t('application', 'Please enter specs of your device or give a link to a page.'),
            ),
            
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Add'),
            ),
        ),
    );