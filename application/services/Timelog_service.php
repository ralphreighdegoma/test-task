<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Timelog_service  {

    private $CI;

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->model('Timelog_model');
    }

    // Create a new log
    public function insert_timelog($data) {
        return $this->CI->Timelog_model->insert_timelog($data);
    }

    // Get all logs
    public function get_all_logs() {
        return $this->CI->Timelog_model->get_all_logs();
    }

    //log in or logout
    public function log($id) {

        //check timelogs if employee id exist on today
        $data = array(
            'employee_id' => $id,
            'date_added' => date('Y-m-d')
        );
        $check = $this->CI->Timelog_model->check_timelog($data);
        $check_done = $this->CI->Timelog_model->has_both_timein_timeout($data);
        $too_fast = $this->CI->Timelog_model->tooFast($data);
        $is_employee_exist = $this->CI->Timelog_model->is_employee_exist($id);

        if(!$is_employee_exist) {
            return array('message' => 'Qrcode cant be found.');
        }

        if($check_done){
            return array('message' => 'Already logged in and out.');
        }

        if($too_fast){
            return array('message' => 'Thanks for coming, have a nice day.');
        }



        if($check){
            //update timelog
            $data = array(
                'employee_id' => $id,
                'date_added' => date('Y-m-d'),
                'time_out' => date('H:i:s')
            );
            return $this->CI->Timelog_model->update_timelog($id, $data);
        }else{
            //insert timelog
            $data = array(
                'employee_id' => $id,
                'date_added' => date('Y-m-d'),
                'time_in' => date('H:i:s')
            );
            return $this->CI->Timelog_model->insert_timelog($data);
        }

    }

}