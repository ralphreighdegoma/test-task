<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

    public function get_all_employees() {
        // Get all employees from the 'employees' table
        //also get the created by user details
        $this->db->select('employees.*, users.username as created_by');
        $this->db->join('users', 'users.id = employees.created_by');
        return $this->db->get('employees')->result();
    }

    public function insert_employee($data) {
        // Insert a new employee record into the 'employees' table
        $this->db->insert('employees', $data);
        return $this->db->insert_id();
    }

    public function get_employee_by_id($id) {
        // Get an employee record by ID from the 'employees' table
        return $this->db->get_where('employees', array('id' => $id))->row();
    }

    public function update_employee($id, $data) {
        // Update an existing employee record in the 'employees' table
        $this->db->where('id', $id);
        $this->db->update('employees', $data);
    }

    public function delete_employee($id) {
        // Delete an employee record from the 'employees' table
        $this->db->where('id', $id);
        $this->db->delete('employees');
    }

}
