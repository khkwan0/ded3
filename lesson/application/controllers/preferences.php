<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preferences extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('html_header');
        $this->load->view('preferences');
        $this->load->view('html_footer');
    }
}
