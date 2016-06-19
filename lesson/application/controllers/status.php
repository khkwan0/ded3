<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Status extends CI_Controller {
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
            if ($this->session->userdata('is_fb')) {
                $fb_info = $this->usersmodel->getFBInfo($this->session->userdata('access_token'));
            }
            $this->load->view('html_header', array('css'=>array('welcome.css')));
            $issue_id = $this->usersmodel->getProgress($user_id);
            $meta = $this->issuesmodel->getMetaFromIssueID(--$issue_id);
            if (isset($fb_info)) {
                $this->load->view('status', array('issue_id'=>$issue_id,'meta'=>$meta,'fb_info'=>$fb_info));
            } else {
                $this->load->view('status', array('issue_id'=>$issue_id,'meta'=>$meta));
            }
            $this->load->view('html_footer');
        } else {
            redirect('/', 302);
        }
    }
}
