<?php
class Question{
    private $email,$ownerid, $qname,$qbody,$skills ,$datetime, $id;
    public function __construct( $email, $ownerid, $datetime, $qname, $qbody, $skills)
    {
        $this ->email=$email;
        $this ->ownerid=$ownerid;
        $this ->datetime=$datetime;
        $this ->qname=$qname;
        $this ->qbody=$qbody;
        $this ->skills=$skills;
    }
    public function getEmail(){
        return $this ->email;
    }
    public function setEmail($value) {
        $this->email = $value;
    }
    public function getOwnerid(){
        return $this ->ownerid;
    }
    public function setOwnerid($value) {
        $this->ownerid = $value;
    }
    public function getQname(){
        return $this ->qname;
    }
    public function setQname($value) {
        $this->qname = $value;
    }
    public function getQbody(){
        return $this ->qbody;
    }
    public function setQbody($value) {
        $this->qbody = $value;
    }
    public function getSkills(){
        return $this ->skills;
    }
    public function setSkills($value) {
        $this->skills = $value;
    }
    public function getDateTime(){
        return $this ->datetime;
    }
    public function setDateTime($value) {
        $this->datetime = $value;
    }
    public function getId(){
        return $this ->id;
    }
    public function setId($value) {
        $this->id = $value;
    }
}
?>