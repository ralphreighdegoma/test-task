<?php

require_once(APPPATH . 'services/User_service.php'); // Make sure to provide the correct path


class User extends CI_Controller {

    protected $user_service;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->user_service = new User_service();
    }

    public function index() {
        $users = $this->user_service->get_all_users();
        // Set the response content type to JSON
        $this->output->set_content_type('application/json');

        // Send the JSON-encoded data as the response
        $this->output->set_output(json_encode($users));
    }

    public function create() {
        //get post data using $this->input->post
        $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $hashed_password,
            'user_type' => $this->input->post('user_type')
        );

        $user_id = $this->user_service->insert_user($data);
        $this->output->set_output(json_encode($user_id));

    }

    //create a dummy admin as a start
    public function create_dummy_user() {
        $hashed_password = password_hash('12345', PASSWORD_DEFAULT);
        $data = array(
            'username' => 'admin',
            'password' => $hashed_password,
            'user_type' => 1
        );

        $user = $this->user_service->create_user($data);
    }

    public function view_user($user_id) {
        $user = $this->user_service->get_user_by_id($user_id);
    }


    public function update_user($user_id) {
        $data = array(
            'user_name' => 'Admin',
            'user_password' => 'loopign123',
            'user_type' => 2
        );

        $this->user_service->update_user($user_id, $data);
    }

    public function delete_user($user_id) {
        $this->user_service->delete_user($user_id);
    }
}
