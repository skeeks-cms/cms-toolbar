<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */

namespace skeeks\cms\toolbar\panels;

use skeeks\cms\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class WidgetPanel
 * @package skeeks\cms\toolbar\panels
 */
class WidgetPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Widgets management');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@skeeks/cms/toolbar/views/panels/widget', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can('cms/admin-settings');
    }
}
