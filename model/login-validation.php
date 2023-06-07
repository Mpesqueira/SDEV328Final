<?php

class LoginValidation
{
    private $_dbh;

    function __construct()
    {
        try {
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            // echo 'Connected to database!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function validUser($username, $password)
    {
        $sql = "SELECT user_id, username, pass FROM `users`";

        $statement = $this->_dbh->prepare($sql);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        for($i=0; $i<count($result); $i++) {
            if($result[$i]['username'] == $username && $result[$i]['pass'] == $password) {
                return $result[$i]['user_id'];
            }
        }
        return -1;
    }
}