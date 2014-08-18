<?php

    return array(
        // 'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'msgText' => array(
                'type' => 'text',
                'maxlength' => 300
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
        ),
    );