<?php
namespace ActivityStreams\Server;

class Services
{

    static $instances = array();

    static function get($name)
    {
        if (!isset(self::$instances[$name])) {
            $service_class_name = $name . 'Service';
            $class = '\ActivityStreams\Server\\' . $service_class_name;
            self::$instances[$name] = new $class;
        }
        return self::$instances[$name];
    }

    public static function autoload($className)
    {
        $file = dirname(__FILE__) . '/' . $className . '.php';
        if (file_exists($file)) {
            include_once $file;
        }
        $file = dirname(__FILE__) . '/' . $className . '.interface.php';
        if (file_exists($file)) {
            include_once $file;
        }
    }
}

spl_autoload_register(array(Services::class, 'autoload'));
