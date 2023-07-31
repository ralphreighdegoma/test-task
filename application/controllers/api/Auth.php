<?php

require_once(APPPATH . 'services/Login_service.php');


class Auth extends CI_Controller {

    protected $login_service;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->login_service = new Login_service();
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->login_service->login($username, $password);

        if($user) {
            $this->output->set_output(json_encode(array('status' => true, 'user' => $user)));
        } else {
            $this->output->set_output(json_encode(array('status' => false, 'message' => 'Invalid username or password')));
        }
    }


}
