<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */

namespace skeeks\cms\toolbar\panels;

use skeeks\cms\backend\BackendController;
use skeeks\cms\components\Cms;
use skeeks\cms\rbac\CmsManager;
use skeeks\cms\toolbar\CmsToolbarPanel;
use Yii;
use yii\base\Event;
use yii\base\ViewEvent;
use yii\base\Widget;
use yii\base\WidgetEvent;
use yii\helpers\Html;
use yii\web\Application;
use yii\web\View;

/**
 * Class WidgetPanel
 * @package skeeks\cms\toolbar\panels
 */
class WidgetPanel extends CmsToolbarPanel
{
    public function init() {
        parent::init();
        
        \Yii::$app->on(Application::EVENT_BEFORE_REQUEST, function () {
            Event::on(\skeeks\cms\base\Widget::class, Widget::EVENT_BEFORE_RUN, [$this, '_beforeWidgetRun']);
            Event::on(\skeeks\cms\base\Widget::class, Widget::EVENT_AFTER_RUN, [$this, '_afterWidgetRun']);
        });
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
        return \Yii::$app->user->can(CmsManager::PERMISSION_ROLE_ADMIN_ACCESS);
    }
    
    public $widgetsForEdit = [];
    
    static public $widgetBeforeRuns = [];

    public function _beforeWidgetRun(WidgetEvent $event)
    {
        $widget = $event->sender;
        $event->isValid = true;
        $this->toolbar->initEnabled();

        if ($this->toolbar->editWidgets == Cms::BOOL_Y && $this->toolbar->enabled && $widget instanceof \skeeks\cms\base\Widget) {
            $id = 'sx-infoblock-'.$widget->id;

            $this->widgetsForEdit[$widget->id] = $widget;
            
            static::$widgetBeforeRuns[$widget->id] = Html::beginTag('div', [
                'class' => 'skeeks-cms-toolbar-edit-view-block',
                'id'    => $id,
                'title' => \Yii::t('skeeks/cms', "Double-click on the block will open the settings manager"),
                'data'  => [
                    'id'         => $widget->id,
                    'config-url' => $widget->getCallableEditUrl(),
                ],
            ]);
        }
    }

    public function _afterWidgetRun(WidgetEvent $event)
    {
        $widget = $event->sender;
        if ($this->toolbar->editWidgets == Cms::BOOL_Y && $this->toolbar->enabled && $widget instanceof \skeeks\cms\base\Widget) {
            $id = 'sx-infoblock-'.$widget->id;

            $widget->view->registerJs(<<<JS
new sx.classes.toolbar.EditViewBlock({'id' : '{$id}'});
JS
            );
            $callableData = $widget->callableData;

            $callableDataInput = Html::textarea('callableData', base64_encode(serialize($callableData)), [
                'id'    => $widget->callableId,
                'style' => 'display: none;',
            ]);

            $result = isset(static::$widgetBeforeRuns[$widget->id]) ? static::$widgetBeforeRuns[$widget->id] : "";
            $result .= $event->result;
            $result .= $callableDataInput;
            $result .= Html::endTag('div');

            $event->result = $result;
        }
    }
}
