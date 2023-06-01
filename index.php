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

    // Display a view page
    $view = new Template();
   echo $view->render('views/contact.html');
});

// Define a rice menu route
$F3->route('GET|POST /rice', function ($f3) {

    // Display a view page
    $view = new Template();
    echo $view->render('views/tmp-menu.html');
});

// Define a login route
$F3->route('GET /login', function () {

    // Display a view page
    $view = new Template();
    echo $view->render('views/login.html');
});

// Define a signup route
$F3->route('GET /signup', function () {

    // Display a view page
    $view = new Template();
    echo $view->render('views/signup.html');
});

// Run Fat-Free
$F3->run();