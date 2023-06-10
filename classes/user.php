<?php

/**
 * The User class represents a single user that
 * can be logged into at Rice Rice Baby.
 * @author Charlie Tang, Mark Pesqueira
 * @date June 15, 2023
 * @version 1.1
 */

class User
{
    private $_username;
    private $_email;
    private $_password;

    /**
     * Default constructor for User
     */
    function __construct($username = "", $email = "", $password = "")
    {
        $this->_username = $username;
        $this->_email = $email;
        $this->_password = $password;
    }

    /**
     * Set username for user
     * @param String $username
     */
    public function setUsername (String $username)
    {
        $this->_username = $username;
    }

    /**
     * Get username for user
     * @return mixed|string
     */
    public function getUsername ()
    {
        return $this->_username;
    }

    /**
     * Set email for user
     * @param String $email
     */
    public function setEmail (String $email)
    {
        $this->_email = $email;
    }

    /**
     * Get email for user
     * @return mixed|string
     */
    public function getEmail ()
    {
        return $this->_email;
    }

    /**
     * Set password for user
     * @param String $password
     */
    public function setPassword (String $password)
    {
        $this->_password = $password;
    }

    /**
     * Get password for user
     * @return mixed|string
     */
    public function getPassword ()
    {
        return $this->_password;
    }
}