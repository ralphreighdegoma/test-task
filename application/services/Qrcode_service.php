<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Qrcode_service  {

    private $CI;

    public function __construct() {
        $this->CI = &get_instance();
    }


    public function generate($employee_id) {

        // Load the QR code library (endroid/qr-code)
        require_once APPPATH . '../vendor/autoload.php';

        $writer = new PngWriter();

        $qrCode = QrCode::create($employee_id)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic label
        $label = Label::create('')
        ->setTextColor(new Color(255, 0, 0));

        $result = $writer->write($qrCode, null, $label);

        header('Content-Type: '.$result->getMimeType());
        return $result->getString();
    }
}