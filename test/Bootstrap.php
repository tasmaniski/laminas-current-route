<?php

error_reporting(E_ALL | E_STRICT);
chdir(dirname(__DIR__));

require_once 'vendor/autoload.php';

$conf = array('modules' => array('CurrentRoute'), 'module_listener_options' => array());

CurrentRouteTest\Integration\Util\Bootstrap::setConfig($conf);