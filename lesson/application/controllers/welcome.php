<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
        $css = array('common.css','welcome.css');
        $this->load->view('html_header', array('css'=>$css));
		$this->load->view('welcome_message');
        $this->load->view('html_footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
