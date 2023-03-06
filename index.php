<?php
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Require autoload file
require_once('vendor/autoload.php');
//require_once('model/data-layer.php');
//require_once('model/validate.php');

// Start Session AFTER requiring autoload.php
session_start();
//var_dump($_SESSION);

// Instantiate F3 Base class
$f3 = Base::instance();

// Instantiate a Controller object
$con = new Controller($f3);

// Define a default route (328/application)
$f3->route('GET /', function () {
    $GLOBALS['con']->home();
});

// Define a default route (328/application/app-summary.html)
$f3->route('GET|POST /personalInfo', function($f3) {
    $GLOBALS['con']->personalInfo();
});

// Define a default route (328/application/experience-page.html)
$f3->route('GET|POST /experience', function($f3) {
    $GLOBALS['con']->experience();
});

// Define a default route (328/application/mailing-list.html)
$f3->route('GET|POST /mailings', function($f3) {
    $GLOBALS['con']->mailings();
});

//Define a summary route (328/application/summary)
$f3->route('GET /summary', function() {
    $GLOBALS['con']->summary();
});

// Run Fat Free
$f3->run();