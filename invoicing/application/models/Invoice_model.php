<?php 

class Invoice_model extends CI_Model {

    public function getAll() {
        // sub queries
        $total = "(SELECT SUM(price_total) FROM invoice_lines il WHERE il.invoice_id = i.id GROUP BY il.invoice_id)";
        
        $select = "*, i.id invoice_id, i.created_at invoice_date";
        $select .= ", $total total";

        $this->db->select($select);
        $this->db->join('customers c', 'c.id=i.customer_id', 'left');

        $q = $this->db->get('invoice i');
        
        if ($q->num_rows() > 0) {
            return $q->result_array();
        }

        return [];
    }

    public function getSales($where = "") {
        // sub queries
        
        $select = "i.created_at";
        $select .= ", SUM(il.price_total) total";

        $this->db->select($select);
        $this->db->join('customers c', 'c.id=i.customer_id', 'left');
        $this->db->join('invoice_lines il', 'il.invoice_id=i.id', 'left');

        if ($where) {
            switch ($where) {
                case 'day':
                    $this->db->where('DAY(i.created_at)', 'DAY(NOW())', FALSE);
                    $this->db->where('MONTH(i.created_at)', 'MONTH(NOW())', FALSE);
                    $this->db->where('YEAR(i.created_at)', 'YEAR(NOW())', FALSE);
                    break;
                case 'month':
                    $this->db->where('MONTH(i.created_at)', 'MONTH(NOW())', FALSE);
                    $this->db->where('YEAR(i.created_at)', 'YEAR(NOW())', FALSE);
                    break;
                case 'year':
                    $this->db->where('YEAR(i.created_at)', 'YEAR(NOW())', FALSE);
                    break;
            }

        }

        $this->db->group_by('DAY(i.created_at), MONTH(i.created_at), YEAR(i.created_at)');

        $q = $this->db->get('invoice i');
        // echo $this->db->last_query(); exit;
        if ($q->num_rows() > 0) {
            if ($where) {
                return $q->row_array();
            } else {
                return $q->result_array();
            }
        }

        return [];
    }

    public function add() {
        $this->db->trans_begin();
        $customer_id = $this->input->post('customer');
        $note = $this->input->post('note');

        $invoiceData = array(
            'employee_id' => get_employee('id'),
            'customer_id' => $customer_id,
            'note' => $note,
            'status' => 1,
            'created_at' => now(),
        );

        $this->db->insert('invoice', $invoiceData);
        $invoice_id = $this->db->insert_id();
        $products = json_decode($this->input->post('products'));

        foreach ($products as $product) {
            $invoiceLineData = array(
                'invoice_id' => $invoice_id,
                'product_id' => $product->product_id,
                'qty' => $product->qty,
                'price_total' => $product->total,
                'created_at' => now()
            );

            $lastInsert = $this->db->insert('invoice_lines', $invoiceLineData);
        }

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
}