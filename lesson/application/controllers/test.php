<?php

class Test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('questionsmodel');
        $this->load->model('issuesmodel');
        $this->load->helper('url');
    }

    public function index() {

    }

    public function admin() {
        if ($this->session->userdata('user_id') && $this->session->userdata('is_admin')) {
            $questions = $this->questionsmodel->getQuestions();
            $this->load->view('html_header');
            $this->load->view('test_admin', array('questions'=>$questions));
            $this->load->view('html_footer');
        } else {
            show_404();
        }
    }

    public function quiz($unit = 0) {
        if ($user_id = $this->session->userdata('user_id')) {
            $this->load->model('answersmodel');
            $this->load->model('usersmodel');
            if ($this->usersmodel->validQuiz($unit, $user_id)) {
                if ($unit && is_numeric($unit)) {
                    $questions = $this->questionsmodel->getQuestionsByUnit($unit);
                    if (isset($questions) && count($questions)) {
                        foreach($questions as $question_id=>$question) {
                            $questions[$question_id]['answers'] = $this->answersmodel->getAnswers($question_id);
                        }
                    }
                    $is_final = ($unit == 69)?1:0;
                    $css = array('welcome.css');
                    $random_background = $this->getRandomBackground();
                    $issue = $this->issuesmodel->getLastIssueByUnit($unit);
                    $next = $this->issuesmodel->getNextIssueByUnit($unit);
                    $user_info = $this->usersmodel->getUserInfo($user_id);
                    $email = $user_info['email'];
                    $this->load->view('html_header', array('css'=>$css, 'background'=>$random_background));
                    $this->load->view('quiz', array('questions'=>$questions, 'next'=>$next, 'issue'=>$issue, 'unit'=>$unit, 'is_final'=>$is_final,'email'=>$email));
                    $this->load->view('html_footer');
                }
            }
        } else {
            redirect('/', 302);
        }
    }

    private function getRandomBackground() {
        $dir = '/home/ken/public_html/ded/lesson/assets/img/lesson';
        $files = scandir($dir,1);
        return $files[rand(1, count($files)-2)];
    }
}
