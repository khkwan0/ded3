<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Overview extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usersmodel');
        $this->load->model('issuesmodel');
        $this->load->helper('url');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $css = array('lesson.css');
            $progress = $this->usersmodel->getProgress($user_id);
            $meta = $this->issuesmodel->getMetaFromIssueID($progress);
            $random_background = $this->getRandomBackground();
            $this->load->view('html_header', array('css'=>$css, 'background'=>$random_background));
            $units = $this->issuesmodel->getUnits();
            $this->load->view('overview', array('units'=>$units, 'meta'=>$meta));
            $this->load->view('html_footer');
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
