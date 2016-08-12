<?php

namespace CurrentRoute\Factory\View\Helper;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use \CurrentRoute\View\Helper\CurrentRoute;

class CurrentRouteFactory implements FactoryInterface
{

    /** 
     * Let's return view helper interface
     */
     
     public function __invoke(ContainerInterface $container, $requestedName, array $options = null )
     {
         return $this->createService($container);
     }
    /**
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CurrentRoute
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $routeMatch = $serviceLocator->get('Application')->getMvcEvent()->getRouteMatch();
        $controller = $action = $route = $module = '';

        if($routeMatch) {
            $controller = $routeMatch->getParam('controller');
            $action     = $routeMatch->getParam('action');
            $module     = $routeMatch->getParam('__NAMESPACE__');
            $route      = $routeMatch->getMatchedRouteName();
        }

        return new CurrentRoute($controller, $action, $route, $module);
    }

}
