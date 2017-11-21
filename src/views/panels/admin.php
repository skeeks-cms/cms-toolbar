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
    <a href="<?= \yii\helpers\Url::to(['/admin/index']); ?>"
       title="<?= \Yii::t('skeeks/toolbar', 'Go to the administration panel', [],
           \Yii::$app->admin->languageCode) ?>"><span
                class="sx-cms-toolbar__label sx-cms-toolbar__label_info"><?= \Yii::t('skeeks/toolbar',
                'Administration', [], \Yii::$app->admin->languageCode) ?>
        </span>
    </a>
</div>
