SkeekS CMS toolbar
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-toolbar "*"
```

or add

```
"skeeks/cms-toolbar": "*"
```

Configuration app
----------


```php
[
    'bootstrap'     => ['cmsToolbar'],

    'components' =>
    [
        'cmsToolbar' =>
        [
            'class' => 'skeeks\cms\toolbar\CmsToolbar',
            'panels' => [],
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
```

Links
-----
* [Web site (rus)](https://cms.skeeks.com)
* [Author](https://skeeks.com)
* [ChangeLog](https://github.com/skeeks-cms/cms-toolbar/blob/master/CHANGELOG.md)

___

> [![skeeks!](https://skeeks.com/img/logo/logo-no-title-80px.png)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


