<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 14.11.2017
 */

namespace skeeks\cms\toolbar;
use yii\base\Component;

/**
 * Class CmsToolbarPanel
 * @package skeeks\cms\toolbar
 */
class CmsToolbarPanel extends Component
{
    /**
     * @var string panel unique identifier.
     * It is set automatically by the container module.
     */
    public $id;


    /**
     * @return string name of the panel
     */
    public function getName()
    {
        return '';
    }

    /**
     * @return string content that is displayed at debug toolbar
     */
    public function getSummary()
    {
        return '';
    }

    /**
     * @return string content that is displayed in debugger detail view
     */
    public function getDetail()
    {
        return '';
    }

    /**
     * Is the panel enabled?
     * @return bool
     * @since 2.0.10
     */
    public function isEnabled()
    {
        return true;
    }
}