<?php

// get the selected rice from the menu form
require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{
    private $_dbh;

    function __construct()
    {
        try {
            $this->_dbh = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            // echo 'Connected to database!';
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function saveUser($user)
    {
        $sql = "INSERT INTO users (username, email, pass) 
                VALUES (:username, :email, :password)";

        $statement = $this->_dbh->prepare($sql);

        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        $statement->execute();
    }

//    function getUser() {
//        $sql = ""
//    }

    static function getRice()
    {
        $rice = array("Arborio", "Basmati", "Black", "White",
            "Brown", "Jasmine", "Sticky");

        return $rice;
    }

}
