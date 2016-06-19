<?php

class LessonsModel extends CI_Model {
    public function getLessons($units = array(), $sections = array()) {
        $res = array();
        $this->db->from('issues');
        $query = $this->db->get();
        if ($query && $query->result()) {
            foreach ($query->result() as $row) {
                $res[$row->unit][$row->section][$row->issue] = $row->lesson;
            }
        }
        return $res;
    }

    public function saveLesson($unit = 0, $section = '', $issue = 0, $slide,  $lesson_text = '') {
        $rv = 0;
        if (is_numeric($unit) && (strlen($section)<3) && (strlen($section)>0) && is_numeric($issue) && (strlen($slide)<3) && (strlen($slide)>0)) {
            $timestamp = date('Y-m-d H:i:s', time());
            $lesson_text = mysql_real_escape_string($lesson_text);
            $query = "insert into issues(`id`,`unit`,`section`,`lesson`,`issue`,`datetime`,`order`,`slide`) values(0,$unit,'$section','$lesson_text',$issue,'$timestamp',0,'$slide') on duplicate key update lesson='$lesson_text',datetime='$timestamp'";
            $this->db->query($query);
            $rv = $this->db->affected_rows();
        }
        return $rv;
    }
}
