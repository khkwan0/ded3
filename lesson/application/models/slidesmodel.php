<?php

class SlidesModel extends CI_Model {
    public function getSlides($unit = 0, $section = '', $issue = 0) {
        $slides = array();
        if (is_numeric($unit) && is_numeric($issue)) {
            $this->db->where('unit', $unit);
            $this->db->where('section', $section);
            $this->db->where('issue', $issue);
            $this->db->from('issues');
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $slides[$row->slide] = $row;
                }
            }
        }
        return $slides;
    }
}
