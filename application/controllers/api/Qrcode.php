<?php

require_once(APPPATH . 'services/Qrcode_service.php');

class Qrcode extends CI_Controller {

    protected $qr_service;
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->qr_service = new Qrcode_service();
    }

    public function generate($id) {
        $qrcode = $this->qr_service->generate($id);
        $this->output->set_output($qrcode);
    }

}
