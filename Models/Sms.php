<?php

namespace Models;

use Helpers\Dbh;

class Sms extends Dbh
{
    public function getAllSms()
    {
        $sql = "SELECT id, phone, sms, delivery FROM smses";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function createSms($smsId, $phone, $sms, $delivery)
    {
        $sql = "INSERT INTO smses (sms_id, phone, sms, delivery) VALUES(?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$smsId, $phone, $sms, $delivery]);
    }

    public function changeSmsStatus ($status, $smsId) {
        $sql = "UPDATE smses SET delivery = ? WHERE sms_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$status, $smsId]);
    }
}
