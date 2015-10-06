<?php

namespace CurrentRoute\Factory\View\Helper;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Mvc\Router\Http\RouteMatch;
use \CurrentRoute\View\Helper\CurrentRoute;

class CurrentRouteFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CurrentRoute
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $routeMatch = $serviceLocator->getServiceLocator()->get('Application')->getMvcEvent()->getRouteMatch();
        $controller = $routeMatch->getParam('controller');
        $action     = $routeMatch->getParam('action');
        $route      = $routeMatch->getMatchedRouteName();

        return new CurrentRoute($controller, $action, $route);
    }

}
