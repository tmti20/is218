
<?php

// TimeZone, Start greetings
function greetings(){
// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('America/New_York');
/* This sets the $time variable to the current hour in the 24 hour clock format */
$time = date("H");

/* If the time is less than 1200 hours, show good morning */
if ($time < "12") {
    return "Good Morning,";
} else
    /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
    if ($time >= "12" && $time < "17") {
        return "Good Afternoon,";
    } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            return "Good Evening,";
        }
        else
            /* Finally, show good night if the time is greater than or equal to 1900 hours */
            if ($time >= "19") {
                return "Good Night,";
            }
}

//REDIRECT FUNCTION
function redirect($message, $target){
//Redirect to login page and exit session
    echo $message;
    $delay = '2';
    header("refresh: $delay url = $target");
    exit();
}

//GETEKEEPER FUNCTION
function gatekeeper(){
    if(!isset($_SESSION["logged"])){
        header("Location: logout.php");
    }
}

//RUN SQL QUERY AND RETURN VALUES TO THE CALLED PLACE(IF VALID)
function runQuery($query) {
    global $db;
    try {
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



?>

