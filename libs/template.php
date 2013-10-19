<?php

include_once _LIBS."smarty/libs/Smarty.class.php";

class template extends Smarty {

    function __construct()
    {
        parent::__construct();

        $this->template_dir = _TEMPLATE_DIR;
        $this->config_dir = _LIBS . "smarty/configs";
        $this->compile_dir = _LIBS . "smarty/templates_c";
        $this->cache_dir = _LIBS . "smarty/cache";
        return $this;
    }

}

?>
