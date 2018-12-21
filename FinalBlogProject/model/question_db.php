
<?php
class QuestionDB{

    public static function dataFromQuestions ($email){
        $db = Database :: getDB();
        try {
            $query = "SELECT * FROM questions where owneremail = '$email'";
            $q = $db->prepare($query);
            $q->execute();
            $results = $q->fetch();
            $q->closeCursor();

            $question = new Question(
                $results['owneremail'],
                $results['ownerid'],
                $results['createddate'],
                $results['title'],
                $results['body'],
                $results['skills']
            );
            $question->setId($results['id']);

            return $question;
        }
        catch (PDOException $e) {
            http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
        }
    }

    public static function dataFromQuestionsById ($id){
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
    public static function getallquestions(){
        $db = Database :: getDB();
        try {
            $query = "SELECT * FROM questions";
            $q = $db->prepare($query);
            $q->execute();
            $results = $q->fetch();
            $q->closeCursor();

            $question = new Question(
                $results['owneremail'],
                $results['ownerid'],
                $results['createddate'],
                $results['title'],
                $results['body'],
                $results['skills']
            );
            $question->setId($results['id']);

            return $question;
        }
        catch (PDOException $e) {
            http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
        }
    }


// WE USE THIS FUNCTION TO ADD QUESTIONS TO THE QUESTION TABLE
    public static function addQuestion($addQuestion) {
        $db = Database :: getDB();

        $email = $addQuestion -> getEmail();
        $ownerid = $addQuestion -> getOwnerid();
        $datetime = $addQuestion -> getDateTime();
        $qname = $addQuestion -> getQname();
        $qbody = $addQuestion -> getQbody();
        $qskills = $addQuestion -> getSkills();

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
            return $statement;
        }
        catch (PDOException $e) {
            http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
        }
    }


//update edited question
    public static function updateQuestion($addQuestion){
        $db = Database :: getDB();

        $qname = $addQuestion -> getQname();
        $qbody = $addQuestion -> getQbody();
        $skills = $addQuestion -> getSkills();
        $id = $addQuestion -> getId();


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
    public static function deleteQuestion($id) {
        $db = Database :: getDB();
        $query = "DELETE FROM questions WHERE id = '$id'";
        $statement = $db->prepare($query);
        //$statement->bindValue(':id', $id);
        $statement->execute();
        $statement->closeCursor();
    }

}
?>
