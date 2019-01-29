<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\pnales\UserPanel */
$urlUserEdit = \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-profile/update'])
    ->enableEmptyLayout()
    ->url;
?>
<div class="sx-cms-toolbar__block sx-profile">
    <a href="<?= $urlUserEdit; ?>"
       onclick="new sx.classes.toolbar.Dialog('<?= $urlUserEdit; ?>'); return false;"
       title="<?= \Yii::t('skeeks/toolbar', 'Go to edit your data', [],
           \Yii::$app->admin->languageCode) ?>">

        <div class="sx-cms-toolbar__label sx-cms-toolbar__label_info">
            <img src="<?= \skeeks\cms\helpers\Image::getSrc(\Yii::$app->user->identity->avatarSrc); ?>"
                 style="border: 1px solid silver; height: 16px;"/>
            <?= \Yii::$app->user->identity->displayName; ?>
        </div>
    </a>
    <!--<a href="<? /*= $urlEditModel; */ ?>" onclick="new sx.classes.toolbar.Dialog('<? /*= $urlEditModel; */ ?>'); return false;" title="Выход">
     <span class="label">Выход</span>
</a>-->
    <?= \yii\helpers\Html::a('<span class="sx-cms-toolbar__label">' . \Yii::t('skeeks/toolbar', 'Exit', [],
            \Yii::$app->admin->languageCode) . '</span>',
        \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(["/admin/admin-auth/logout"])->url, ["data-method" => "post"]) ?>

</div>