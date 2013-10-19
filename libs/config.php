<?php

class Config {

    private static $config;
    private static $_instance = null;

    public static function init()
    {
        if(self::$_instance === null){
            self::$_instance = new self;
        }
        self::$config = parse_ini_file(_CONFIG_FILE, true);
        return self::$_instance;
    }

    function load($key = null)
    {
        if(isset(self::$config[$key])){
            return (object) self::$config[$key];
        }
        return $this;
    }
}

?>