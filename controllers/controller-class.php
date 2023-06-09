<?php

class Controller
{
    private $_f3;

    /**
     * Construct function takes in a Fat-Free object
     * @param $f3
     */
    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    /**
     * Home function that diplays the home or "about us" page.
     */
    function home()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');

    }

    /**
     * Contact function that displays the "contact us" page
     */
    function contact()
    {
        // Display a view page
        $view = new Template();
        echo $view->render('views/contact.html');
    }

    /**
     * Rice function that displays the "Our Rice" page
     */
    function rice()
    {
        $arborio = 0;
        $basmati = 0;
        $black = 0;
        $brown = 0;
        $jasmine = 0;
        $sticky = 0;
        $white = 0;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $arborio = ((int)($_POST['arborio']));
            $basmati = ((int)($_POST['basmati']));
            $black = ((int)($_POST['black']));
            $brown = ((int)($_POST['brown']));
            $jasmine = ((int)($_POST['jasmine']));
            $sticky = ((int)($_POST['sticky']));
            $white = ((int)($_POST['white']));

            $newOrder = new Order();

            $newOrder->setArborio($arborio);
            $newOrder->setBasmati($basmati);
            $newOrder->setBlack($black);
            $newOrder->setBrown($brown);
            $newOrder->setJasmine($jasmine);
            $newOrder->setSticky($sticky);
            $newOrder->setWhite($white);

            $this->_f3->set('SESSION.order', $newOrder);
            $GLOBALS['dataLayer']->saveOrder($this->_f3->get('SESSION.order'), $this->_f3->get('SESSION.userID'));
            $this->_f3->reroute('cart');
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/rice.html');

    }

    /**
     * Cart function that displays the "Cart" page
     */
    function cart()
    {
        $order = $GLOBALS['dataLayer']->getOrder($this->_f3->get('SESSION.userID'));
        $this->_f3->set('orders', $order);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->_f3->reroute('checkout');
        }

        $view = new Template();
        echo $view->render('views/cart.html');
    }

    /**
     * Checkout removes the order from the database
     */
    function checkout()
    {
        $checkout = $GLOBALS['dataLayer']->endOrder ($this->_f3->get('SESSION.userID'));

        $view = new Template();
        echo $view->render('views/home.html');
    }

    /**
     * Login function that checks to see if a username and password match
     * what is in the database, and if so, it displays the page as a
     * "Logged In" user.
     * @return void
     */
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
                $this->_f3->set('SESSION.userID', $userID);
            }
            else {
                $this->_f3->set('errors["user"]', 'Invalid Username or Password');
            }

            if (empty($this->_f3->get('errors'))) {
                $this->_f3->reroute('/');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    /**
     * Signup function takes a username, email, and password. Validates
     * each of those inputs, checks them against the database, and finally
     * displays a "Sign up" page
     * @return void
     */
    function signup()
    {
        $username = "";
        $email = "";
        $password = "";
        $confirm = "";

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
            if(isset($_POST['confirm'])) {
                $confirm = $_POST['confirm'];
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
                $this->_f3->set('errors["password"]', 'Password must be at least 8 characters long and contain a number');
            }
            if(!Validate::confirmPassword($password, $confirm)) {
                $this->_f3->set('errors["confirm"]', 'Passwords don\'t match');
            }


            if (empty($this->_f3->get('errors'))) {
                $this->_f3->set('SESSION.user', $newUser);
                $GLOBALS['dataLayer']->saveUser($this->_f3->get('SESSION.user'));
                $this->_f3->clear('SESSION');
                $this->_f3->reroute('login');
            }
        }

        // Display a view page
        $view = new Template();
        echo $view->render('views/signup.html');
    }

    /**
     * Logs the user out and returns to home page
     * @return void
     */
    function logout()
    {
        $this->_f3->clear('SESSION');
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function admin()
    {

    }
}