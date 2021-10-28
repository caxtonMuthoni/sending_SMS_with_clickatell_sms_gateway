<?php

namespace controllers;

use Models\Sms;
use services\SmsService;

class SmsController
{

    public function allSmses () {
        $sms = new Sms();
        $smses = $sms->getAllSms();
        return $smses;
    }

    public function sendSms($phone, $sms)
    {
        $smsService = new SmsService;
        $response = $smsService->sendSms($phone, $sms);

        if ($response) {
            if ($response->messages) {
                $data = $response->messages[0];
                if ($data->accepted) {
                    $smsModel = new Sms();
                    $smsModel->createSms($data->apiMessageId, $data->to, $sms, 'accepted');
                    $_SESSION['success'] = "SMS was sent successfully to $data->to";
                } else if (isset($data->error)) {
                    $_SESSION['error'] = "SMS could not be sent due to $data->errorDescription";
                }
            }
        } else {
            $_SESSION['error'] = 'SMS could not be sent, Try again later';
        }

        header('Location:../index.php');
    }

    public function updateSmsStatus($status, $smsId) {
       $sms = new Sms();
       $sms->changeSmsStatus($status, $smsId);
    }
}
