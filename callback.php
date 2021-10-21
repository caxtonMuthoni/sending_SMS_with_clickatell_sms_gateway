<?php

include './Helpers/Dbh.php';
include './Helpers/Client.php';
include './services/SmsService.php';
include './Models/Sms.php';
include './controllers/SmsController.php';

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get posted data
$data = json_decode(file_get_contents("php://input"));

if ($data) {
    if ($data->event) {
        $messageStatusUpdate = $data->event->messageStatusUpdate[0];

        if ($messageStatusUpdate->status === "DEVICE_ACK" || $messageStatusUpdate->status === "SENT_TO_SUPPLIER") {
            $status = 'delivered';
        } else {
            $status = 'error';
        }

        $smsController = new SmsController();
        $smsController->updateSmsStatus($status, $messageStatusUpdate->messageId);
    }
}
