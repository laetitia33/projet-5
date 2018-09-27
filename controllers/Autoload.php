<?php

namespace Laetitia_Bernardi\projet5\Controller;


class Autoload
{
    
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload')); 
    }

 
    static function autoload($class)
    {
        $class = str_replace( __NAMESPACE__ . '\\' , '', $class);
        $class = str_replace('\\', '/', $class);
        require __DIR__ . '/' . $class . '.php';
    }
}