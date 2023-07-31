<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->helper('auth'); // Load the custom auth helper
        // Check if the user is logged in
        if (!is_user_logged_in()) {
            redirect('login'); // Replace 'login' with the URL of your login page
        }
    }

    public function index() {
        $content_data['content'] = $this->load->view('dashboard/index', '', true);
        $this->load->view('layouts/layouts', $content_data);
    }


}
