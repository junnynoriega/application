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
    private $_tel;
    private $_github;
    private $_experience;
    private $_relocate;
    private $_bio;

    function __construct($fname="",$lname="",$email="",$state="",$tel="",$github="",$experience="",$relocate="",$bio="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_state = $state;
        $this->_tel = $tel;
        $this->_github = $github;
        $this->_experience = $experience;
        $this->_relocate = $relocate;
        $this->_bio = $bio;
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
    /**
     * getEmail returns the email
     * @return string
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * setEmail sets the email
     * @param $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    /**
     * getState returns the state
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * setTel sets the phone number
     * @param $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }
    /**
     * getTel returns the phone number
     * @return string
     */
    public function getTel()
    {
        return $this->_tel;
    }

    /**
     * setTel sets the phone number
     * @param $tel
     */
    public function setTel($tel)
    {
        $this->_tel = $tel;
    }
    /**
     *  getGithub returns the github link
     * @return string
     */
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     *  setGithub sets the url
     * @param $github
     */
    public function setGithub($github)
    {
        $this->_github = $github;
    }
    /**
     * getExperience returns the years of experience
     * @return string
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * getExperience sets the years of experience
     * @param $experience
     */
    public function setExperience($experience)
    {
        $this->_experience= $experience;
    }
    /**
     * getRelocate returns the relocation yes/no
     * @return string
     */
    public function getRelocate()
    {
        return $this->_relocate;
    }

    /**
     * setRelocate sets the relocation
     * @param $relocate
     */
    public function setRelocate($relocate)
    {
        $this->_relocate= $relocate;
    }
    /**
     * getBio returns the biography
     * @return string
     */
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * setBio sets the biography
     * @param $bio
     */
    public function setBio($bio)
    {
        $this->_bio = $bio;
    }
}