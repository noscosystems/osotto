<?php
	return array(
        // 'title' => Yii::t('application', 'Please provide your login credentials.'),

        'elements' => array(
            'id' => array(
                'type' => 'hidden',
                'maxlength' => 11
            ),
		),

        'buttons' => array(
            'submit' => array(
                'type' => 'submit',
                'label' => Yii::t('application', 'Upload'),
            ),
        ),
    );