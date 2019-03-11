<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 19.03.2015
 */

namespace skeeks\cms\toolbar;

use skeeks\cms\actions\ViewModelAction;
use skeeks\cms\backend\BackendComponent;
use skeeks\cms\backend\BackendController;
use skeeks\cms\components\Cms;
use skeeks\cms\helpers\UrlHelper;
use skeeks\cms\models\helpers\Tree;
use skeeks\cms\rbac\CmsManager;
use skeeks\cms\toolbar\assets\CmsToolbarAsset;
use skeeks\cms\toolbar\assets\CmsToolbarAssets;
use skeeks\cms\toolbar\assets\CmsToolbarFancyboxAsset;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Event;
use yii\base\Widget;
use yii\base\WidgetEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Application;
use yii\web\View;
use yii\widgets\ActiveForm;

/**
 * Class CmsToolbar
 * @package skeeks\cms\toolbar
 */
class CmsToolbar extends \skeeks\cms\base\Component implements BootstrapInterface
{
    /**
     * @var array the list of IPs that are allowed to access this module.
     * Each array element represents a single IP filter which can be either an IP address
     * or an address with wildcard (e.g. 192.168.0.*) to represent a network segment.
     * The default value is `['127.0.0.1', '::1']`, which means the module can only be accessed
     * by localhost.
     */
    public $allowedIPs = ['*'];
    public $infoblocks = [];
    public $editWidgets = Cms::BOOL_N;
    public $editViewFiles = Cms::BOOL_N;
    public $isOpen = Cms::BOOL_N;
    public $enabled = 1;
    public $enableFancyboxWindow = 0;
    public $infoblockEditBorderColor = "red";
    /**
     * @var array|CmsToolbarPanel[]
     */
    public $panels = [];
    public $viewFiles = [];
    public $inited = false;
    /**
     * @deprecated
     * @var string
     */
    public $editUrl = "";

    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => \Yii::t('skeeks/toolbar', 'Quick control panel'),
        ]);
    }

    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['editWidgets', 'editViewFiles', 'infoblockEditBorderColor', 'isOpen'], 'string'],
            [['enabled', 'enableFancyboxWindow'], 'integer'],
        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'enabled'                  => 'Активность панели управления',
            'editWidgets'              => 'Редактирование виджетов',
            'editViewFiles'            => 'Редактирование шаблонов',
            'isOpen'                   => 'Открыта',
            'enableFancyboxWindow'     => 'Включить диалоговые онка панели (Fancybox)',
            'infoblockEditBorderColor' => 'Цвет рамки вокруг инфоблока',
        ]);
    }

    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'enabled'                  => 'Этот параметр отключает/включает панель для всех пользователей сайта, независимо от их прав и возможностей',
            'isOpen'                   => 'По умолчанию панель будет открыта или закрыта',
            'enableFancyboxWindow'     => 'Диалоговые окна в сайтовой части будут более красивые, однако это может портить верстку (но это происходит крайне редко)',
            'infoblockEditBorderColor' => 'Цвет рамки вокруг инфоблоков в режиме редактирования',
        ]);
    }

    public function renderConfigForm(ActiveForm $form)
    {
        echo $form->fieldSet(\Yii::t('skeeks/cms', 'Main'));

        echo $form->field($this, 'enabled')->checkbox();
        echo $form->fieldCheckboxBoolean($this, 'isOpen');
        echo $form->field($this, 'enableFancyboxWindow')->widget(
            \skeeks\widget\chosen\Chosen::className(),
            [
                'items' => \Yii::$app->formatter->booleanFormat,
            ]
        );

        echo $form->fieldRadioListBoolean($this, 'editWidgets');
        echo $form->fieldRadioListBoolean($this, 'editViewFiles');

        echo $form->field($this, 'infoblockEditBorderColor')->widget(
            \skeeks\cms\widgets\ColorInput::className()
        );

        echo $form->fieldSetEnd();

        echo $form->fieldSet(\Yii::t('skeeks/cms', 'Access'));

        echo \skeeks\cms\rbac\widgets\adminPermissionForRoles\AdminPermissionForRolesWidget::widget([
            'permissionName' => \skeeks\cms\rbac\CmsManager::PERMISSION_CONTROLL_PANEL,
            'label'          => 'Доступ к панеле разрешен',
        ]);

        echo $form->fieldSetEnd();
    }

    public function init()
    {
        parent::init();

        if (Yii::$app instanceof \yii\web\Application) {
            $this->initPanels();
        }
    }

    /**
     * Initializes panels.
     */
    protected function initPanels()
    {
        // merge custom panels and core panels so that they are ordered mainly by custom panels
        if (empty($this->panels)) {
            $this->panels = $this->corePanels();
        } else {
            $corePanels = $this->corePanels();
            foreach ($corePanels as $id => $config) {
                if (isset($this->panels[$id])) {
                    unset($corePanels[$id]);
                }
            }
            $this->panels = array_filter(array_merge($corePanels, $this->panels));
        }

        foreach ($this->panels as $id => $config) {
            if (is_string($config)) {
                $config = ['class' => $config];
            }
            $config['id'] = $id;
            $this->panels[$id] = Yii::createObject($config);
            if (!$this->panels[$id] instanceof CmsToolbarPanel
                //&& !$this->panels[$id]->isEnabled()
            ) {
                unset($this->panels[$id]);
            }
        }
    }

    /**
     * @return array default set of panels
     */
    protected function corePanels()
    {
        return [
            'config'         => ['class' => 'skeeks\cms\toolbar\panels\ConfigPanel'],
            'admin'          => ['class' => 'skeeks\cms\toolbar\panels\AdminPanel'],
            'admin-settings' => ['class' => 'skeeks\cms\toolbar\panels\AdminSettingsPanel'],
            'cache'          => ['class' => 'skeeks\cms\toolbar\panels\CachePanel'],
            'user'           => ['class' => 'skeeks\cms\toolbar\panels\UserPanel'],
            'widget'         => ['class' => 'skeeks\cms\toolbar\panels\WidgetPanel'],
            'template'       => ['class' => 'skeeks\cms\toolbar\panels\TemplatePanel'],
            'edit-url'       => ['class' => 'skeeks\cms\toolbar\panels\EditUrlPanel'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // delay attaching event handler to the view component after it is fully configured
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {

            Event::on(\skeeks\cms\base\Widget::class, Widget::EVENT_BEFORE_RUN, [$this, '_beforeWidgetRun']);
            Event::on(\skeeks\cms\base\Widget::class, Widget::EVENT_AFTER_RUN, [$this, '_afterWidgetRun']);

            $app->getView()->on(View::EVENT_END_BODY, [$this, 'renderToolbar']);
        });
    }

    /**
     * Renders mini-toolbar at the end of page body.
     *
     * @param \yii\base\Event $event
     */
    public function renderToolbar($event)
    {
        $this->initEnabled();

        if (!$this->enabled) {
            return;
        }

        $clientOptions = [
            'infoblockSettings'                => [
                'border' =>
                    [
                        'color' => $this->infoblockEditBorderColor,
                    ],
            ],
            'container-id'                     => 'sx-cms-toolbar',
            'container-min-id'                 => 'sx-cms-toolbar-min',
            'isOpen'                           => (bool)($this->isOpen == Cms::BOOL_Y),
            'backend-url-triggerEditWidgets'   => UrlHelper::construct('cms/toolbar/trigger-edit-widgets')->enableAdmin()->toString(),
            'backend-url-triggerEditViewFiles' => UrlHelper::construct('cms/toolbar/trigger-edit-view-files')->enableAdmin()->toString(),
            'backend-url-triggerIsOpen'        => UrlHelper::construct('cms/toolbar/trigger-is-open')->enableAdmin()->toString(),
        ];

        //echo '<div id="sx-cms-toolbar" style="display:none"></div>';

        /* @var $view View */
        $view = $event->sender;
        CmsToolbarAsset::register($view);

        if ($this->enableFancyboxWindow) {
            CmsToolbarFancyboxAsset::register($view);
        }

        echo $view->render('@skeeks/cms/toolbar/views/cms-toolbar', [
            'panels'        => $this->panels,
            'clientOptions' => $clientOptions,
        ]);
    }

    /**
     * Установка проверок один раз.
     * Эти проверки могут быть запущены при отрисовке первого виджета.
     */
    public function initEnabled()
    {
        if ($this->inited) {
            return;
        }

        if (!$this->enabled) {
            return;
        }

        if (\Yii::$app->user->isGuest) {
            $this->enabled = false;
            return;
        }

        if (!$this->checkAccess() || Yii::$app->getRequest()->getIsAjax()) {
            $this->enabled = false;
            return;
        }
    }

    /**
     * Checks if current user is allowed to access the module
     * @return boolean if access is granted
     */
    protected function checkAccess()
    {
        //\Yii::$app->user->can(CmsManager::PERMISSION_ADMIN_ACCESS) version > 2.0.13
        if (\Yii::$app->user->can(CmsManager::PERMISSION_CONTROLL_PANEL)) {
            if (!BackendComponent::getCurrent() && (!\Yii::$app->controller instanceof BackendController) && !in_array(\Yii::$app->controller->module->id,
                    ['debug', 'gii'])) {
                return true;
            }
        }
        /*$ip = Yii::$app->getRequest()->getUserIP();

        foreach ($this->allowedIPs as $filter) {
            if ($filter === '*' || $filter === $ip || (($pos = strpos($filter, '*')) !== false && !strncmp($ip, $filter, $pos))) {
                return true;
            }
        }
        Yii::warning('Не разрешено запускать панель с этого ip ' . $ip, __METHOD__);*/
        return false;
    }


    static public $widgetBeforeRuns = [];

    public function _beforeWidgetRun(WidgetEvent $event)
    {
        $widget = $event->sender;
        $event->isValid = true;
        $this->initEnabled();

        if ($this->editWidgets == Cms::BOOL_Y && $this->enabled && $widget instanceof \skeeks\cms\base\Widget) {
            $id = 'sx-infoblock-' . $widget->id;

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
        if ($this->editWidgets == Cms::BOOL_Y && $this->enabled && $widget instanceof \skeeks\cms\base\Widget) {
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