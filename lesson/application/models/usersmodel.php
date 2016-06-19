<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function register($email = '', $pass = '') {
        $rv = 0;
        if ($email && $pass) {
            $data = array(
                    'id'            =>  0,
                    'email'         =>  $email,
                    'password'      =>  $pass,
                    'progress'      =>  '',
                    'preferences'   =>  '',
                    );
            $query = $this->db->insert('users', $data);
            $rv = $this->db->insert_id();
        }
        return $rv;
    }

    public function verify($email = '', $pass = '') {
        $rv = array();
        if ($email && $pass) {
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('password', $pass);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $row = $res[0];
                $rv = array(
                        'user_id'   =>  $row->id,  // user id
                        'is_admin'  =>  $row->is_admin
                        );
            } 
        }
        return $rv;
    }

    public function getProgress($user_id = 0) {
        $current_issue_id = 0;
        if ($user_id) {
            $this->db->select('progress');
            $this->db->from('users');
            $this->db->where('id',$user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $current_issue_id = $res[0]->progress;
            }
        }
        return $current_issue_id;
    }

    public function updateProgress($user_id = 0, $issue_id = 0) {
        if ($issue_id && $user_id) {
            $data = array('progress'=>$issue_id, 'last_action'=>date('Y-m-d H:i:s',time()));
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function updateQuizProgress($user_id = 0, $unit = 0) {
        if ($unit) {
            $data = array('quiz_entry'=>$unit, 'last_action'=>date('Y-m-d H:i:s', time()));
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function getQuizProgress($user_id = 0) {
        $quiz_id = 0;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $quiz_id = $res[0]->quiz_entry;
            }
        }
        return $quiz_id;
    }

    public function validQuiz($unit = 0, $user_id = 0) {
        $rv = false;
        if ($unit && $user_id) {
            $quiz_prog = $this->getQuizProgress($user_id);
            if ($quiz_prog >= $unit) {
                $rv = true;
            }
        }
        return $rv;
    }
    
    public function passFinal($user_id = 0) {
        if ($user_id ) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $data = array('passed_final'=>1, 'date_passed'=>date('Y-m-d H:i:s', time()));
                $this->db->where('id', $user_id);
                $this->db->update('users', $data);
            }
        }
    }

    public function getUserInfo($user_id = 0) {
        $rv = null;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $rv['email'] = $row->email;
                }
            }
        }
        return $rv;
    }

    public function passed($user_id = 0) {
        $rv = false;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if (isset($query) && count($query->result())) {
                $res = $query->result();
                $row = $res[0];
                if ($row->passed_final == 1) {
                    $rv = true;
                }
            }
        }
        return $rv;
    }

    public function saveUserData($user_id = 0, $user_data = '') {
        $rv = 0;
        if ($user_data && $user_id) {
            $data = array('mailing_info'=>$user_data);
            $this->db->update('users', $data);
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            $rv = $this->db->affected_rows();
        }
        return $rv;
    }

    public function getShippingInfo($user_id = 0) {
        $addy = null;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $this->db->select('mailing_info');
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $addy = $res[0]->mailing_info;
            }
        }
        return $addy;
    }

    public function getBillingInfo($user_id = 0) {
        $addy = null;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $this->db->select('billing_info');
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $addy = $res[0]->billing_info;
            }
        }
        return $addy;
    }

    public function getUsers() {
        $rv = array();
        $this->db->from('users');
        $this->db->order_by('last_action', 'desc');
        $query = $this->db->get();
        if ($query && $query->result()) {
            foreach ($query->result() as $row) {
                $rv[] = $row;
            }
        }
        return $rv;
    }

    public function getUserIDFB($fb_user_id = 0, $access_token = '') {
        $user_id = 0;
        if ($fb_user_id && $access_token) {
            $this->db->from('users');
            $this->db->where('fb_user_id', $fb_user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $row = $res[0];
                $user_id = $row->id;
            } else {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.5/me?fields=id%2Cname%2Cemail&access_token=".$access_token);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $output = curl_exec($ch);
                $decode = json_decode($output);
                $data = array(
                        'email'         =>  $decode->email,
                        'fb_name'       =>  $decode->name,
                        'fb_user_id'    =>  $decode->id,
                        'last_action'   =>  date('Y-m-d H:i:s', time()),
                        'fb_access_token'   =>  $access_token
                        );
                $query = $this->db->insert('users', $data);
                $user_id = $this->db->insert_id();
                curl_close($ch);
            }
        }
        return $user_id;
    }

    public function isAdmin($user_id = 0) {
        $is_admin = 0;
        if ($user_id ) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $row = $res[0];
                $is_admin = $row->is_admin;
            }
        }
        $is_admin = 1;
    }

    public function getFBInfo($access_token = '') {
        $info = null;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.5/me?fields=name%2Cpicture%2Cemail&access_token=".$access_token);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        $info = json_decode($output);
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v2.5/me/friends?fields=installed&access_token=".$access_token);
        $friend_output = curl_exec($ch);
        $friends = json_decode($friend_output);
        curl_close($ch);
        $info->friends = $friends;
        return $info;
    }

    public function saveBillingInfo($user_id, $billing_info) {
        if ($billing_info == 'same') {
            $data = array('billing_info' =>  'same');
        } else {
            $data = array('billing_info'    =>  base64_encode(json_encode($billing_info)));
        }
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
        $rv = $this->db->affected_rows();
    }

    public function updatePaid($user_id = 0, $cc = array()) {
        $rv = 0;
        if ($user_id) {
            $data = array(
                    'amount'    =>  $cc['amount'],
                    'paid'      =>  1
                    );
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
            $rv = $this->db->affected_rows();
        }
        return $rv;
    }
}
