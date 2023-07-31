<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Timelog_model extends CI_Model {

    public function get_all_logs() {
        // Get all timelogs from the 'timelogs' table and connect it to employees table
        $this->db->select('timelogs.id, timelogs.employee_id, timelogs.date_added, timelogs.time_in, timelogs.time_out, employees.first_name, employees.last_name');
        $this->db->from('timelogs');
        $this->db->join('employees', 'employees.id = timelogs.employee_id');
        $this->db->order_by('timelogs.id', 'DESC');
        return $this->db->get()->result();
    }

    public function insert_timelog($data) {
        // Insert a new timelog record into the 'timelogs' table
        $this->db->insert('timelogs', $data);
        return $this->db->insert_id();
    }

    public function has_both_timein_timeout($data) {
        //check if timeout and timein already filled
        $check_done = $this->db->get_where('timelogs', array('employee_id' => $data['employee_id'], 'date_added' => $data['date_added'], 'time_in !=' => NULL, 'time_out !=' => NULL))->row();
        if ($check_done) {
            return true;
        } else {
            return false;
        }
    }

    //check if employee exist
    public function is_employee_exist($id) {
        $check_employee = $this->db->get_where('employees', array('id' => $id))->row();
        if ($check_employee) {
            return true;
        } else {
            return false;
        }
    }

    public function tooFast($data) {
        //check if timein is less than 1 hour
        $check_done = $this->db->get_where('timelogs', array('employee_id' => $data['employee_id'], 'date_added' => $data['date_added'], 'time_in !=' => NULL))->row();
        if ($check_done) {
            $time_in = strtotime($check_done->time_in);
            $time_out = time();
            $diff = $time_out - $time_in;

            $hours = $diff / ( 60 * 60 );
            if ($hours < 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }

    public function check_timelog($data) {
        // Get an timelog record by ID from the 'timelogs' table
        return $this->db->get_where('timelogs', $data)->row();
    }

    public function update_timelog($id, $data) {
        // Update an existing timelog record in the 'timelogs' table
        $this->db->where('employee_id', $id);
        $this->db->where('date_added', $data['date_added']);
        $this->db->update('timelogs', $data);
    }

    public function delete_timelog($id) {
        // Delete an timelog record from the 'timelogs' table
        $this->db->where('id', $id);
        $this->db->delete('timelogs');
    }


}
