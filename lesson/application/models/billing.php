<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends CI_Model {

    public function createInvoice($user_id = 0, $amount = 0.00) {
        $rv = null; 
        if ($user_id) {
            $ref_id = $user_id.time().'-'.rand(5000,9999);
            $data = array(
                    'ref_id'    =>  $ref_id,
                    'user_id'   =>  $user_id,
                    'amount'    =>  $amount,
                    'datetime'  =>  date('Y-m-d H:i:s', time()),
                    'status'    =>  'pending',
                    );
            $this->db->insert('invoice', $data);
            $rv = array(
                    'invoice_id'    =>  $this->db->insert_id(),
                    'ref_id'        =>  $ref_id
                    );
        }
        return $rv;
    }

    public function saveStatus($invoice_id = 0, $res = '') {
        if ($invoice_id) {
            $data = array(
                    'status'    =>  $res
                    );
            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice', $data);
            $rv = $this->db->affected_rows();
        }
        return $rv;
    }
}
