<?php

require_once(APPPATH . 'services/Timelog_service.php');

class Timelog extends CI_Controller {

    protected $timelog_service;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->timelog_service = new Timelog_service();
    }

    public function index() {
        $logs = $this->timelog_service->get_all_logs();

        // Set the response content type to JSON
        $this->output->set_content_type('application/json');

        // Send the JSON-encoded data as the response
        $this->output->set_output(json_encode($logs));
    }

    public function log($id) {

        $logs = $this->timelog_service->log($id);

        if(isset($logs['message'])) {
            // send message "donen for today"
            $this->output->set_output(json_encode(array('status' => false, 'message' => $logs['message'])));
            return;
        }

        return $logs;
    }


}
