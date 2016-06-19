<?php

class Order extends CI_Controller {

    public function index() {
        $this->load->view('html_header');
        $user_id = $this->session->userdata('userid');
        $this->load->view('order');
        $this->load->view('html_footer');
    }
}
