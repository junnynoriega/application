<?php
    function validFirstName($firstName) {
        return preg_match("/^[a-zA-Z-' ]*$/", $firstName);
    }
    function validLastName($lastName) {
        return preg_match("/^[a-zA-Z-' ]*$/", $lastName);
    }
    function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function validTel($tel) {
        return preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $tel);
    }
    function validExperience($expYears) {
        return in_array($expYears, getExperience());
    }
    function validGitHub($github) {
        return filter_var($github, FILTER_VALIDATE_URL);
    }
    function validSelectionsJobs($language) {
      return in_array($language, getSelectionsJobs());
    }
    function validSelectionsVerticals($vertical) {
        return in_array($vertical, getSelectionsVerticals());
    }