<?php

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function login() {
        $content_data['content'] = $this->load->view('auth/login', '', true);
        $this->load->view('layouts/auth_layouts', $content_data);
    }


}
