<?php
class Validate
{
    static function validFirstName($firstName) {
        return preg_match("/^[a-zA-Z-' ]*$/", $firstName);
    }
    static function validLastName($lastName) {
        return preg_match("/^[a-zA-Z-' ]*$/", $lastName);
    }
    static function validEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    static function validTel($tel) {
        return preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $tel);
    }
    static function validExperience($expYears) {
        return in_array($expYears, DataLayer::getExperience());
    }
    static function validGitHub($github) {
        return filter_var($github, FILTER_VALIDATE_URL);
    }
//    static function validSelectionsJobs($language) {
//        return in_array($language, DataLayer::getSelectionsJobs());
//    }
//    static function validSelectionsVerticals($vertical) {
//        return in_array($vertical, DataLayer::getSelectionsVerticals());
//    }
}