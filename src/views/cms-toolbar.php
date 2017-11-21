<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panels \skeeks\cms\toolbar\CmsToolbarPanel[] */

use skeeks\cms\helpers\UrlHelper;

$clientOptionsJson = \yii\helpers\Json::encode($clientOptions);
?>

    <div id="sx-cms-toolbar" class="sx-cms-toolbar sx-cms-toolbar_position_top <?= \Yii::$app->cmsToolbar->isOpen == \skeeks\cms\components\Cms::BOOL_Y ? "sx-cms-toolbar_active" : "" ?>">
        <div class="sx-cms-toolbar__bar">
            <div class="sx-cms-toolbar__block sx-cms-toolbar__title">
                <a href="<?= \Yii::$app->cms->descriptor->homepage; ?>"
                   title="<?= \Yii::t('skeeks/toolbar', 'The current version {cms} ', ['cms' => 'SkeekS SMS'],
                       \Yii::$app->admin->languageCode) ?> <?= \Yii::$app->cms->descriptor->version; ?>" target="_blank">
                    <img alt="" src="<?= \Yii::$app->cms->logo(); ?>">
                    <!--<span class="label"><?/*= \Yii::$app->cms->descriptor->version; */?></span>-->
                </a>
            </div>

            <?php foreach ($panels as $panel): ?>
                <? if ($panel->isEnabled()) : ?>
                    <?= $panel->getSummary() ?>
                <? endif; ?>
            <?php endforeach; ?>


            <? if (\Yii::$app->user->can('cms/admin-settings')) : ?>
                <div class="sx-cms-toolbar__block">
                    <a onclick="new sx.classes.toolbar.Dialog('<?= $urlSettings; ?>'); return false;"
                       href="<?= $urlSettings; ?>" title="<?= \Yii::t('skeeks/cms', 'Managing project settings', [],
                        \Yii::$app->admin->languageCode) ?>"><span class="sx-cms-toolbar__label sx-cms-toolbar__label_info"><?= \Yii::t('skeeks/cms',
                                'Project settings', [], \Yii::$app->admin->languageCode) ?></span></a>
                </div>
            <? endif; ?>

            <div class="sx-cms-toolbar__block sx-profile">
                <a href="<?= $urlUserEdit; ?>"
                   onclick="new sx.classes.toolbar.Dialog('<?= $urlUserEdit; ?>'); return false;"
                   title="<?= \Yii::t('skeeks/cms', 'It is you, go to edit your data', [],
                       \Yii::$app->admin->languageCode) ?>">
                    <img src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->user->identity->avatarSrc); ?>"/>
                    <span class="sx-cms-toolbar__label sx-cms-toolbar__label_info"><?= \Yii::$app->user->identity->displayName; ?></span>
                </a>
                <!--<a href="<? /*= $urlEditModel; */ ?>" onclick="new sx.classes.toolbar.Dialog('<? /*= $urlEditModel; */ ?>'); return false;" title="Выход">
                 <span class="label">Выход</span>
            </a>-->
                <?= \yii\helpers\Html::a('<span class="label">' . \Yii::t('skeeks/cms', 'Exit', [],
                        \Yii::$app->admin->languageCode) . '</span>',
                    UrlHelper::construct("admin/auth/logout")->enableAdmin()->setCurrentRef(), ["data-method" => "post"]) ?>

            </div>

            <? if ($editUrl) : ?>
                <div class="sx-cms-toolbar__block">
                    <a href="<?= $editUrl; ?>" onclick="new sx.classes.toolbar.Dialog('<?= $editUrl; ?>'); return false;"
                       title="<?= \Yii::t('skeeks/cms', 'Edit the current page', [], \Yii::$app->admin->languageCode) ?>">
                        <span class="label"><?= \Yii::t('skeeks/cms', 'Edit', [], \Yii::$app->admin->languageCode) ?></span>
                    </a>
                </div>
            <? endif; ?>

            <? if (\Yii::$app->user->can('cms/admin-settings')) : ?>
                <div class="sx-cms-toolbar__block">
                    <input type="checkbox" value="1"
                           onclick="sx.Toolbar.triggerEditWidgets();" <?= \Yii::$app->cmsToolbar->editWidgets == \skeeks\cms\components\Cms::BOOL_Y ? "checked" : ""; ?>/>
                    <span><?= \Yii::t('skeeks/cms', 'Editing widgets', [], \Yii::$app->admin->languageCode) ?></span>
                </div>
            <? endif; ?>

            <? if (\Yii::$app->user->can(\skeeks\cms\rbac\CmsManager::PERMISSION_EDIT_VIEW_FILES)) : ?>
                <div class="sx-cms-toolbar__block">
                    <input type="checkbox" value="1"
                           onclick="sx.Toolbar.triggerEditViewFiles();" <?= \Yii::$app->cmsToolbar->editViewFiles == \skeeks\cms\components\Cms::BOOL_Y ? "checked" : ""; ?>/>
                    <span><?= \Yii::t('skeeks/cms', 'Editing view files', [], \Yii::$app->admin->languageCode) ?></span>
                </div>
            <? endif; ?>

            <? if (\Yii::$app->user->can('admin/clear')) : ?>

                <?
                $clearCacheOptions = \yii\helpers\Json::encode([
                    'backend' => UrlHelper::construct(['/cms/admin-clear/index'])->enableAdmin()->toString()
                ]);

                $this->registerJs(<<<JS
    (function(sx, $, _)
    {
        sx.classes.ClearCache = sx.classes.Component.extend({
    
            execute: function(code)
            {
                this.ajaxQuery = sx.ajax.preparePostQuery(this.get('backend'), {
                    'code' : code
                });
    
                var Handler = new sx.classes.AjaxHandlerStandartRespose(this.ajaxQuery);
    
                this.ajaxQuery.execute();
            }
        });
    
        sx.ClearCache = new sx.classes.ClearCache({$clearCacheOptions});
    
    })(sx, sx.$, sx._);
JS
                );
                ?>

                <div class="sx-cms-toolbar__block">

                    <a href="#" onclick="sx.ClearCache.execute(); return false;"
                       title="<?= \Yii::t('skeeks/cms', 'Clear cache and temporary files', [],
                           \Yii::$app->admin->languageCode) ?>">
                        <span class="sx-cms-toolbar__label sx-cms-toolbar__label_info"><?= \Yii::t('skeeks/cms', 'Clear cache', [],
                                \Yii::$app->admin->languageCode) ?></span>
                    </a>
                    <span></span>
                </div>
            <? endif; ?>




            <div class="sx-cms-toolbar__block_last">
    
            </div>
            <a class="sx-cms-toolbar__external" href="#" target="_blank">
                <span class="sx-cms-toolbar__external-icon"></span>
            </a>
                
            <span class="sx-cms-toolbar__toggle" onclick="sx.Toolbar.toggle(); return false;">
                <span class="sx-cms-toolbar__toggle-icon"></span>
            </span>
        </div>
        <div class="sx-cms-toolbar__view">
            <iframe src="about:blank" frameborder="0"></iframe>
        </div>
    </div>

    <!--<div id="sx-cms-toolbar-min" <?/*= \Yii::$app->cmsToolbar->isOpen == \skeeks\cms\components\Cms::BOOL_Y ? "style='display: none;'" : "" */?>>
        <a href="#" onclick="sx.Toolbar.open(); return false;"
           title="<?/*= \Yii::t('skeeks/cms', 'Open the Control Panel {cms}', ['cms' => 'SkeekS Cms'],
               \Yii::$app->admin->languageCode) */?>" id="sx-cms-toolbar-logo">
            <img width="29" height="30" alt="" src="<?/*= \Yii::$app->cms->logo(); */?>">
        </a>
        <span class="sx-cms-toolbar-toggler" onclick="sx.Toolbar.open(); return false;">‹</span>
    </div>-->

<?
$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        sx.Toolbar = new sx.classes.SkeeksToolbar({$clientOptionsJson});
    })(sx, sx.$, sx._);
JS
);
?>