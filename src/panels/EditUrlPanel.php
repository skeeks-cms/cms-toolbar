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
 * Class EditUrlPanel
 * @package skeeks\cms\toolbar\panels
 */
class EditUrlPanel extends CmsToolbarPanel
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return \Yii::t('skeeks/toolbar', 'Edit');
    }

    /**
     * @inheritdoc
     */
    public function getSummary()
    {
        return Yii::$app->view->render('@skeeks/cms/toolbar/views/panels/edit-url', ['panel' => $this]);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->toolbar->editUrl;
    }
}
