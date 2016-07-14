<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recover extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $css = array('welcome.css','common.css');
        $this->load->view('html_header', array('css'=>$css));
        $this->load->view('recover');
        $this->load->view('html_footer');
    }

    public function email() {
        $email = $this->input->post('email');
        if ($email) {
            $usersmodel = $this->load->model('usersmodel');
            $password = $this->usersmodel->getPasswordByEmail($email);
            if (!$password) {
                $css = array('welcome.css','common.css');
                $this->load->view('html_header', array('css'=>$css));
                $this->load->view('norecover');
                $this->load->view('html_footer');
            } else {
                mail($email, "caldrivers.com password-recovery", 'Your password is: '.$password);
                $this->load->helper('url');
                redirect('/','refresh');
            }
        }
    }
}
