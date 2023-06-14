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

    function saveOrder($order, $user)
    {
        // 1. Define the query (test first!)
        $sql = "INSERT INTO `order` (arborio, black, basmati, brown, jasmine, sticky, white, user_id) 
                VALUES (:arborio, :black, :basmati, :brown, :jasmine, :sticky, :white, :user)";

        // 2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // 3. Bind the parameters
        $arborio = $order->getArborio();
        $black = $order->getBlack();
        $basmati = $order->getBasmati();
        $brown = $order->getBrown();
        $jasmine = $order->getJasmine();
        $sticky = $order->getSticky();
        $white = $order->getWhite();

        $statement->bindParam(':arborio', $arborio);
        $statement->bindParam(':black', $black);
        $statement->bindParam(':basmati', $basmati);
        $statement->bindParam(':brown', $brown);
        $statement->bindParam(':jasmine', $jasmine);
        $statement->bindParam(':sticky', $sticky);
        $statement->bindParam(':white', $white);
        $statement->bindParam(':user', $user);


        // 4. Execute
        $statement->execute();

        // 5. Process the result, if there is one

    }

    function getOrder ($user)
    {
        $sql = "SELECT arborio, black, basmati, brown, jasmine, sticky, white FROM `order` WHERE user_id = :user;";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindParam(':user', $user);

        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

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
