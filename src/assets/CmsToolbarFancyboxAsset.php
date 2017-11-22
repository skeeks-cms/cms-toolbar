<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.03.2015
 */

namespace skeeks\cms\toolbar\assets;

/**
 * Class CmsToolbarFancyboxAsset
 * @package skeeks\cms\toolbar\assets
 */
class CmsToolbarFancyboxAsset extends CmsToolbarAsset
{
    public $css = [];

    public $js =
        [
            'classes/window-fancybox.js',
        ];

    public $depends = [
        'skeeks\cms\assets\FancyboxAssets',
        'skeeks\cms\toolbar\assets\CmsToolbarAsset',
    ];
}
