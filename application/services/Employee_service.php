<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Qrcode_service.php'); // Make sure to provide the correct path

class Employee_service {

    private $CI;
    public $qr_service;

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->model('Employee_model');
        $this->qr_service = new Qrcode_service();
    }

    // Create a new employee
    public function insert_employee($data) {
        return $this->CI->Employee_model->insert_employee($data);
    }

    // Get employee details by ID
    public function get_employee_by_id($employee_id) {
        return $this->CI->Employee_model->get_employee_by_id($employee_id);
    }

    // Get all employees
    public function get_all_employees() {
        $employees = $this->CI->Employee_model->get_all_employees();
        return $employees;
    }

    // Update employee details
    public function update_employee($employee_id, $data) {
        $this->CI->Employee_model->update_employee($employee_id, $data);
    }

    // Delete an employee
    public function delete_employee($employee_id) {
        $this->CI->Employee_model->delete_employee($employee_id);
    }
}
