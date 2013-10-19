<?php

class Model_Categories extends Model {

    private $categories = array();

    public function Show()
    {
        return $this->_build(0);
    }
    
    private function _build($id_parent)
    {
        $categories = array();
        $query = "SELECT * FROM categories WHERE id_parent = {$id_parent} ORDER BY title";
        $result = $this->db->select($query);
        foreach($result as $row) {
            $children = $this->_build($row->id_category);
            if($children){
                $row->children = $children;
            }
            $categories[$row->id_category] = $row;
        }
        return $categories;
    }

}

?>
