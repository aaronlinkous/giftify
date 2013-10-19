<?php

class log {

    private static $log_name;

    public function __construct($name, $print = false, $append = true) {
        $this->log_name = $name;
        $this->print = $print;

        if (!is_dir(_LOGS)) {
            mkdir(_LOGS, 0775);
        }

        if (file_exists(_LOGS . "{$this->log_name}.log") && !$append) {
            unlink(_LOGS . "{$this->log_name}.log");
        }

        if ($print){
            echo '[' . _LOGS . "{$this->log_name}.log]<br>";
        }
        return $this;
    }

    public function add($data) {
        // self::init();

        $log_data[] = "----------------\n";
        $log_data[] = date('m/d/Y H:i:s') . "\n";
        $log_data[] = $data . "\n";
        $log_data[] = "-----------------\n";
        file_put_contents(_LOGS . "/{$this->log_name}.log", implode("\n", $log_data), FILE_APPEND);
        if ($this->print) {
            echo nl2br($data) . "<br/>";
        }
    }

    function addObj($obj) {
        $this->add(print_r($obj, true));
    }

}

?>