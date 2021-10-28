<?php

namespace Helpers;

use Exception;

class Client
{
    private $method;
    private $url;
    private $headers;

    public function __construct($method, $url, $headers = null)
    {
        $this->method = strtoupper($method);
        $this->url = $url;
        $this->headers = $headers;
    }


    // Send the request
    public function send($data)
    {
        $result = false;

        try {
            $curl = curl_init();

            $data = json_encode($data);

            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $this->method,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => $this->headers,
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $result = json_decode($response);
        } catch (Exception $e) {
            $result = false;
        } finally {
            return $result;
        }
    }
}
