<?php
// This is my controller

// Turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// Start Session
session_start();

// Require autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');

// Instantiate F3 Base class
$f3 = Base::instance();

// Define a default route (328/application)
$f3->route('GET /', function () {
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/app-home.html');
});

//// Define a default route (328/application/personal-info.html.html)
//$f3->route('GET|POST /personalInfo', function () {
//    // Instantiate a view
//    $view = new Template();
//    echo $view->render('views/personal-info.html.html');
//});

// Define a default route (328/application/app-summary.html)
$f3->route('GET|POST /personalInfo', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $tel = trim ($_POST['tel']);

        if (validFirstName($firstName) && validLastName($lastName) && validEmail($email) && validTel($tel)) {
            $_SESSION['firstName'] = $firstName;
            $_SESSION['$lastName'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['tel'] = $tel;
        }
        else {
            $f3->set('errors["firstName"]',
                'must have at least 1 chars');
            $f3->set('errors["lastName"]',
                'must have at least 1 chars');
            $f3->set('errors["email"]',
                'invalid email');
            $f3->set('errors["tel"]',
                'invalid number');
        }

        $_SESSION['state'] = $_POST['state'];

        //Redirect to summary page
        if (empty($f3->get('errors'))) {
            $f3->reroute('experience');
        }
    }

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/personal-info.html');
});

// Define a default route (328/application/experience-page.html)
$f3->route('GET|POST /experience', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
        $github = trim($_POST['github']);
        $expYears = $_POST['expYears'];

        if(validExperience($expYears) && validGitHub($github)) {
            $_SESSION['expYears'] = $expYears;
            $_SESSION['github'] = $github;
        }
        else {
            $f3->set('errors["expYears"]',
            'please select experience');
            $f3->set('errors["github"]',
                'invalid link');
        }

        $_SESSION['locate'] = $_POST['locate'];
        $_SESSION['bio'] = $_POST['bio'];

        //Redirect to summary page
        if (empty($f3->get('errors'))) {
            $f3->reroute('mailings');
        }
    }
    // Instantiate a view
    $view = new Template();
    echo $view->render('views/experience-page.html');
});

// Define a default route (328/application/mailing-list.html)
$f3->route('GET|POST /mailings', function($f3) {

    //If the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Move data from POST array to SESSION array
//        $_SESSION['language'] = implode(", ",$_POST['language']);

        // validate the job selections
        $language = $_POST['language'];
        if(empty(validSelectionsJobs($language))) {
            $f3->set('errors["language"]',
                'invalid link');
        }
        else {
            $_SESSION['language'] = implode(", ",$_POST['language']);
        }


        //Redirect to summary page
        //if there are no errors
        if (empty($f3->get('errors'))) {
            $f3->reroute('summary');
        }

//        //Redirect to summary page
//        $f3->reroute('summary');
    }
    //Add meals to F3 hive
    $f3->set('languages', getSelectionsJobs());
//    $f3->set('verticals', getSelectionsVerticals());

    // Instantiate a view
    $view = new Template();
    echo $view->render('views/mailing-list.html');
});

//Define a summary route (328/application/summary)
$f3->route('GET /summary', function() {

    //Instantiate a view
    $view = new Template();
    echo $view->render("views/app-summary.html");

});

// Run Fat Free
$f3->run();