<?php

class User {

    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = htmlspecialchars(stripslashes(trim($username)));
        $this->password = htmlspecialchars(stripslashes(trim($password)));
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
}

?>
