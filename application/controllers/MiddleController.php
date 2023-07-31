<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MiddleController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('auth'); // Load the custom auth helper
        // Check if the user is logged in
        if (!is_user_logged_in()) {
            redirect('login'); // Replace 'login' with the URL of your login page
        }
    }

}
