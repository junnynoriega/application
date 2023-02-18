<?php
    function validFirstName($firstName) {
        return strlen($firstName) > 1;
    }
    function validLastName($lastName) {
        return strlen($lastName) > 1;
    }
    function validEmail($email) {
        return preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/", $email);
    }
    function validTel($tel) {
        return preg_match("/^[0-9]{3}[0-9]{3}[0-9]{4}$/", $tel);
    }
    function validGitHub($github) {
        return !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $github);
    }
    // return array of mailing-list options chosen
    function validSelectionsJobs($language) {
      return in_array($language, getSelectionsJobs());
    }
    function validSelectionsVerticals($vertical) {
        return in_array($vertical, getSelectionsVerticals());
    }