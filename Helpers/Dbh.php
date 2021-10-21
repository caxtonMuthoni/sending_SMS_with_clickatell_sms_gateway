<?php

class Dbh
{
    private $host = 'localhost';
    private $user = 'root';
    private $dbName = 'sms';
    private $password =  '';

    protected function connect()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";
            $dbh = new PDO($dsn, $this->user, $this->password);
            return $dbh;
        } catch (PDOException $e) {
            die("Error:". $e);
        }
    }
}


// CREATE TABLE `sms`.`smses` ( `id` BIGINT NOT NULL AUTO_INCREMENT , `sms_id` VARCHAR(20) NOT NULL , `phone` VARCHAR(20) NOT NULL , `sms` TEXT NOT NULL , `delivery` VARCHAR(20) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;