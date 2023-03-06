<?php
class DataLayer
{
    static function getExperience() {
        return array(" 0-2", " 2-4", " 4+");
    }
    static function getSelectionsJobs() {
        return array("JavasScript", "HTML", "PHP", "CSS", "Java", "ReactUS", "Python", "NodeJs");
    }
    static function getSelectionsVerticals() {
        return array("SaaS", "Industrial tech", "Health tech", "Cybersecurity", "Ag tech", "HR tech");
    }
}
