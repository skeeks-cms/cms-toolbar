<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\pnales\CachePanel */
?>
    <div class="sx-cms-toolbar__block">
        <a href="#" onclick="sx.ClearCache.execute(); return false;"
           title="<?= \Yii::t('skeeks/toolbar', 'Clear cache and temporary files', [],
               \Yii::$app->admin->languageCode) ?>">
            <div class="sx-cms-toolbar__label sx-cms-toolbar__label_info">
                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiB3aWR0aD0iMTZweCIgaGVpZ2h0PSIxNnB4Ij4KICA8Zz4KICAgIDxnPgogICAgICA8cGF0aCBkPSJtNDA0LjUsNjIuNmwyNC44LTMuMWMxMS4xLTEuNCAxOS0xMS41IDE3LjctMjIuNy0xLjMtMTAuMy05LjctMTguNy0yMi43LTE3LjdsLTc0LjYsOS4zYy0xMS4xLDEuNC0xOSwxMS41LTE3LjcsMjIuNmw5LjIsNzUuNmMxLjQsMTEuMSAxMS41LDE5LjEgMjIuNiwxNy43IDExLjEtMS40IDE5LjEtMTEuNSAxNy43LTIyLjdsLTMuNC0yOC4xYzcwLjEsNTIgOTkuMiwxNDIuMiA3Mi4zLDIyNS43LTI2LjksODMuNS0xMDUuOSwxNDAuOC0xOTMuMiwxNDEtMTIuOSwwLTIxLjEsOC42LTIxLjQsMTkuOC0wLjIsMTEuMiA3LjgsMjAuOCAyMS40LDIwLjggMTA0LjgsMCAxOTkuNy02OC45IDIzMS45LTE2OS4yIDMyLTk5LjEtMi0yMDYuNC04NC42LTI2OXYtMi4xMzE2M2UtMTR6IiBmaWxsPSIjRkZGRkZGIi8+CiAgICAgIDxwYXRoIGQ9Im0xNzAuNywzODUuM2MtMS40LTExLjEtMTEuNS0xOS4xLTIyLjYtMTcuNy0xMS4xLDEuNC0xOS4xLDExLjUtMTcuNywyMi43bDMuNCwyOC4xYy03MC4xLTUyLTk5LjItMTQyLjItNzIuMy0yMjUuNyAyNi45LTgzLjUgMTA1LjktMTQwLjggMTkzLjItMTQxIDEyLjksMCAyMS4xLTguNiAyMS40LTE5LjggMC4yLTExLjItNy44LTIwLjgtMjEuNC0yMC44LTEwNC43LTAuMS0xOTkuNiw2OC44LTIzMS44LDE2OS4xLTMyLDk5LjMgMiwyMDYuNiA4NC42LDI2OS4ybC0yNC44LDMuMWMtMTEuMSwxLjQtMTksMTEuNS0xNy43LDIyLjcgMS4zLDEwLjMgOS43LDE4LjcgMjIuNywxNy43bDc0LjYtOS4zYzExLjEtMS40IDE5LTExLjUgMTcuNy0yMi42bC05LjMtNzUuN3oiIGZpbGw9IiNGRkZGRkYiLz4KICAgIDwvZz4KICA8L2c+Cjwvc3ZnPgo="/>
                <span class="sx-cms-toolbar__parent_hover_active"><?= \Yii::t('skeeks/toolbar', 'Clear cache', [],
                        \Yii::$app->admin->languageCode) ?></span>
            </div>
        </a>
        <span></span>
    </div>


<?
$clearCacheOptions = \yii\helpers\Json::encode([
    'backend' => \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams(['/cms/admin-clear/index'])->url
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