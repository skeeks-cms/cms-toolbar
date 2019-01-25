<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */

/* @var $panels \skeeks\cms\toolbar\CmsToolbarPanel[] */

$clientOptionsJson = \yii\helpers\Json::encode($clientOptions);

?>

    <div id="sx-cms-toolbar"
         class="sx-cms-toolbar sx-cms-toolbar_position_top <?= \Yii::$app->cmsToolbar->isOpen == \skeeks\cms\components\Cms::BOOL_Y ? "sx-cms-toolbar_active" : "" ?>">
        <div class="sx-cms-toolbar__bar">
            <div class="sx-cms-toolbar__block sx-cms-toolbar__title sx-cms-toolbar__go_to_admin">
                <a href="<?= \yii\helpers\Url::to(['/admin/admin-index']); ?>"
                   title="<?= \Yii::t('skeeks/toolbar', 'Go to the administration panel', [],
           \Yii::$app->admin->languageCode) ?>"
                   >
                    <img alt="" src="<?= \Yii::$app->cms->logo(); ?>">
                </a>
            </div>

            <?php foreach ($panels as $panel): ?>
                <? if ($panel->isEnabled()) : ?>
                    <?= $panel->getSummary() ?>
                <? endif; ?>
            <?php endforeach; ?>

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
<?
$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        sx.Toolbar = new sx.classes.SkeeksToolbar({$clientOptionsJson});
    })(sx, sx.$, sx._);
JS
);
?>