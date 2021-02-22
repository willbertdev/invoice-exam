<?php 

class Auth_model extends CI_Model {


    public function checkLogin() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $where = [
            'email' => $email,
            'password' => md5($password)
        ];

        $q = $this->db->where($where)
            ->get('employees');

        if ($q->num_rows() > 0) {
            return $q->row_array();
        }

        return false;
    }
}