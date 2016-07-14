<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Terms extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $css = array('welcome.css');
        $this->load->view('html_header');
        $this->session->userdata('userid');
        $random_background = $this->getRandomBackground();
        $this->session->userdata('userid');
        $this->load->view('terms', array('css'=>$css, 'background'=>$random_background));
        $this->load->view('html_footer');
    }

    private function getRandomBackground() {
        $dir = '/home/ken/public_html/ded/lesson/assets/img/lesson';
        $files = scandir($dir,1);
        return $files[rand(1, count($files)-2)];
    }
}
