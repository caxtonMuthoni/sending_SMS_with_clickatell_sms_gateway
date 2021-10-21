<?php
include '../Helpers/Dbh.php';
include '../Helpers/Client.php';
include '../services/SmsService.php';
include '../Models/Sms.php';
include '../controllers/SmsController.php';
session_start();

$errors = [];

function prepareInput($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input);

    return $input;
}

function validateInput($input, $value)
{
    if (!$value) {
        $GLOBALS['errors'][$input] = "The $input field is required !";
    }
}

if (isset($_POST['sendSMS'])) {
    $phone =  prepareInput($_POST['phone']);
    $sms =  prepareInput($_POST['sms']);

    validateInput("sms", $sms);
    validateInput("phone number", $phone);

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location:../index.php');
    } else {
        $smsController = new SmsController();
        $smsController->sendSms($phone, $sms);
    }
}
