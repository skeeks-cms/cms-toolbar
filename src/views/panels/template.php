<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\panels\TemplatePanel */
$this->registerCss(<<<CSS

nav.main ul ul {
  position: absolute;
  list-style: none;
  opacity: 0;
  visibility: hidden;
  padding: 10px;
  background-color: rgba(92, 91, 87, 0.9);
  -webkit-transition: opacity 600ms, visibility 600ms;
  transition: opacity 600ms, visibility 600ms;
}
nav.main ul li:hover ul {
  visibility: visible;
  opacity: 1;
  z-index: 100000000;
}
CSS
);
?>

<div class="sx-cms-toolbar__block">
    <div class="sx-cms-toolbar__label <?= \Yii::$app->cmsToolbar->editViewFiles == \skeeks\cms\components\Cms::BOOL_Y ? "sx-cms-toolbar__label_success" : ""; ?>">
        <input type="checkbox" value="1"
               onclick="sx.Toolbar.triggerEditViewFiles();" <?= \Yii::$app->cmsToolbar->editViewFiles == \skeeks\cms\components\Cms::BOOL_Y ? "checked" : ""; ?>/>
        <img height="21" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCIgdmlld0JveD0iMCAwIDUzMy4zMzMgNTMzLjMzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTMzLjMzMyA1MzMuMzMzOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTIwMCwxMDBoNjYuNjY3djMzLjMzM0gyMDBWMTAweiBNMzAwLDEwMGg2Ni42Njd2MzMuMzMzSDMwMFYxMDB6IE00NjYuNjY3LDEwMHYxMzMuMzMzaC0xMDBWMjAwaDY2LjY2N3YtNjYuNjY3SDQwMFYxMDAgICBINDY2LjY2N3ogTTE2Ni42NjcsMjAwaDY2LjY2N3YzMy4zMzNoLTY2LjY2N1YyMDB6IE0yNjYuNjY3LDIwMGg2Ni42Njd2MzMuMzMzaC02Ni42NjdWMjAweiBNMTAwLDEzMy4zMzNWMjAwaDMzLjMzM3YzMy4zMzMgICBINjYuNjY3VjEwMGgxMDB2MzMuMzMzSDEwMHogTTIwMCwzMDBoNjYuNjY3djMzLjMzM0gyMDBWMzAweiBNMzAwLDMwMGg2Ni42Njd2MzMuMzMzSDMwMFYzMDB6IE00NjYuNjY3LDMwMHYxMzMuMzMzaC0xMDBWNDAwICAgaDY2LjY2N3YtNjYuNjY3SDQwMFYzMDBINDY2LjY2N3ogTTE2Ni42NjcsNDAwaDY2LjY2N3YzMy4zMzNoLTY2LjY2N1Y0MDB6IE0yNjYuNjY3LDQwMGg2Ni42Njd2MzMuMzMzaC02Ni42NjdWNDAweiBNMTAwLDMzMy4zMzMgICBWNDAwaDMzLjMzM3YzMy4zMzNINjYuNjY3VjMwMGgxMDB2MzMuMzMzSDEwMHogTTUwMCwzMy4zMzNIMzMuMzMzVjUwMEg1MDBWMzMuMzMzeiBNNTMzLjMzMywwTDUzMy4zMzMsMHY1MzMuMzMzSDBWMEg1MzMuMzMzeiIgZmlsbD0iI0ZGRkZGRiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="/>


        <span class="sx-cms-toolbar__parent_hover_active">
            <?= \Yii::t('skeeks/toolbar', 'Editing view files', [], \Yii::$app->admin->languageCode) ?>
        </span>
        <? if ($panel->viewFiles) : ?>
            <span class="">
                <?= count($panel->viewFiles); ?>
            </span>
            <nav class="main">
          <ul>
            <li>
              <a href="">Lorem</a>
                    <ul>
                    <? foreach ($panel->viewFiles as $viewFile) : ?>
                        <li><a href="#"><?= $viewFile; ?></a></li>
                    <? endforeach; ?>
                    </ul>
            </li>
          </ul>
        <? endif; ?>

    </div>
</div>


