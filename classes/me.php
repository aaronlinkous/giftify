<?php

class me extends output {

    private $id_user;
    private $user_details = array();

    function __construct()
    {
        parent::__construct();
        if(isset($_SESSION['_logged'])){
            $username = $_SESSION['username'];
            $password = $_SESSION[md5($username)];
            $this->id_user = $this->login($username, $password);
            if($this->id_user){
                $this->user_details = $this->details();
            }
        }
    }

    function __call($name, $arguments)
    {
        //Utilities::Debug($name);
    }

    function details()
    {
        return $this->_details($this->id_user);
    }

    function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE user_email LIKE '{$username}' AND md5(user_password) = '{$password}'";
        $result = $this->db->select_one($query);
        return $result;
    }

}

?>