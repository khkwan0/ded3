<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HandleLogin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
        $this->load->helper('url');
    }

    public function index() {
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.3/oauth/access_token?client_id=1678968362360848&redirect_uri=https://caldrivers.com/lesson/handlelogin&client_secret=2dadc33d25f58bd687addf85d3701e04&code=".$code);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $output = curl_exec($ch);
            $decode = json_decode($output);
            if (isset($decode->access_token)) {
                curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/debug_token?input_token=".$decode->access_token."&access_token=1678968362360848|2dadc33d25f58bd687addf85d3701e04");
                $output2 = curl_exec($ch);
                curl_close($ch);
                $access = json_decode($output2);
                if (isset($access->data->is_valid) && $access->data->is_valid) {
                    $user_id = $this->usersmodel->getUserIDFB($access->data->user_id, $decode->access_token);
                    $is_admin = $this->usersmodel->isAdmin($user_id);
                    if ($user_id) {
                        $this->session->set_userdata('user_id', $user_id);
                        $this->session->set_userdata('is_fb', 1);
                        $this->session->set_userdata('access_token', $decode->access_token);
                        if ($is_admin) {
                            $this->session->set_userdata('is_admin', 1);
                        }
                        redirect('/status/',302);
                    }
                }
            }
        } else {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            if ($user = $this->usersmodel->verify($email, $pass)) {
                if (isset($user['user_id'])) {
                    $this->session->set_userdata('user_id', $user['user_id']);
                    if (isset($user['is_admin']) && $user['is_admin']) {
                        $this->session->set_userdata('is_admin', 1);
                    }
                    redirect('/status/',302);
                }
            } else {
                $css = array('common.css','welcome.css');
                $this->load->view('html_header', array('css'=>$css));
                $this->load->view('welcome_message', array('error'=>'Either this account does not exist or it is already registered under Facebook.  Try logging in with the Facebook button'));
                $this->load->view('html_footer');
            }
        }
    }
}
