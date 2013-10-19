<?php

class Model {

    protected $db;
    protected static $database;
    public function __construct()
    {
        $this->db = new database;
        self::$database = $this->db;
    }

}

?>
