<?php

class my extends output {

    private $id_user;
    private $user_details = array();
    private static $allowed_actions = array('edit', 'view');

    function __construct($url) {
        parent::__construct($url);
        $this->user = new Model_User();
    }

    function account($action = null) {
        if(!$action) $action = 'view';
        if (in_array($action, self::$allowed_actions)) {
            $account_template = new template();
            $account_template->assign('user', $this->user);
            $this->content = $account_template->fetch("account/{$action}.tpl");
        }
    }

    function events() {
        $events_template = new template();
        $this->content = $events_template->fetch('account/events.tpl');
    }

    function __get($name) {
        #Utilities::Debug($name);
        ##Utilities::Debug($arguments);
        #Utilities::Debug($this);
    }

}

?>