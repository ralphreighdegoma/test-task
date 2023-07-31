<?php

class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('auth'); // Load the custom auth helper
        // Check if the user is logged in
        if (!is_user_logged_in()) {
            return array('status' => false, 'message' => 'Unauthorized access');
        }
    }

    public function index() {
        $content_data['content'] = $this->load->view('employees/list', '', true);
        $this->load->view('layouts/layouts', $content_data);
    }

    public function create() {
        $content_data['content'] = $this->load->view('employees/create', '', true);
        $this->load->view('layouts/layouts', $content_data);
    }

}
