<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright 2010 SkeekS
 * @date 08.03.2017
 */
return
[
    'bootstrap'     => ['cmsToolbar'],

    'components' =>
    [
        'cmsToolbar' =>
        [
            'class' => 'skeeks\cms\toolbar\CmsToolbar',
        ],

        'i18n' => [
            'translations' =>
            [
                'skeeks/toolbar' => [
                    'class'             => 'yii\i18n\PhpMessageSource',
                    'basePath'          => '@skeeks/cms/toolbar/messages',
                    'fileMap' => [
                        'skeeks/toolbar' => 'main.php',
                    ],
                ]
            ]
        ]
    ]
];