<?php
class auth extends output{
    private $user;

    function __construct($url) {
        parent::__construct($url);
        $this->user = new user();
        $this->render_template = false;
        $this->output_type = 'json';
    }
    
    function login(){
        
    }
    
    function is_logged_in()
    {
        $is_logged = array('is_logged'=>false);
        $this->content = $is_logged;
    }
    

    
}
?>
