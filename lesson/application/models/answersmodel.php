<?php

class Answersmodel extends CI_Model {
    public function getAnswers($question_id = 0) {
        $rv = null;
        if ($question_id) {
            $this->db->from('answers');
            $this->db->where('question_id', $question_id);
            $this->db->order_by('answer_id','asc');
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $rv[$row->answer_id] = $row;
                }
            }
        }
        return $rv;
    }

    public function checkAnswers($ans = array()) {
        $rv = array();
        if (isset($ans) && count($ans)) {
            foreach ($ans as $q=>$a) {
                $this->db->from('answers');
                $this->db->where('question_id', $q);
                $this->db->where('answer_id', $a);
                $query = $this->db->get();
                if ($query && $query->result()) {
                    foreach ($query->result() as $row) {
                        if ($row->correct == 0) {
                            $rv[$row->question_id]=$row->answer_id;
                        }
                    }
                }
            }
        }
        return $rv;
    }

    public function recordAnswers($answers = '', $user_id = 0) {
        if ($user_id) {
            $data = array('answers'=>$answers);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

}
