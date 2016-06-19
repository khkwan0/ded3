<?php

class Questionsmodel extends CI_Model {

    public function createQuestion($question = '', $answers = array(), $correct = 0, $unit = 0) {
        $rv = 0;
        if ($question && $unit) {
            $datetime = date('Y-m-d H:i:s', time());
            $data = array('question'    =>  $question,
                          'create_time' =>  $datetime,
                          'last_update' =>  $datetime,
                          'unit'        =>  $unit
                    );
            $this->db->insert('questions', $data);
            $rv = $this->db->insert_id();
            if ($rv) {
                $i = 1;
                foreach ($answers as $answer) {
                    $data = array('question_id' =>  $rv,
                                  'answer'      =>  $answer['text'],
                            );
                    if ($i == $correct) {
                        $data['correct'] = 1;
                    } else {
                        $data['correct'] = 0;
                    }
                    $this->db->insert('answers', $data);
                    $i++;
                }
            }
        }
        return $rv;
    }

    public function getQuestions($id = 0) {
        $rv = array();
        if ($id) {
            $this->db->where('id',$id);
        }
        $this->db->from('questions');
        $this->db->order_by('unit','asc');
        $query = $this->db->get();
        if ($query->result() && $query->num_rows()) {
            foreach ($query->result() as $row) {
                $rv[$row->id] = $row;
            }
        }
        return $rv;
    }

    public function getQuestionsByUnit($unit = 0) {
        $rv = array();
        if ($unit && is_numeric($unit)) {
            $this->db->from('questions');
            if ($unit != 69) {  // if you pass in 69, then you get questions from all units
                $this->db->where('unit', $unit);
            }
            $this->db->where('active', 1);
            $query = $this->db->get();
            if ($query->result() && $query->num_rows()) {
                foreach ($query->result() as $row) {
                    $rv[$row->id] = array('question'   =>  $row->question);
                }
            }
        }
        return $rv;
    }

    public function updateQuestion($id = 0, $question = '', $unit = 0, $answers = array(), $correct = 0) {
        $rv = 0;
        if ($id && $question && $unit) {
            $datetime = date('Y-m-d H:i:s', time());
            $data = array('question'        =>  $question,
                          'last_update'     =>  $datetime,
                          'unit'            =>  $unit
                    );
            $this->db->where('id', $id);
            $this->db->update('questions', $data);
            $rv = $this->db->affected_rows();
            $i = 1;
            foreach ($answers as $answer) {
                $is_correct = 0;
                if ($i == $correct) {
                    $is_correct = 1;
                }
                $data = array('answer'  =>  $answer['text'],
                              'correct' =>  $is_correct
                        );
                $this->db->where('answer_id', $answer['id']);
                $this->db->where('question_id', $id);
                $this->db->update('answers', $data);
                $rv = $this->db->affected_rows();
                $i++;
            }
        }
        return $rv;
    }

    public function toggleQuestion($id = 0, $active = 0) {
        $rv = 0;
        if ($id) {
            $datetime = date('Y-m-d H:i:s', time());
            $data = array('active'      =>  $active,
                          'last_update' =>  $datetime
                    );
            $this->db->where('id', $id);
            $this->db->update('questions', $data);
            $rv = $this->db->affected_rows();
        }
        return $rv;
    }
}
