<?php

$username = 'root';
$password = '';
$hostname = 'localhost';
$db = "test1";
$dsn = "mysql:host=$hostname;dbname=$db";
try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully<br>";
}
catch(PDOException $e)
{
	 echo "Connection failed: " . $e->getMessage();
	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
}

// //Runs SQL query and returns results (if valid)
//function runQuery($query) {
//	global $db;
//    try {
//		$q = $db->prepare($query);
//		$q->execute();
//		$results = $q->fetchAll();
//		$q->closeCursor();
//		return $results;
//	}
//	catch (PDOException $e) {
//		http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
//	}
//}
//
//function addUser($email,$fname,$lname,$birth,$pass) {
//    global $db;
//    try {
//        $query = "insert into accounts (email, fname, lname, birthday, password) values (:email, :fname,:lname,:birth,:pass)";
//        $statement = $db->prepare($query);
//        $statement->bindValue(':email', $email);
//        $statement->bindValue(':fname', $fname);
//        $statement->bindValue(':lname', $lname);
//        $statement->bindValue(':birth', $birth);
//        $statement->bindValue(':pass', $pass);
//        $statement->execute();
//        $statement->closeCursor();
//        return $statement;
//    }
//    catch (PDOException $e) {
//        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
//    }
//}
//
//function addQuestion($owneremail, $ownerid,$datetime, $qname, $qbody, $qskill) {
//    global $db;
//    try {
//
////owneremail, createddate, title, body, skills
//        $query = "insert into questions (owneremail, ownerid, createddate, title, body, skills) values ( :owneremail, :ownerid, :datetime, :qname, :qbody,:qskill)";
//        $statement = $db->prepare($query);
//        $statement->bindValue(':owneremail', $owneremail);
//        $statement->bindValue(':ownerid', $ownerid);
//        $statement->bindValue(':datetime', $datetime);
//        $statement->bindValue(':qname', $qname);
//        $statement->bindValue(':qbody', $qbody);
//        $statement->bindValue(':qskill', $qskill);
//        $statement->execute();
//        $statement->closeCursor();
//        echo " Insert successful";
//    }
//    catch (PDOException $e) {
//        http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
//    }
//}
//
//
//
//function http_error($message)
//{
//	header("Content-type: text/plain");
//	die($message);
//}

?>