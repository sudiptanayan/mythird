<?php
class Model_User extends CI_Model {

    function login($email, $senha) {
        $this->load->library('encrypt');
        
        $salt = $this->getSalt($email);
        
        if ($salt) {    
            $this->db->select('id, email, pass');
            $this->db->from($this->db->dbprefix('user'));
            $this->db->where('email', $email);
            $this->db->where('pass', $this->encrypt->sha1($senha.$salt[0]->salt));
            $this->db->limit(1);
            
            $query = $this->db->get();
        
            if($query->num_rows() == 1) {
                return $query->result();
            }
        }
        
        return false;
        
    }
    
    function getSalt($email) {
        $this->db->select('salt');
        $this->db->from($this->db->dbprefix('user'));
        $this->db->where('email', $email);
        $this->db->limit(1);
        
        $query = $this->db->get();
    
        if($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }    
    }
    
    function getAuthorization($user_id, $action = 'view') {
        $this->db->select('id, '.$action);
        $this->db->from($this->db->dbprefix('user'));
        $this->db->where('id', $user_id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function isAdmin($user_id) {
        $this->db->select('admin');
        $this->db->from($this->db->dbprefix('user'));
        $this->db->where('id', $user_id);
        $this->db->limit(1);
        
        $query = $this->db->get();
        $result = $query->result();
        
        return $result[0]->admin;
    }
    
    function checkEmail($email) {
        $this->db->select('email');
        $this->db->from($this->db->dbprefix('user'));
        $this->db->where('email', $email);
        $this->db->limit(1);
        
        $query = $this->db->get();
        
        if($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    
    function recoveryPass($info) {
        $data = array(  'salt' => $info['salt'],
                        'pass' => $info['pass']
                    );
        
        $this->db->where('email',$info['email']);
        
        return ($this->db->update($this->db->dbprefix('user'), $data))?true:false;
    }    
}
?>