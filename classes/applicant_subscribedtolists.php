<?php
class Applicant_SubscribedToLists extends Applicant
{
    private $_selectionJobs;
    private $_selectionVerticals;

    function __construct($selectionJobs="",$selectionVerticals="")
    {
        $this->_selectionJobs = $selectionJobs;
        $this->_selectionVerticals = $selectionVerticals;
    }
    //GETTERS & SETTERS
    /**
     * getSelectionJobs returns jobs
     * @return string
     */
    public function getSelectionJobs()
    {
        return $this->_selectionJobs;
    }

    /**
     * setSelectionJobs sets the jobs listing
     * @param $selectionJobs
     */
    public function setSelectionJobs($selectionJobs)
    {
        $this->_selectionJobs = $selectionJobs;
    }
    /**
     * getSelectionVerticals returns verticals
     * @return string
     */
    public function getSelectionVerticals()
    {
        return $this->_selectionVerticals;
    }

    /**
     * setSelectionVerticals sets the verticals listing
     * @param $selectionVerticals
     */
    public function setSelectionVerticals($selectionVerticals)
    {
        $this->_selectionVerticals = $selectionVerticals;
    }
}