<?php

class database extends mysqli {

    private $log;
    private $log_queries = true;
    private $connection;

    public function select($query)
    {
        if($this->log_queries){
            $this->log->add($query, true);
        }
        $row = array();
        $results = array();
        $result = $this->query($query, MYSQLI_USE_RESULT);
        if(!$result) return false;
        while($row = $result->fetch_object()) {
            $results[] = $row;
        }
        if($this->errno){
            die($this->error . "<Br>" . $query);
        }
        $result->close();
        $this->next_result();
        return (object) $results;
    }

    public function select_one($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        if($this->errno){
            die($this->error . "<Br>" . $query);
        }
        $result = (array) $this->select($query);
        return ($result[0]) ? : null;
    }

    public function count($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        if($this->errno){
            die($this->error . "<Br>" . $query);
        }
        $result = $this->query($query);
        return $result->num_rows;
    }

    public function insert($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        $this->query($query);
        if($this->errno){
            return false;
//die($this->error . "<Br>" . $query);
        }
        return $this->insert_id;
    }

    public function truncate($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        $this->query($query);
    }

    public function delete($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        $this->query($query);
        return $this->affected_rows;
    }

    public function update($query)
    {
        if($this->log_queries){
            $this->log->add($query);
        }
        $this->query($query);
        return $this->affected_rows;
    }

    public function error()
    {
        //die($error);
    }

    public function __construct()
    {
        $settings = Config::init()->load('database');

        $connection = parent::__construct($settings->server, $settings->user, $settings->password, $settings->name);

        if($this->log_queries){
            $this->log = new log('queries');
        }

        if(mysqli_connect_error()){
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
        $this->connection = $connection;
        return $connection;
    }

}

?>