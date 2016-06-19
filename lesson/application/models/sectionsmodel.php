<?php

class SectionsModel extends CI_Model {
    public function getSections($unit = 0) {
        $res = array();
        if (is_numeric($unit)) {
            $this->db->select('section');
            $this->db->from('issues');
            $this->db->where('unit', $unit);
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $res[$row->section] = $row;
                }
            }
        }
        return $res;
    }
}
