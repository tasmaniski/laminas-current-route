<?php

namespace CurrentRouteTest\View\Helper;

use CurrentRouteTest\Integration\Util\Bootstrap;

class CurrentRouteTest extends \PHPUnit_Framework_TestCase
{

    public function testFqcn()
    {
        $controller = 'Admin\Controller\Index';
        $action     = 'index';
        $route      = 'home';
        $module     = null;

        $currentRouteHelper = new \CurrentRoute\View\Helper\CurrentRoute($controller, $action, $route, $module);

        $this->assertEquals('index', $currentRouteHelper->getController());
        $this->assertEquals('index', $currentRouteHelper->getAction());
        $this->assertEquals('admin', $currentRouteHelper->getModule());
        $this->assertEquals('home', $currentRouteHelper->getRoute());
    }

    public function testNonFqcnAndEmptyModule()
    {
        $controller = 'admin-index-cpntroller';
        $action     = 'index';
        $route      = 'home';
        $module     = null;

        $currentRouteHelper = new \CurrentRoute\View\Helper\CurrentRoute($controller, $action, $route, $module);

        $this->assertEquals('admin-index-cpntroller', $currentRouteHelper->getController());
        $this->assertEquals('index', $currentRouteHelper->getAction());
        $this->assertEquals('', $currentRouteHelper->getModule());
        $this->assertEquals('home', $currentRouteHelper->getRoute());
    }

    public function testFqcnWithModule()
    {
        $controller = 'admin-index-cpntroller';
        $action     = 'index';
        $route      = 'home';
        $module     = 'Admin';

        $currentRouteHelper = new \CurrentRoute\View\Helper\CurrentRoute($controller, $action, $route, $module);

        $this->assertEquals('admin-index-cpntroller', $currentRouteHelper->getController());
        $this->assertEquals('index', $currentRouteHelper->getAction());
        $this->assertEquals('admin', $currentRouteHelper->getModule());
        $this->assertEquals('home', $currentRouteHelper->getRoute());
    }




    public function testRouteMatch()
    {
        $controller = 'Admin\Controller\Index';
        $action     = 'index';
        $route      = 'home';
        $module     = null;

        $currentRouteHelper = new \CurrentRoute\View\Helper\CurrentRoute($controller, $action, $route, $module);

        $this->assertTrue($currentRouteHelper->matchController('index'));
        $this->assertTrue($currentRouteHelper->matchAction('index'));
        $this->assertTrue($currentRouteHelper->matchModule('admin'));
        $this->assertTrue($currentRouteHelper->matchRoute('home'));
    }

}