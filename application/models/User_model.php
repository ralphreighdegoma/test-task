<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Insert a new user into the database
    public function insert_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    // Get user details by ID
    public function get_user_by_id($user_id) {
        return $this->db->get_where('users', array('id' => $user_id))->row();
    }

    public function get_user_by_username($username) {
        return $this->db->get_where('users', array('username' => $username))->row();
    }

    // Get all users
    public function get_all_users() {
        $this->db->select('id, username, user_type, datetime_added, datetime_modified');
        return $this->db->get('users')->result();
    }

    // Update user details
    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('users', $data);
    }

    // Delete a user
    public function delete_user($user_id) {
        $this->db->where('id', $user_id);
        $this->db->delete('users');
    }
}
