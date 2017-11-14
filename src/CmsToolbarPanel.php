<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 14.11.2017
 */
namespace skeeks\cms\toolbar;

/**
 * Class CmsToolbarPanel
 * @package skeeks\cms\toolbar
 */
class CmsToolbarPanel extends Component
{
    /**
     * @var string panel unique identifier.
     * It is set automatically by the container module.
     */
    public $id;
    /**
     * @var string request data set identifier.
     */
    public $tag;
    /**
     * @var Module
     */
    public $module;
    /**
     * @var mixed data associated with panel
     */
    public $data;
    /**
     * @var array array of actions to add to the debug modules default controller.
     * This array will be merged with all other panels actions property.
     * See [[\yii\base\Controller::actions()]] for the format.
     */
    public $actions = [];
    /**
     * @var FlattenException|null Error while saving the panel
     * @since 2.0.10
     */
    protected $error;
    /**
     * @return string name of the panel
     */
    public function getName()
    {
        return '';
    }
    /**
     * @return string content that is displayed at debug toolbar
     */
    public function getSummary()
    {
        return '';
    }
    /**
     * @return string content that is displayed in debugger detail view
     */
    public function getDetail()
    {
        return '';
    }
    /**
     * Saves data to be later used in debugger detail view.
     * This method is called on every page where debugger is enabled.
     *
     * @return mixed data to be saved
     */
    public function save()
    {
        return null;
    }
    /**
     * Loads data into the panel
     *
     * @param mixed $data
     */
    public function load($data)
    {
        $this->data = $data;
    }


    /**
     * @param FlattenException $error
     * @since 2.0.10
     */
    public function setError(FlattenException $error)
    {
        $this->error = $error;
    }
    /**
     * @return FlattenException|null
     * @since 2.0.10
     */
    public function getError()
    {
        return $this->error;
    }
    /**
     * @return bool
     * @since 2.0.10
     */
    public function hasError()
    {
        return $this->error !== null;
    }
    /**
     * Is the panel enabled?
     * @return bool
     * @since 2.0.10
     */
    public function isEnabled()
    {
        return true;
    }
}