<?php

function dataFromQuestions ($email){
    $db = Database :: getDB();
    try {
        $query = "SELECT * FROM questions where owneremail = '$email'";
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

function dataFromQuestionsById ($id){
    $db = Database :: getDB();
    try {
        $query = "SELECT * FROM questions where id = '$id'";
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


//GET ALL QUESTION FORM QUESTION TABLE
function getallquestions(){
    $db = Database :: getDB();
    try {
        $query = "SELECT * FROM questions";
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


// WE USE THIS FUNCTION TO ADD QUESTIONS TO THE QUESTION TABLE
function addQuestion($email, $ownerid, $datetime, $qname, $qbody, $qskills) {
    $db = Database :: getDB();
    try {
        $query = "insert into questions (owneremail, ownerid, createddate, title, body, skills) values ( :email, :ownerid, :datetime, :qname, :qbody,:qskill)";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':ownerid', $ownerid);
        $statement->bindValue(':datetime', $datetime);
        $statement->bindValue(':qname', $qname);
        $statement->bindValue(':qbody', $qbody);
        $statement->bindValue(':qskill', $qskills);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}


//update edited question
function updateQuestion($id, $qname, $qbody, $skills){
    $db = Database :: getDB();
    try {
        $query = "update questions set title = :qname, body= :qbody, skills = :qskill where id = '$id'";
        $statement = $db->prepare($query);
        $statement->bindValue(':qname', $qname);
        $statement->bindValue(':qbody', $qbody);
        $statement->bindValue(':qskill', $skills);
        $statement->execute();
        $statement->closeCursor();
    }
    catch (PDOException $e) {
        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
    }
}


// delete question
function deleteQuestion($id) {
    $db = Database :: getDB();
    $query = "DELETE FROM questions WHERE id = '$id'";
    $statement = $db->prepare($query);
    //$statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>