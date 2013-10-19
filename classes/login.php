<?php
/**
 * Description of login
 *
 * @author Tel Smith @74656c
 */
class login extends output {

    public function __construct()
    {
        $template = new template();
        $this->content = $template->fetch('login.tpl');
    }
    

}

?>
