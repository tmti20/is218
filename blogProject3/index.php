<?php

// DEFINE REQUIRED MODELS/FUNCTIONS
require('model/config.php');
require('function.php');
require('userDB.php');
require('questionDB.php');

//CHECK THE VALUE IF ITS NULL
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}

//SHOW LOGIN FORM
if ( $action == 'show_login'){
    include('loginForm.php');
}

//LOGIN ACTION
else if ($action == 'login') {
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass');
    include('loginValidationCheck.php');
    $results = authentication ($email, $pass);
    if ($valid && $results ){
        header("Location:?action=finalPage&&email=$email");
    }
    else
        $message= "<br>Wrong USER/PASS !!   TRY AGAIN";
        include ("error.php");

        //SOME BUTTONS TO REDIRECT
   echo ' <form action ="." method= "post" >
    <input type="hidden" name="action" value="show_login">
    <input type="submit" value="Try Again">
    </form>
    <br>
    <form action ="." method= "post" >
    <input type="hidden" name="action" value="showRegistration">
    <input type="submit" value="Register">
    </form> ';
}


//SHOW REGISTRATION
else if ( $action == 'showRegistration'){
    include('regForm.php');
}
else if ($action == 'registration') {
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $birth = filter_input(INPUT_POST, 'dob');
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass');
    include('registrationValidationCheck.php');
    $results = userFromAccounts ($email);
    if ($valid == true) {

        if (count($results) > 0) {
            echo " Email address already registered<br><br>";

            // IF EMAIL IS IN THE DATABASE GO BACK OR REGISTER OPTION
            echo "></form>\"";

            echo '<br>';

            echo ">
            </form>\"";
        }
        else {
            addUser($email, $fname, $lname, $birth, $pass);
            //header("Location:?action=finalPage&&email=$email");
        redirect (" <h2>  $greetings $fname $lname, <br> <b style=\"color: green; text-align: center \"> Registration Successful !! Redirecting to Display Page..... </b> <h2>", "?action=finalPage&&email=$email'");
        }
    }
    else {
        echo "></form>\"";
        redirect(" <h2><b style=\"color: red; text-align: center \"> Registration not Complete </b> <h2>", "?action=finalPage'");
    }
}

//SHOW ADD QUESTION FORM
else if ( $action == 'showAddQuestion'){
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    include ('addQuestion.php');
}
else if ($action == 'AddQuestion') {
    $qname = filter_input(INPUT_POST, 'qname', FILTER_SANITIZE_STRING);
    $qskill = filter_input(INPUT_POST, 'qskill', FILTER_SANITIZE_STRING);
    $qbody = filter_input(INPUT_POST, 'qbody', FILTER_SANITIZE_STRING);
    $email = filter_input( INPUT_POST, 'email');
    $datetime =  date('Y-m-d H:i:s');
    $data = str_replace(' ', '', $qskill);
    $skill_array = explode(",", $data);
    $skills = implode(",", $skill_array);
//Array Count
    $array_count = count($skill_array);
    include('questionValidationCheck.php');
    if ($valid == true){
        $results = userFromAccounts ($email);
        foreach ($results as $result) {
            $ownerid = $result['id'];
        }
        addQuestion($email, $ownerid, $datetime, $qname, $qbody, $skills);
//        header("Location: ?action=finalPage&&email=$email");
        redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}

// EDIT QUESTIONS
else if ($action == 'editQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $dataFromQuestions = dataFromQuestionsById ($id);
    if ($id == NULL || $id == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        include('error.php');
    } else {
        include ('editQuestion.php');
    }
}

//UPDATE QUESTIONS
else if ($action == 'updateQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $qname = filter_input(INPUT_POST, 'qname', FILTER_SANITIZE_STRING);
    $qskill = filter_input(INPUT_POST, 'qskill', FILTER_SANITIZE_STRING);
    $qbody = filter_input(INPUT_POST, 'qbody', FILTER_SANITIZE_STRING);
    $email = filter_input( INPUT_POST, 'email');
    $datetime =  date('Y-m-d H:i:s');
    $data = str_replace(' ', '', $qskill);
    $skill_array = explode(",", $data);
    $skills = implode(",", $skill_array);

    //Array Count
    $array_count = count($skill_array);
    include('questionValidationCheck.php');

    if ($valid == true){
        updateQuestion($id, $qname, $qbody, $skills);
//        header("Location:?action=finalPage&&email=$email");
        redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}

//DELETE QUESTIONS
else if ($action == 'deleteQuestion') {
    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($id == NULL || $id == FALSE || $email == NULL || $email == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        //include('error.php');
    } else {
        deleteQuestion($id);
        header("Location: .?action=finalPage&&email=$email");
    }
}

//FINAL DISPLAY PAGE/ QUESTION DISPLAY PAGE
else if ($action == 'finalPage'){
    $greetings = greetings();
    $email = filter_input( INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $results = userFromAccounts ($email);
    $dataFromQuestions = dataFromQuestions ($email);
    include('finalPage.php');
}

// LOGOUT
else if ( $action == 'logout'){
    include('logout.php');
}

?>