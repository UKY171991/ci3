<?php
class Admin_model extends CI_Model {
    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('admins');
        return $query->num_rows() === 1;
    }
}
