<?php

class User {
    private $email, $pass, $fname, $lname, $birth, $id;

    public function __construct( $email, $pass, $fname, $lname, $birth)
    {
        $this ->email=$email;
        $this ->pass=$pass;
        $this ->fname=$fname;
        $this ->lname=$lname;
        $this ->birth=$birth;
    }

    public function getEmail(){
        return $this ->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }


    public function getPass(){
        return $this ->pass;
    }

    public function setPass($value) {
        $this->pass = $value;
    }


    public function getFname(){
        return $this ->fname;
    }

    public function setFname($value) {
        $this->fname = $value;
    }


    public function getLname(){
        return $this ->lname;
    }

    public function setLname($value) {
        $this->lname = $value;
    }


    public function getBirth(){
        return $this ->birth;
    }

    public function setBirth($value) {
        $this->birth = $value;
    }


    public function getId(){
        return $this ->id;
    }

    public function setId($value) {
        $this->id = $value;
    }



}
?>