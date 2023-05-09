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

require_once('vendor/autoload.php');

// create an F3 (Fat-Free Framework) object
$F3 = Base::instance();

// Define a default route
$F3->route('GET /', function () {
    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// Run Fat-Free
$F3->run();