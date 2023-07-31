<?php

require_once(APPPATH . 'services/Employee_service.php');


class Employee extends CI_Controller {

    protected $employee_service;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session'); // Load the session library

        $this->load->helper('auth'); // Load the custom auth helper
        // Check if the user is logged in
        if (!is_user_logged_in()) {
            return array('status' => false, 'message' => 'Unauthorized access');
        }
        $this->employee_service = new Employee_service();
    }

    public function index() {
        $employees = $this->employee_service->get_all_employees();

        // Set the response content type to JSON
        $this->output->set_content_type('application/json');

        // Send the JSON-encoded data as the response
        $this->output->set_output(json_encode($employees));
    }

    public function create() {
        $user_id = $this->session->userdata('user_id');

        $data = array(
            'first_name' => $this->input->post('first_name'),
            'last_name' => $this->input->post('last_name'),
            'created_by' => $user_id
        );

        $user_id = $this->employee_service->insert_employee($data);
        $this->output->set_output(json_encode($user_id));

    }

    public function update_user($user_id) {
        $data = array(
            'user_name' => 'Admin',
            'user_password' => 'loopign123',
            'user_type' => 2
        );

        $this->employee_service->update_user($user_id, $data);
    }

    public function delete_user($user_id) {
        $this->employee_service->delete_user($user_id);
    }
}
