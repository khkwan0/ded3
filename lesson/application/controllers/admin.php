<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LessonsModel');
        if (!$this->session->userdata('is_admin')) {
            show_404();
        }
    }

    public function index() {
        $this->load->model('usersmodel');
        $users = $this->usersmodel->getUsers();
        $this->load->view('html_header');
        $this->load->view('admin', array('users'=>$users));
        $this->load->view('html_footer');
    }

    public function slides() {
        $lessons = $this->LessonsModel->getLessons();
        $this->load->view('html_header');
        $this->load->view('quest_admin', array('lessons'=>$lessons));
        $this->load->view('html_footer');
    }

}
