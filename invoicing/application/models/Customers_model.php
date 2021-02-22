<?php 

class Customers_model extends CI_Model {

    public function getAll() {
        $q = $this->db->get('customers');
        
        if ($q->num_rows() > 0) {
            return $q->result_array();
        }

        return [];
    }
}