<?php

/**
 * applicant class represents an applicant from my application
 * @Junny Noriega
 */

class Applicant
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_state;
    private $_phone;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    function __construct()
    {
        $this->_fname = "";
        $this->_lname = "";
        $this->_email = "";
        $this->_state = "";
        $this->_tel = "";
        $this->_github = "";
        $this->_experience = "";
        $this->_relocate = "";
        $this->_bio = "";
    }
    // GETTERS & SETTERS
    /**
     * getFname returns the first name
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * setFname sets the first name
     * @param $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }
    /**
     * getLname returns the last name
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * setLname sets the first name
     * @param $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

}