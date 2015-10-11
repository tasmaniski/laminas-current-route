<?php

namespace CurrentRoute\View\Helper;

use Zend\View\Helper\AbstractHelper;

class CurrentRoute extends AbstractHelper
{
    private $action;
    private $controller;
    private $module;
    private $route;

    /**
     * If module name is omitted try to found it in controller, otherwise leave it empty - ''
     * in that case $controller should has FQCN name
     *
     * @param String $controller Current controller name
     * @param String $action Current action name
     * @param String $route Current route name
     * @param String $module Use __NAMESPACE__  as module name. Can be omitted in routes config - null
     */
    public function __construct($controller, $action, $route, $module)
    {
        $controller = explode('\\', strtolower($controller));
        $module     = explode('\\', strtolower($module));

        if($module[0] === '' && count($controller) === 3) {
            $module[0] = $controller[0];
        }

        $this->module     = $module[0];
        $this->controller = array_pop($controller);
        $this->action     = $action;
        $this->route      = $route;
    }

    /**
     * @return String Return current controller name
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return String Return current action name
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return String Return current module name
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * @return String Return current route name
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Match current controller name with provided controller name
     *
     * @param $controller Name to match
     * @return bool
     */
    public function matchController($controller)
    {
        return $this->controller === $controller;
    }

    /**
     * Match current action name with provided action name
     *
     * @param $action Name to match
     * @return bool
     */
    public function matchAction($action)
    {
        return $this->action === $action;
    }

    /**
     * Match current module name with provided module name
     *
     * @param $module Name to match
     * @return bool
     */
    public function matchModule($module)
    {
        return $this->module === $module;
    }

    /**
     * Match current route name with provided route name
     *
     * @param $route Name to match
     * @return bool
     */
    public function matchRoute($route)
    {
        return $this->route === $route;
    }


}
