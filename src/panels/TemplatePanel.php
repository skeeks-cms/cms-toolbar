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
use skeeks\cms\toolbar\CmsToolbarPanel;
use Yii;
use yii\base\ViewEvent;
use yii\helpers\Html;
use yii\web\View;

/**
 * Class TemplatePanel
 * @package skeeks\cms\toolbar\panels
 */
class TemplatePanel extends CmsToolbarPanel
{
    public $_view_files = [];

    public function init()
    {
        parent::init();

        \Yii::$app->view->on(View::EVENT_AFTER_RENDER, function (ViewEvent $e) {
            if (\Yii::$app->controller instanceof BackendController) {
                return false;
            }

            if ($this->toolbar->editViewFiles == Cms::BOOL_Y && $this->toolbar->enabled && $this->isEnabled()) {

                if (strpos($e->viewFile, \Yii::getAlias('@vendor')) !== false) {
                    return;
                }

                $id = "sx-view-render-md5" . md5($e->viewFile);
                if (in_array($id, $this->toolbar->viewFiles)) {
                    return;
                }
                $this->_view_files[] = $e->viewFile;
                $this->toolbar->viewFiles[$id] = $id;

                $e->sender->registerJs(<<<JS
new sx.classes.toolbar.EditViewBlock({'id' : '{$id}'});
JS
                );
//\Yii::$app->view->registerCss(".sx-cms-toolbar-edit-view-block {display: table;}");

                $e->output = Html::tag('div', $e->output,
                    [
                        'class' => 'sx-cms-toolbar-edit-view-block',
                        'id' => $id,
                        'title' => "Двойной клик по блоку откроек окно управлния настройками",
                        'data' =>
                            [
                                'id' => $id,
                                'config-url' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-tools/view-file-edit'])
                                    ->merge([
                                        "root-file" => $e->viewFile
                                    ])
                                    ->enableEmptyLayout()
                                    ->url
                            ]
                    ]);
            }
        });

    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return \Yii::$app->user->can(\skeeks\cms\rbac\CmsManager::PERMISSION_EDIT_VIEW_FILES);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Templates management');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@skeeks/cms/toolbar/views/panels/template', ['panel' => $this]);
    }

    /**
     * @return array
     */
    public function getViewFiles()
    {
        return $this->_view_files;
    }
}
