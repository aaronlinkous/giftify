<?php

class Model_User extends Model {

    public $db;
    private $id_user;

    public function __construct($id_user = null)
    {
        if($id_user) $this->id_user = $id_user;
        $this->db = new database;
    }

    static function all()
    {
        $users = array();
        $db = new database();
        $query = "SELECT 
                    id_user, 
                    user_email, 
                    user_first_name, 
                    user_last_name,
                    CONCAT(user_first_name,' ',user_last_name) as user_full_name, 
                    user_level 
                  FROM users 
                  ORDER BY user_first_name, user_last_name";
        $result = $db->select($query);
        foreach($result as $row) {
            $users[$row->id_user] = $row;
        }
        return $users;
    }
   
    function _details($id_user)
    {
        $query = "
                 SELECT u.id_user,
                        u.user_first_name, 
                        u.user_last_name, 
                        u.user_email
                FROM users u
                WHERE id_user = '{$id_user}'";

        $result = $this->db->select_one($query);
        return $result;
    }

    function info()
    {
        return $this->_details($this->id_user);
    }

}

?>
