<?php

class ConnectMySQL {

    // mySqli
/*    protected $DB_SERVER = 'localhost';
    protected $DB_DATABASE = 'music';
    protected $DB_USERNAME = 'root';
    protected $DB_PASSWORD = '';

    protected function connectToDB()
    {
        $conn = new mysqli($this->DB_SERVER, $this->DB_USERNAME, $this->DB_PASSWORD, $this->DB_DATABASE)
        or die("ConnectMySQL failed: %s\n" . $conn->error);
        return $conn;
    }*/
    //

    // PDO
    protected $DB_SERVER = 'localhost';
    protected $DB_DATABASE = 'music';
    protected $DB_USERNAME = 'root';
    protected $DB_PASSWORD = '';


    protected function connectToDB()
    {
        $conn = new PDO('mysql:host='.$this->DB_SERVER.';dbname='.$this->DB_DATABASE, $this->DB_USERNAME, $this->DB_PASSWORD)
        or die("ConnectMySQL failed: %s\n" . $conn->error);
        return $conn;
    }
    //

}