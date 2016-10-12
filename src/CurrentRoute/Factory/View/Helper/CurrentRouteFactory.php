<?php

namespace CurrentRoute\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Zend\Mvc\Router\Http\RouteMatch;
use CurrentRoute\View\Helper\CurrentRoute;

class CurrentRouteFactory
{

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $routeMatch = $container->get('Application')->getMvcEvent()->getRouteMatch();
        $controller = $action = $route = $module = '';

        if($routeMatch){
            $controller = $routeMatch->getParam('controller');
            $action     = $routeMatch->getParam('action');
            $module     = $routeMatch->getParam('__NAMESPACE__');
            $route      = $routeMatch->getMatchedRouteName();
        }

        return new CurrentRoute($controller, $action, $route, $module);
    }

}
