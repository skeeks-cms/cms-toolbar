<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\panels\EditUrlPanel */
?>

<div class="sx-cms-toolbar__block">
    <a href="<?= $panel->toolbar->editUrl; ?>"
       onclick="new sx.classes.toolbar.Dialog('<?= $panel->toolbar->editUrl; ?>'); return false;"
       title="<?= \Yii::t('skeeks/toolbar', 'Edit the current page', [], \Yii::$app->admin->languageCode) ?>">
        <div class="sx-cms-toolbar__label sx-cms-toolbar__label_info">
            <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjE2cHgiIGhlaWdodD0iMTZweCIgdmlld0JveD0iMCAwIDUyOC44MDcgNTI4LjgwNyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTI4LjgwNyA1MjguODA3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTUxMy43NCwyMDQuODI5bC0yOS40ODIsMjkuNDg2bC04Mi4xNDctODIuMTM5bDI5LjQ5NC0yOS40ODljOS4yOTItOS4yOTIsMjMuMjUzLTEwLjQ0MSwzMS4xMzgtMi41NjVsNTMuNTYzLDUzLjU3MiAgIEM1MjQuMTc5LDE4MS41NjcsNTIzLjAzMiwxOTUuNTM3LDUxMy43NCwyMDQuODI5eiBNMzg4LjQyMSwxNjUuODU5bDgyLjE0Nyw4Mi4xNDdsLTE5NS44ODMsMTk1Ljg4ICAgYy0wLjg5OCwwLjg5OC0zLjM5MywzLjM5My02Ljg5Miw0LjI4NWMtMC40MDUsMC4xOTUtMC44MTksMC4zNjEtMS4yMjksMC40OTFsLTEwMi4yMywzMi41OGMtMi44NjEsMC45MDQtNS43MzYsMC4zMTktNy42MDEtMS41NDkgICBjLTEuODcxLTEuODY4LTIuNDUtNC43NC0xLjU1NS03LjYwMmwzMi41OC0xMDIuMjIxYzAuMTM5LTAuNDE5LDAuMzA1LTAuODI3LDAuNDkxLTEuMjI0YzAuODk2LTMuNTA1LDMuMzg0LTUuOTkzLDQuMjkyLTYuODk3ICAgbDM2LjgxMi0zNi44MTJIMTA1LjAyYy01LjAxMiwwLTkuMDc5LTQuMDY2LTkuMDc5LTkuMDc5YzAtNS4wMjMsNC4wNjYtOS4wNzgsOS4wNzktOS4wNzhoMTQyLjQ5MUwzODguNDIxLDE2NS44NTl6ICAgIE0yNDkuNDE3LDQzNy41NzRsLTUwLjU2OS01MC41NjFsLTEzLjU2NSw0Mi41ODFsMjEuNTU0LDIxLjU1N0wyNDkuNDE3LDQzNy41NzR6IE0zODUuMjY1LDE5OC41MDggICBjLTIuOTA4LTIuOTExLTcuNjI1LTIuOTExLTEwLjUyNywwTDIyMi4wMywzNTEuMjA2Yy0yLjkwNSwyLjkwOC0yLjkwNSw3LjYyNSwwLDEwLjUzM2MyLjkwNSwyLjkwOCw3LjYyNSwyLjkwOCwxMC41MywwICAgbDE1Mi43MDUtMTUyLjY5OUMzODguMTcyLDIwNi4xMjksMzg4LjE3MiwyMDEuNDEzLDM4NS4yNjUsMTk4LjUwOHogTTM3Ni4wMzcsNDg5LjIxN2MwLDUuNDU1LTQuNDM4LDkuOS05Ljg5NSw5LjlIMTg1Ljk1NiAgIGwtMTYuMjc1LDUuMTg5Yy0zLjI2OSwxLjA0MS02LjYyOSwxLjU2Ni05Ljk5MiwxLjU2NmMtNy4xNjEsMC0xMy44MTktMi40NTMtMTkuMjY2LTYuNzU2SDQ2Ljg4NWMtNS40NTgsMC05LjkwOS00LjQzNC05LjkwOS05LjkgICBWNzMuNDI0YzAtNS40NTgsNC40NDUtOS45LDkuOTA5LTkuOWgzNy4xMnYxNS42NzVjMCw1LjQ2NCw0LjQzLDkuODk3LDkuOTAzLDkuODk3YzUuNDcxLDAsOS45MDEtNC40MzMsOS45MDEtOS44OTdWNjMuNTIzaDU2LjkyICAgdjE1LjY3NWMwLDUuNDY0LDQuNDMsOS44OTcsOS45MDEsOS44OTdjNS40NzMsMCw5LjkwMy00LjQzMyw5LjkwMy05Ljg5N1Y2My41MjNoNDkuNDk3djE1LjY3NWMwLDUuNDY0LDQuNDMsOS44OTcsOS45MDQsOS44OTcgICBjNS40NywwLDkuOS00LjQzMyw5LjktOS44OTdWNjMuNTIzaDU0LjQ1M3YxNS42NzVjMCw1LjQ2NCw0LjQyNyw5Ljg5Nyw5Ljg5NSw5Ljg5N2M1LjQ3MywwLDkuOTA2LTQuNDMzLDkuOTA2LTkuODk3VjYzLjUyM2g0Mi4wNzIgICBjNS40NSwwLDkuODk2LDQuNDQyLDkuODk2LDkuOXY2OC41NzFsMTAuMzc5LTEwLjM3NGwxOS4zMjItMTkuMzI1VjczLjQyNGMwLTIxLjgzMS0xNy43NjItMzkuNTk2LTM5LjU5Ny0zOS41OTZoLTQyLjA3MlY5LjkwNCAgIGMwLTUuNDY3LTQuNDM0LTkuOTA0LTkuOTA2LTkuOTA0Yy01LjQ2MiwwLTkuODk1LDQuNDMxLTkuODk1LDkuOTA0djIzLjkyNGgtNTQuNDY1VjkuOTA0YzAtNS40NjctNC40My05LjkwNC05LjkwMS05LjkwNCAgIGMtNS40NzMsMC05LjkwMyw0LjQzMS05LjkwMyw5LjkwNHYyMy45MjRoLTQ5LjQ5N1Y5LjkwNGMwLTUuNDY3LTQuNDMtOS45MDQtOS45MDQtOS45MDRjLTUuNDcsMC05LjksNC40MzEtOS45LDkuOTA0djIzLjkyNCAgIGgtNTYuOTJWOS45MDRjMC01LjQ2Ny00LjQzMS05LjkwNC05LjkwMS05LjkwNGMtNS40NzMsMC05LjkwMyw0LjQzMS05LjkwMyw5LjkwNHYyMy45MjRoLTM3LjEyICAgYy0yMS44MzIsMC0zOS42MDIsMTcuNzY1LTM5LjYwMiwzOS41OTZ2NDE1Ljc4N2MwLDIxLjgzNCwxNy43NzEsMzkuNTk2LDM5LjYwMiwzOS41OTZoMzE5LjI2NCAgIGMyMS44MzUsMCwzOS41OTctMTcuNzYyLDM5LjU5Ny0zOS41OTZWMzQ1LjA1OWwtMjkuNzAyLDI5LjcwOHYxMTQuNDVIMzc2LjAzN3ogTTI5OC43MDcsMTUyLjQzNkgxMDUuMDIgICBjLTUuMDEyLDAtOS4wNzksNC4wNjEtOS4wNzksOS4wNzljMCw1LjAxOSw0LjA2Niw5LjA3OSw5LjA3OSw5LjA3OWgxOTMuNjg3YzUuMDEzLDAsOS4wNzktNC4wNjEsOS4wNzktOS4wNzkgICBDMzA3Ljc4NiwxNTYuNDk3LDMwMy43MiwxNTIuNDM2LDI5OC43MDcsMTUyLjQzNnogTTI5OC43MDcsMjI1LjYzNUgxMDUuMDJjLTUuMDEyLDAtOS4wNzksNC4wNjMtOS4wNzksOS4wNzkgICBjMCw1LjAxOSw0LjA2Niw5LjA3OSw5LjA3OSw5LjA3OWgxOTMuNjg3YzUuMDEzLDAsOS4wNzktNC4wNjEsOS4wNzktOS4wNzlDMzA3Ljc4NiwyMjkuNjk4LDMwMy43MiwyMjUuNjM1LDI5OC43MDcsMjI1LjYzNXoiIGZpbGw9IiNGRkZGRkYiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
            <span class="sx-cms-toolbar__parent_hover_active">
                <?= \Yii::t('skeeks/toolbar', 'Edit', [], \Yii::$app->admin->languageCode) ?>
            </span>
        </div>
    </a>
</div>


