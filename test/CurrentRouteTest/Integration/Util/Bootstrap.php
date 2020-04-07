<?php
namespace CurrentRouteTest\Integration\Util;

use Laminas\Mvc\Service\ServiceManagerConfig;
use Laminas\ServiceManager\ServiceManager;

class Bootstrap
{
    /**
     * @var ServiceManager
     */
    private static $serviceManager;
    /**
     * @var mixed
     */
    private static $config;

    /**
     * @param mixed $config
     */
    public static function setConfig($config)
    {
        static::$config = $config;
    }

    /**
     * @return mixed
     */
    public static function getConfig()
    {
        return static::$config;
    }

    /**
     * @return ServiceManager
     */
    public static function getServiceManager()
    {
        if(null === static::$serviceManager) {
            $serviceManager = new ServiceManager(new ServiceManagerConfig());
            $serviceManager->setService('ApplicationConfig', static::$config);
            $serviceManager->get('ModuleManager')->loadModules();
            static::$serviceManager = $serviceManager;
        }

        return static::$serviceManager;
    }
}