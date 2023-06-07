<?php

class User
{
    private $_username;
    private $_email;
    private $_password;

    function __construct($username = "", $email = "", $password = "")
    {
        $this->_username = $username;
        $this->_email = $email;
        $this->_password = $password;
    }

    public function setUsername (String $username)
    {
        $this->_username = $username;
    }

    public function getUsername ()
    {
        return $this->_username;
    }

    public function setEmail (String $email)
    {
        $this->_email = $email;
    }

    public function getEmail ()
    {
        return $this->_email;
    }

    public function setPassword (String $password)
    {
        $this->_password = $password;
    }

    public function getPassword ()
    {
        return $this->_password;
    }
}