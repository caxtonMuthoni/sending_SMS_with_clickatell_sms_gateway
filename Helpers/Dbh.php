<?php

class Dbh
{
    // LocaL
    private $host = 'localhost';
    private $user = 'root';
    private $dbName = 'sms';
    private $password =  '';

    // PROD
    private $pro_host = 'ec2-3-221-100-217.compute-1.amazonaws.com';
    private $pro_user = 'sdispeutjztire';
    private $pro_dbName = 'dd65vnk0fkesid';
    private $pro_password =  'd34f9fda9ded172b5da6997f7cfc40958b27692f20ddd13c2354fbc6b2ffe026';

    protected function connect()
    {
        try {

            if ($_SERVER["SERVER_NAME"] == "localhost") {
                $dsn = "mysql:host=$this->host;dbname=$this->dbName";
                $dbh = new PDO($dsn, $this->user, $this->password);
            } else {
                $dsn = "pgsql:host=$this->pro_host;dbname=$this->pro_dbName";
                $dbh = new PDO($dsn, $this->pro_user, $this->pro_password);
            }
            return $dbh;
        } catch (PDOException $e) {
            die("Error:". $e);
        }
    }
}


// CREATE TABLE sms.smses ( id BIGINT NOT NULL AUTO_INCREMENT , sms_id TEXT NOT NULL , phone VARCHAR(20) NOT NULL , sms TEXT NOT NULL , delivery VARCHAR(20) NOT NULL , created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (id)) ENGINE = InnoDB;





// CREATE TABLE smses (
// 	id serial PRIMARY KEY,
// 	sms_id TEXT UNIQUE NOT NULL,
// 	phone VARCHAR ( 50 ) NOT NULL,
// 	sms TEXT UNIQUE NOT NULL,
// 	delivery VARCHAR ( 50 ) NOT NULL,
// 	created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
// );