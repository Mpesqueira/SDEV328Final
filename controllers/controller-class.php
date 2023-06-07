<?php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');

    }

    function contact()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/contact.html');
    }

    function rice()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/rice.html');
    }

    function cart()
    {
        $view = new Template();
        echo $view->render('views/cart.html');
    }

    function login()
    {
        //Check for valid username and password
        //$db = $GLOBALS['login']->validUser('charlietango', 'charlietang12');
        //var_dump($db);
        $username = "";
        $password = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            if(isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            $userID = $GLOBALS['login']->validUser($username, $password);

            if($userID != -1) {
                echo $userID;
                $this->_f3->set('SESSION.userID', $userID);
                $this->_f3->reroute('/');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function signup()
    {
        $username = "";
        $email = "";
        $password = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['username'])) {
                $username = $_POST['username'];
            }
            if(isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            if(isset($_POST['password'])) {
                $password = $_POST['password'];
            }

            $newUser = new User();

            if(Validate::validUsername($username)) {
                $newUser->setUsername($username);
            }
            else {
                $this->_f3->set('errors["username"]', 'Invalid Username');
            }
            if(Validate::validEmail($email)) {
                $newUser->setEmail($email);
            }
            else {
                $this->_f3->set('errors["email"]', 'Invalid Email');
            }
            if(Validate::validPassword($password)) {
                $newUser->setPassword($password);
            }
            else {
                $this->_f3->set('errors["password"]', 'Invalid Password');
            }

            if (empty($this->_f3->get('errors'))) {
                $GLOBALS['dataLayer']->saveUser($this->_f3->get($newUser));
                $this->_f3->reroute('login');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/signup.html');
    }
}