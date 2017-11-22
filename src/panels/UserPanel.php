<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 22.11.2017
 */

namespace skeeks\cms\toolbar\panels;

use skeeks\cms\toolbar\CmsToolbarPanel;
use Yii;

/**
 * Class UserPanel
 * @package skeeks\cms\toolbar\panels
 */
class UserPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'User');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@skeeks/cms/toolbar/views/panels/user', ['panel' => $this]);
    }

    /**
     * @inheritdoc
     */
    /*public function getDetail()
    {
        return Yii::$app->view->render('panels/config/detail', ['panel' => $this]);
    }*/
}
