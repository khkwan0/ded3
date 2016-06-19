<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $css = array('welcome.css','common.css');
        $this->load->view('html_header', array('css'=>$css));
        $this->load->view('register');
        $this->load->view('html_footer');
    }

    public function handleRegister() {
        $this->session->sess_destroy();
        $this->load->view('html_header', array('css'=>$css));
        $this->load->model('usersmodel');
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $user_id = $this->usersmodel->register($email, $pass);
        $this->session->set_userdata('user_id', $user_id);
        if ($user_id) {
            $this->load->view('preferences');
        }
        $this->load->view('html_footer');
    }
}
