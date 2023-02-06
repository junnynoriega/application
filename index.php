<?php
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Start Session
session_start();

// Require autoload file
require_once('vendor/autoload.php');

// Instantiate F3 Base class
$f3 = Base::instance();

// Define a default route (328/application)
$f3->route('GET /', function () {
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/app-home.html');
});

//// Define a default route (328/application/personal-info.html)
//$f3->route('GET|POST /personalInfo', function () {
//    // Instantiate a view
//    $view = new Template();
//    echo $view->render('views/personal-info.html');
//});

// Define a default route (328/application/app-summary.html)
$f3->route('GET|POST /personalInfo', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $_SESSION['firstName'] = $_POST['firstName'];
        $_SESSION['lastName'] = $_POST['lastName'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['state'] = $_POST['state'];
        $_SESSION['tel'] = $_POST['tel'];

        //Redirect to summary page
        $f3->reroute('experience');
    }

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/personal-info.html');
});

// Define a default route (328/application/app-summary.html)
$f3->route('GET|POST /experience', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $_SESSION['bio'] = $_POST['bio'];
        $_SESSION['github'] = $_POST['github'];
        $_SESSION['yearsEx'] = $_POST['yearsEx'];
        $_SESSION['locate'] = $_POST['locate'];

        //Redirect to summary page
        $f3->reroute('summary');
    }

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/experience-page.html');
});

//Define a summary route (328/application/summary)
$f3->route('GET /summary', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/app-summary.html");

});

// Run Fat Free
$f3->run();