<?php
// 328/application/controller/controller.php

class Controller {
    private $_f3; // Fat-free object

    function __construct($f3)
    {
        $this->_f3 = $f3;

    }
    function home()
    {
        // Instantiate a view
        $view = new Template();
        echo $view->render('views/app-home.html');
    }
    function personalInfo()
    {
        //If the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $newApplicant = new Applicant();

            //Move data from POST array to SESSION array
            $_SESSION['state'] = $_POST['state'];
            $firstName = trim($_POST['firstName']);
            $lastName = trim($_POST['lastName']);
            $email = trim($_POST['email']);
            $tel = trim ($_POST['tel']);

            if (Validate::validFirstName($firstName) && Validate::validLastName($lastName) && Validate::validEmail($email) && Validate::validTel($tel)) {
                $newApplicant->setFname($firstName);
                $newApplicant->setLname($lastName);
                $newApplicant->setEmail($email);
                $newApplicant->setTel($tel);
            }
            else {
                $this->_f3->set('errors["firstName"]',
                    'must have at least 1 chars');
                $this->_f3->set('errors["lastName"]',
                    'must have at least 1 chars');
                $this->_f3->set('errors["email"]',
                    'invalid email');
                $this->_f3->set('errors["tel"]',
                    'invalid number');
            }

            //Redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['newApplicant'] = $newApplicant;
                $this->_f3->reroute('experience');
            }
        }

        // Instantiate a view
        $view = new Template();
        echo $view->render('views/personal-info.html');
    }
    function experience()
    {
        //If the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $newApplicantExp = new Applicant();

            //Move data from POST array to SESSION array
            $_SESSION['locate'] = $_POST['locate'];
            $_SESSION['bio'] = $_POST['bio'];
            $github = trim($_POST['github']);
            $expYears = $_POST['expYears'];

            if(Validate::validExperience($expYears) && Validate::validGitHub($github)) {
                $newApplicantExp->setExperience($expYears);
                $newApplicantExp->setGithub($github);
            }
            else {
                $this->_f3->set('errors["expYears"]',
                    'please select experience');
                $this->_f3->set('errors["github"]',
                    'invalid link');
            }

            //Redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                $_SESSION['newApplicantExp'] = $newApplicantExp;
                $this->_f3->reroute('summary');
            }
        }
        $this->_f3->set('yearsOfEx', DataLayer::getExperience());

        // Instantiate a view
        $view = new Template();
        echo $view->render('views/experience-page.html');
    }
    function mailings() {
        //If the form has been submitted
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//            //Move data from POST array to SESSION array
////        $_SESSION['language'] = implode(", ", $_POST['language']);
////        $_SESSION['vertical'] = implode(", ", $_POST['vertical']);
//
//            // validate the job selections
//            $language = $_POST['language'];
//            $vertical = $_POST['vertical'];
//            if(validSelectionsJobs($language) && validSelectionsVerticals($vertical)) {
//                $_SESSION['language'] = $language;
//                $_SESSION['vertical'] = $vertical;
//            }
//            else {
//                $f3->set('errors["language"]',
//                    'invalid link');
//                $f3->set('errors["vertical"]',
//                    'invalid link');
//            }
//
//            //Redirect to summary page
//            //if there are no errors
//            if (empty($f3->get('errors'))) {
//                $f3->reroute('summary');
//            }
//
////        //Redirect to summary page
////        $f3->reroute('summary');
//        }
//        //Add meals to F3 hive
//        $f3->set('languages', getSelectionsJobs());
//        $f3->set('verticals', getSelectionsVerticals());
//
//        // Instantiate a view
//        $view = new Template();
//        echo $view->render('views/mailing-list.html');
    }
    function summary() {
        //Instantiate a view
        $view = new Template();
        echo $view->render("views/app-summary.html");

        // destroy session array (CLEARING any previous data so that it doesn't overlap new data)
        session_destroy();
    }
}