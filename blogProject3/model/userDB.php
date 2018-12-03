<?php

function authentication ($email, $pass){
    global $db;
    try {
        $query = "select * from account where email='$email' and password='$pass'";
        $q = $db->prepare($query);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();

        if(count($results) > 0){
            $results = true;
            }
        else{
            $results =false;
        }
        return $results;
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}


function userFromAccounts ($email){
    global $db;
    try {
        $query = "select * from account where email='$email'";
        $q = $db->prepare($query);
        $q->execute();
        $results = $q->fetchAll();
        $q->closeCursor();
        return $results;
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}

// USING THIS FUNCTION WE ADD USER TO THE ACCOUNT TABLE
function addUser($email,$fname,$lname,$birth,$pass) {
    global $db;
    try {
        $query = "insert into account (email, fname, lname, birthday, password) values (:email, :fname,:lname,:birth,:pass)";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':birth', $birth);
        $statement->bindValue(':pass', $pass);
        $statement->execute();
        $statement->closeCursor();
        return $statement;
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}

?>