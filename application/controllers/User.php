<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function index() {
        $content_data['content'] = $this->load->view('users/list', '', true);
        $this->load->view('layouts/layouts', $content_data);
    }

    public function create() {
        $content_data['content'] = $this->load->view('users/create', '', true);
        $this->load->view('layouts/layouts', $content_data);
    }

}
