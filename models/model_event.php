<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Model_Event extends Model {

    function getAllMyEvents($id) {
        $query = "SELECT * FROM events WHERE user_id = {$id}";
        $this->db->select($query);
    }

}

?>
