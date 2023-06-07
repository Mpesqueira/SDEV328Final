<?php
/*
 * Charlie Tang, Mark Pesqueira
 * 5/9/2023
 * 328/SDEV328Final/index.php
 * Controller for Final Project
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');

// create an F3 (Fat-Free Framework) object
$F3 = Base::instance();

// Define a default route
$F3->route('GET /', function () {
    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Define a contact us route
$F3->route('GET /contact-us', function () {
    $view = new Template();
    echo $view->render('views/contact.html');
});

// Define a rice menu route
$F3->route('GET|POST /rice', function ($f3) {

    // Initialize variables
    $rice = "";

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        // Get the data
        $rice = $_POST['rice'];

        // Validate the data

        /*if (validSelectionRice($rice)) {
            $f3->set('SESSION.rice', $rice);
        } else {
            $f3->set('errors["rice"]', 'Invalid rice selection');
        }*/

        // If data is valid, add it to the SESSION array
        $f3->set('SESSION.rice', $rice);

        // Redirect to Order Summary page if there
        // are no errors (errors array is empty)

        /*if (empty($f3->get('errors'))) {
            $f3->reroute('summary');
        }*/
    }

    // Display a view page
    $view = new Template();
    echo $view->render('views/rice.html');
});

// Define a login route
$F3->route('GET|POST /login', function ($f3) {

    // Initialize variables
    $username = "";
    $password = "";

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        // Get the data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate the data


        // If data is valid, add it to the SESSION array
        $f3->set('SESSION.username', $username);
        $f3->set('SESSION.password', $password);

        // Redirect to Home page (logged in) if there
        // are no errors (errors array is empty)
        /*if (empty($f3->get('errors'))) {
            $f3->reroute('home');
        }*/

    }
    // Display a view page
    $view = new Template();
    echo $view->render('views/login.html');
});

// Define a signup route
$F3->route('GET|POST /signup', function ($f3) {

    // Initialize variables
    $username = "";
    $password = "";
    $email = "";

    // If the form has been posted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {


        // Get the data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Validate the data


        // If data is valid, add it to the SESSION array
        $f3->set('SESSION.username', $username);
        $f3->set('SESSION.password', $password);
        $f3->set('SESSION.email', $email);



        // Redirect to Login page (not logged in) if there
        // are no errors (errors array is empty)
        /*if (empty($f3->get('errors'))) {
            $f3->reroute('login');
        }*/

    }
    // Display a view page
    $view = new Template();
    echo $view->render('views/signup.html');
});

// Define a summary route
$F3->route('GET /summary', function () {

    // Display a view page
    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

// Run Fat-Free
$F3->run();