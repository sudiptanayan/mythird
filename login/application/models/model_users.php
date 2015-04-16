<?php
class Model_Users extends CI_Model {

    function getUser($id, $fields = '*') {
        $this->db->select($fields);
        $this->db->from($this->db->dbprefix('user'));
        $this->db->where('id', $id);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }    
}
?>