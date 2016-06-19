<?php

class Congrats extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->load->view('html_header');
            $this->load->view('welcome_message');
            $this->load->view('html_footer');
        }
        $this->load->helper('url');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $this->load->model('usersmodel');
            $this->load->view('html_header', array('css'=>array('welcome.css')));
            if ($user_id && $this->usersmodel->passed($user_id)) {
                $this->load->view('congrats');
            } else {
                $this->load->view('error');
            }
            $this->load->view('html_footer');
        } else {
            redirect('/',302);
        }
    }
}
