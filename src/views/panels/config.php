<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\pnales\ConfigPanel */
?>
<div class="sx-cms-toolbar__block">
    <a href="<?= \Yii::$app->cms->homePage; ?>"
       title="<?= \Yii::t('skeeks/toolbar', 'The current version {cms} ', ['cms' => 'SkeekS SMS'],
           \Yii::$app->admin->languageCode) ?> <?= \Yii::$app->cms->version; ?>" target="_blank">
        <span class="yii-debug-toolbar__label"><?= \Yii::$app->cms->version; ?></span>
    </a>
</div>
