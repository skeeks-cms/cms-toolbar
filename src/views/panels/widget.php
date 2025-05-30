<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */
/* @var $this yii\web\View */
/* @var $panel \skeeks\cms\toolbar\panels\WidgetPanel */
?>

<div class="sx-cms-toolbar__block sx-cms-toolbar__block_widget sx-cms-toolbar__dropdown">
    <div class="sx-cms-toolbar__label sx-cms-toolbar__dropdown_trigger <?= \Yii::$app->cmsToolbar->editWidgets == \skeeks\cms\components\Cms::BOOL_Y ? "sx-cms-toolbar__label_success" : ""; ?>">
        <input type="checkbox" value="1"
               onclick="sx.Toolbar.triggerEditWidgets();" <?= \Yii::$app->cmsToolbar->editWidgets == \skeeks\cms\components\Cms::BOOL_Y ? "checked" : ""; ?>/>
        <img height="21"
             src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHZlcnNpb249IjEuMSIgdmlld0JveD0iMCAwIDQwMy43NjcgNDAzLjc2NyIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNDAzLjc2NyA0MDMuNzY3IiB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4Ij4KICA8cGF0aCBkPSJtMzc2LjYyMiwzNjEuMjkzbC02OC4wMzgtODguMDgzIDM4LjMyMy0xMy4yODljMi43MTctMC45NDIgNC42NTYtMy4zNTQgNC45OTItNi4yMTEgMC4zMzUtMi44NTYtMC45OTItNS42NTItMy40MTYtNy4xOTlsLTY3LjI5Ny00Mi45MThjOC42MzktMTUuMjggMTQuMTU3LTMxLjkzNiAxNi40MjctNDkuNjE5IDQuNjQ2LTM2LjE4MS01LjA3Ni03Mi4wMDQtMjcuMzc1LTEwMC44NzItMjIuMjk4LTI4Ljg2Ny01NC41MDQtNDcuMzIzLTkwLjY4NS01MS45NjhzLTcyLjAwMyw1LjA3Ny0xMDAuODcxLDI3LjM3NWMtMjguODY3LDIyLjI5OC00Ny4zMjMsNTQuNTA0LTUxLjk2OCw5MC42ODUtNC42NDYsMzYuMTgxIDUuMDc2LDcyLjAwNCAyNy4zNzUsMTAwLjg3MiAyMi4yOTgsMjguODY3IDU0LjUwNCw0Ny4zMjMgOTAuNjg1LDUxLjk2OCA1LjkxMiwwLjc1OSAxMS44MDIsMS4xMzggMTcuNjYsMS4xMzggMTEuNjY1LDAgMjMuMTk4LTEuNTI3IDM0LjQ5MS00LjUyMWwyNC41MzMsNzUuOThjMC44ODMsMi43MzYgMy4yNTQsNC43MjcgNi4xMDIsNS4xMjQgMi44NSwwLjM5NiA1LjY3My0wLjg3MSA3LjI3MS0zLjI2MWwyMi41MzktMzMuNzI1IDY4LjAzOSw4OC4wODNjMS4yMTYsMS41NzQgMy4wMDgsMi42MDEgNC45OCwyLjg1NCAwLjMxOCwwLjA0MSAwLjYzOCwwLjA2MSAwLjk1NSwwLjA2MSAxLjY1LDAgMy4yNjUtMC41NDUgNC41ODUtMS41NjRsMzkuMzQyLTMwLjM5YzMuMjc5LTIuNTMyIDMuODgzLTcuMjQyIDEuMzUxLTEwLjUyem0tMjI5LjkzOC0xMDQuMTM3Yy0zMi4yMDctNC4xMzUtNjAuODc1LTIwLjU2My04MC43MjUtNDYuMjYtMTkuODQ5LTI1LjY5Ni0yOC41MDMtNTcuNTg1LTI0LjM2OC04OS43OTJzMjAuNTY0LTYwLjg3NSA0Ni4yNjEtODAuNzI0YzI1LjY5Ni0xOS44NSA1Ny41ODctMjguNTA1IDg5Ljc5MS0yNC4zNjggMzIuMjA3LDQuMTM1IDYwLjg3NSwyMC41NjMgODAuNzI1LDQ2LjI2IDE5Ljg0OSwyNS42OTYgMjguNTAzLDU3LjU4NSAyNC4zNjgsODkuNzkyLTEuOTg2LDE1LjQ3MS02Ljc2OSwzMC4wNS0xNC4yMjQsNDMuNDQ3bC0xOC45MjEtMTIuMDY2YzcuNzEtMTQuMzUxIDExLjc2LTMwLjQwNCAxMS43Ni00Ni44NjUgMC01NC42ODgtNDQuNDk3LTk5LjE4LTk5LjE5LTk5LjE4LTU0LjY4NywwLTk5LjE4LDQ0LjQ5Mi05OS4xOCw5OS4xOCAwLDU0LjY5NCA0NC40OTIsOTkuMTkgOTkuMTgsOTkuMTkgNy44OCwwIDE1LjY3NC0wLjkyNyAyMy4yNTktMi43NTNsNi44OTQsMjEuMzUyYy0xNC44NDYsMy44MjktMzAuMTU4LDQuNzc0LTQ1LjYzLDIuNzg3em04LjM0Mi0xMTguMjY4bDI1Ljc2Niw3OS43OTZjLTYuMDg0LDEuMzc3LTEyLjMyMiwyLjA4NS0xOC42MzEsMi4wODUtNDYuNDE3LDAtODQuMTgtMzcuNzY4LTg0LjE4LTg0LjE5IDAtNDYuNDE3IDM3Ljc2My04NC4xOCA4NC4xOC04NC4xOCA0Ni40MjMsMCA4NC4xOSwzNy43NjMgODQuMTksODQuMTggMCwxMy41OTQtMy4yNTgsMjYuODUxLTkuNDU1LDM4Ljc2OWwtNzAuNzAxLTQ1LjA4OGMtMi42NjctMS43LTYuMTE1LTEuNTQ1LTguNjE4LDAuMzg4LTIuNTAyLDEuOTM0LTMuNTI0LDUuMjMtMi41NTEsOC4yNHptMTc3LjY2OSwyNDYuODU5bC02OS44My05MC40MDJjLTEuNDIzLTEuODQyLTMuNjE3LTIuOTE1LTUuOTM1LTIuOTE1LTAuMDg2LDAtMC4xNzIsMC4wMDEtMC4yNTgsMC4wMDQtMi40MTIsMC4wODMtNC42MzgsMS4zMjEtNS45NzksMy4zMjhsLTE5LjcyNCwyOS41MTItNTUuMjY2LTE3MS4xNTkgMTUxLjY0Niw5Ni43MS0zMy41MzYsMTEuNjI5Yy0yLjI4LDAuNzkxLTQuMDQxLDIuNjMtNC43Myw0Ljk0NC0wLjY4OSwyLjMxMy0wLjIyNCw0LjgxNiAxLjI1Miw2LjcyN2w2OS44MjksOTAuNDAyLTI3LjQ2OSwyMS4yMnoiIGZpbGw9IiNGRkZGRkYiLz4KPC9zdmc+Cg=="/>

        <span class="sx-cms-toolbar__parent_hover_active">
            <?= \Yii::t('skeeks/toolbar', 'Editing widgets', [], \Yii::$app->admin->languageCode) ?>
        </span>
        
        <? if ($panel->widgetsForEdit) : ?>
            <? $widgets = $panel->widgetsForEdit; ?>
            <span class="">
                <?= count($widgets); ?>
            </span>

            <ul class="sx-cms-toolbar__dropdown_menu">
                <?
                /**
                 * @var \skeeks\cms\base\Widget $widget 
                 */
                foreach ($widgets as $widget) : ?>
                    <li>
                        <a href="#" onclick="$('#sx-infoblock-<?= $widget->id; ?>').trigger('edit'); return false;"><?= $widget->descriptor->name; ?> <small style="color: gray;"><?= $widget->namespace; ?></small></a>
                    </li>
                <? endforeach; ?>
            </ul>

        <? endif; ?>
        
    </div>
</div>


