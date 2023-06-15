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


$dataLayer = new DataLayer();
$login = new LoginValidation();
// create an F3 (Fat-Free Framework) object
$F3 = Base::instance();
$con = new Controller($F3);

// Define a default route
$F3->route('GET /', function () {
    $GLOBALS['con']->home();
});

// Define a contact us route
$F3->route('GET /contact-us', function () {
    $GLOBALS['con']->contact();
});

// Define a rice menu route
$F3->route('GET|POST /rice', function ($f3) {
    $GLOBALS['con']->rice();
});

// Define a cart route
$F3->route('GET /cart', function () {
    $GLOBALS['con']->cart();
});

// Define a login route
$F3->route('GET|POST /login', function () {
    $GLOBALS['con']->login();
});

// Define a signup route
$F3->route('GET|POST /signup', function () {
    $GLOBALS['con']->signup();
});

// Define a logout route
$F3->route('GET /logout', function () {
   $GLOBALS['con']->logout();
});

$F3->route('GET|POST /cart', function () {
    $GLOBALS['con']->cart();
});

$F3->route('GET /checkout', function () {
   $GLOBALS['con']->checkout();
});

$F3->route('GET /admin', function () {
   $GLOBALS['con']->admin();
});

// Run Fat-Free
$F3->run();