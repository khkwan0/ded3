<?php

class Ajax extends CI_Controller {

    public function preferenceChange() {
        $this->load->model('preferences');
        $key = $this->input->post('key');
        $val = $this->input->post('val');
        $this->preferencesmodel->changePreference($key, $value);
    }

    public function saveLesson() {
        $this->load->model('lessonsmodel');
        $unit = $this->input->post('unit');
        $section = $this->input->post('section');
        $issue = $this->input->post('issue');
        $slide = $this->input->post('slide');
        $lesson_text = $this->input->post('lesson_text');
        $rv = $this->lessonsmodel->saveLesson($unit, $section, $issue, $slide, $lesson_text);
        echo $rv;
    }

    public function getSections() {
        $rv = '';
        $this->load->model('sectionsmodel');
        $unit = $this->input->post('unit');
        $rv = $this->sectionsmodel->getSections($unit);
        echo json_encode($rv);
    }

    public function getIssues() {
        $issues = '';
        $this->load->model('issuesmodel');
        $unit = $this->input->post('unit');
        $section = $this->input->post('section');
        $issues = $this->issuesmodel->getIssues($unit, $section);
        echo json_encode($issues);
    }

    public function getSlides() {
        $slides = '';
        $this->load->model('slidesmodel');
        $unit = $this->input->post('unit');
        $section = $this->input->post('section');
        $issue = $this->input->post('issue');
        $slides = $this->slidesmodel->getSlides($unit, $section, $issue);
        echo json_encode($slides);
    }

    public function createQuestion() {
        $this->load->model('questionsmodel');
        $question = $this->input->post('question');
        $question_id = $this->input->post('question_id');
        $answers = $this->input->post('answers');
        $correct = $this->input->post('correct');
        $unit = $this->input->post('unit');
        if ($question_id) {
            echo json_encode($this->questionsmodel->updateQuestion($question_id, $question, $unit, $answers, $correct));
        } else {
            echo json_encode($this->questionsmodel->createQuestion($question, $answers, $correct, $unit));
        }
    }

    public function getAnswers() {
        $this->load->model('answersmodel');
        $question_id = $this->input->post('question_id');
        if ($question_id) {
            echo json_encode($this->answersmodel->getAnswers($question_id));
        }
    }

    public function register() {
        $this->load->model('usersmodel');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        $user_id = $this->usersmodel->register($email, $pass);
        if ($user_id) {
            $this->session->set_userdata('user_id', $user_id);
        }
        echo $user_id;
    }

    public function getUnit() {
        $res = '';
        $unit = $this->input->post('unit');
        if ($unit && is_numeric($unit) && $this->session->userdata('user_id')) {
            $this->load->model('issuesmodel');
            $res = $this->issuesmodel->getUnit($unit);
        }
        echo json_encode($res);
    }

    public function checkAnswers() {
        $this->load->model('answersmodel');
        $rv = '';
        $qnas = $this->input->post('answers');
        $is_final = $this->input->post('is_final');
        if ($is_final) {  // we only care about recording the final exam answers
            $this->answersmodel->recordAnswers($qnas, $this->session->userdata('user_id'));
        }
        $ans = array();
        if (isset($qnas) && $qnas) {
            $qna = explode(';', $qnas);
            foreach ($qna as $qus) {
                if (isset($qus) && $qus) {
                    $temp = explode(',', $qus);
                    $ans[$temp[0]] = $temp[1];
                }
            }
            $rv = $this->answersmodel->checkAnswers($ans);
            if ($is_final && count($rv) == 0) {
                $this->load->model('usersmodel');
                $this->usersmodel->passFinal($this->session->userdata('user_id'));
                mail('ken@caldrivers.com,chris@caldrivers.com.com','passed','passed a test!');
            }
        }
        echo json_encode($rv);
    }
}
