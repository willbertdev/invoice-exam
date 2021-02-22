<?php 

class Products_model extends CI_Model {

    public function getAll() {
        //sub queries
        $qty = "(SELECT (p.quantity - SUM(il.qty)) FROM invoice_lines il WHERE il.product_id = p.id GROUP BY il.product_id)";
        $select = "*";
        
        $select .= ", $qty total_qty";

        $this->db->select($select);
        $q = $this->db->where('status', 1)
            ->get('products p');

        if ($q->num_rows() > 0) {
            return $q->result_array();
        }

        return[];
    }

    public function find($where = []) {
        if (!empty($where)) {
            $q = $this->db->where($where)
                ->get('products');
            
            if ($q->num_rows() > 1) {
                return $q->result_array();
            } else if ($q->num_rows() == 1) {
                return $q->row_array();
            }
            
        }

        return [];
    }
}