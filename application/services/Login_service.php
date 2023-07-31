<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Service {
    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        // Load any necessary models or libraries here
        $this->CI->load->model('User_model'); // Replace 'user_model' with your user model name
    }

    public function login($username, $password) {
        // Retrieve the user by username from the database
        $user = $this->CI->User_model->get_user_by_username($username);

        if ($user && password_verify($password, $user->password)) {
            // Passwords match, set user data in the session
            $this->CI->session->set_userdata('user_id', $user->id);
            $this->CI->session->set_userdata('username', $user->username);
            return $user;
        } else {
            // Invalid credentials
            return false;
        }
    }

    public function logout() {
        $this->CI->session->unset_userdata('user_id');
        $this->CI->session->unset_userdata('username');
    }
}
