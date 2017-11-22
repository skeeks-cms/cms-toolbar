<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */

namespace skeeks\cms\toolbar\panels;

use skeeks\cms\backend\BackendController;
use skeeks\cms\toolbar\CmsToolbarPanel;
use Yii;
use yii\base\ViewEvent;
use yii\web\View;

/**
 * Class WidgetPanel
 * @package skeeks\cms\toolbar\panels
 */
class WidgetPanel extends CmsToolbarPanel
{
    public function init() {
        parent::init();
    }
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
