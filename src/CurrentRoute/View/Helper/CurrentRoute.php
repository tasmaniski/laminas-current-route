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
     * If $controller has FQCN we use that info for $module and $controller names
     *
     * @param String $controller Current controller name
     * @param String $action Current action name
     * @param String $route Current route name
     */
    public function __construct($controller, $action, $route)
    {
        $controller = strtolower($controller);

        if(strpos($controller, '\controller\\') !== false) {
            list($this->module, $this->controller) = explode('\controller\\', $controller);
        }else {
            $this->controller = $controller;
            $this->module     = '';
        }

        $this->action = $action;
        $this->route  = $route;
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
