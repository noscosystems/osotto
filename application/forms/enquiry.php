<?php

    return array(
        // 'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'emailFrom' => array(
                'type' => 'text',
                'maxlength' => '128'
            ),
            'phNumber' => array(
                'type' => 'text',
                'maxlength' => '11'
            ),
            'msgText' => array(
                'type' => 'textarea',
                'maxlength' => 300,
                'hint' => 'Maximum 300 symbols'
            ),
            'subject' => array(
                'type' => 'text',
                'maxlength' => 50
            )
        ),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Send question') 
            ),
            'reset' => array(
                'type' => 'reset',
                'label' => Yii::t('application', 'Reset Form') 
            ),
        ),
    );