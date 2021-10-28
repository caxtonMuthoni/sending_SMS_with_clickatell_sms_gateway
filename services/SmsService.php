<?php

namespace services;

use Helpers\Client;

class SmsService
{
    // private $apiKey = "om61-2RkQeyiTjy7kPLbtg==";
    private $apiKey = "LD0af1ewSkC83Sx1AVJFsA==";

    public function sendSms($phone, $sms)
    {
        $headers = array(
            "Authorization: $this->apiKey",
            "Content-Type: application/json"
        );

        $client = new Client('POST', "https://platform.clickatell.com/messages/", $headers);
        $data = array(
            "content" => $sms,
            "to" => [
                $phone
            ]
        );

        return $client->send($data);
    }
}
