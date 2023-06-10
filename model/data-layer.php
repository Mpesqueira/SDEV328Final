<?php

// get the selected rice from the menu form
require_once($_SERVER['DOCUMENT_ROOT'].'/../pdo-config.php');

class DataLayer
{
    private $_dbh;

    /**
     * Construct function that connects to the database with a new PDO object
     */
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

    /**
     * @param $user
     * @return void
     */
    function saveUser($user)
    {
        // 1. Define the query (test first!)
        $sql = "INSERT INTO users (username, email, pass) 
                VALUES (:username, :email, :password)";

        // 2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. Bind the parameters
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $statement->bindParam(':username', $username);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        // 4. Execute
        $statement->execute();

        // 5. Process the result, if there is one

    }

//    function getUser() {
//        $sql = ""
//    }


    /**
     * getRice function used to get the various
     * type of rice stored in the $rice array
     * @return string[] $rice
     */
    static function getRice()
    {
        $rice = array("Arborio", "Basmati", "Black", "White",
            "Brown", "Jasmine", "Sticky");

        return $rice;
    }

}
