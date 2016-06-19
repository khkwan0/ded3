<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Dmvdisclaimer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $css = array('welcome.css');
        $random_background = $this->getRandomBackground();
        $this->load->view('html_header', array('css'=>$css, 'background'=>$random_background));
        $this->load->view('dmvdisclaimer');
        $this->load->view('html_footer');
    }

    private function getRandomBackground() {
        $dir = '/home/ken/public_html/ded/lesson/assets/img/lesson';
        $files = scandir($dir,1);
        return $files[rand(1, count($files)-2)];
    }
}
