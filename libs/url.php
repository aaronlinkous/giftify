<?php

class url {

    private $url = array();
    public $get;
    public $post;

    function __construct()
    {
        $url = explode("/", $_SERVER['REQUEST_URI']);
        array_shift($url);
        $this->url['full'] = implode("/", $url);
        $this->url['page'] = $url[0];
        $this->url['action'] = (isset($url[1])) ? $url[1] : null;
        $this->url['id'] = (isset($url[2])) ? $url[2] : null;
        $this->get = Utilities::Clean($_GET);
        $this->post = Utilities::Clean($_POST);
    }

    function __get($name)
    {
        if(array_key_exists($name, $this->url)){
            return $this->url[$name];
        }
    }
    

}

?>
