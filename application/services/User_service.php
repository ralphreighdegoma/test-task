<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_service {

    private $CI;

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->model('User_model');
    }

    // Create a new user
    public function insert_user($data) {
        return $this->CI->User_model->insert_user($data);
    }

    // Get user details by ID
    public function get_user_by_id($user_id) {
        return $this->CI->User_model->get_user_by_id($user_id);
    }

    // Get all users
    public function get_all_users() {
        return $this->CI->User_model->get_all_users();
    }

    // Update user details
    public function update_user($user_id, $data) {
        $this->CI->User_model->update_user($user_id, $data);
    }

    // Delete a user
    public function delete_user($user_id) {
        $this->CI->User_model->delete_user($user_id);
    }
}
