<?php

// DEFINE REQUIRED MODELS/FUNCTIONS
require('model/config.php');
require('model/function.php');
require('model/userDB.php');
require('model/questionDB.php');
require('model/user.php');
require('model/question.php');
require('model/question_db.php');

//CHECK THE VALUE IF ITS NULL
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        if ($_SESSION["logged"] == True ){
            header(".?action=finalPage");
        }else
            $action = 'show_login';
    }
}

//SHOW LOGIN FORM
if ( $action == 'show_login'){
    session_start();
    include('view/loginForm.php');
}

//LOGIN ACTION
else if ($action == 'login') {
    session_start();

    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $_SESSION["email"] =$email;
    $pass = filter_input(INPUT_POST, 'pass');

    $_SESSION["logged"] === True;
    $_SESSION["email"] =$email;

    include('view/loginValidationCheck.php');

    $results = UserDB::authentication ($email, $pass);
    if ($valid && $results ){
        header("Location:?action=finalPage");
    }
    else
        $message= "<br>Wrong USER/PASS !!   TRY AGAIN";
        include("error/error.php");

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
    session_start();

    include('view/regForm.php');
}
else if ($action == 'registration') {
    session_start();
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $birth = filter_input(INPUT_POST, 'dob');
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $pass = filter_input(INPUT_POST, 'pass');

    $_SESSION["logged"] === True;
    $_SESSION["email"] =$email;
    include('view/registrationValidationCheck.php');
    $results = UserDB::userFromAccounts ($email);
    $result = $results->getEmail();
    if ($valid == true) {

        if (count($result) > 0) {
            echo " Email address already registered<br><br>";
        }
        else {
            $addUser = new User( $email, $pass, $fname, $lname, $birth);
            UserDB::addUser($addUser);
            header("Location:?action=finalPage");
       }
    }
}

//SHOW ADD QUESTION FORM
else if ( $action == 'showAddQuestion'){
    session_start();

    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    include('view/addQuestion.php');
}
else if ($action == 'AddQuestion') {
    session_start();

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

    $_SESSION["logged"] =$email;
    include('view/questionValidationCheck.php');
    if ($valid == true){
        $results = UserDB::userFromAccounts ($email);
        $ownerid = $results -> getId();

        $addQuestion= new Question($email, $ownerid, $datetime, $qname, $qbody, $skills);
        QuestionDB::addQuestion($addQuestion);
        header("Location: ?action=finalPage");
//        redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage&&email=$email");
    }
    else{
        echo ' Try again';
    }
}

// EDIT QUESTIONS
else if ($action == 'editQuestion') {
    session_start();

    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $dataFromQuestions = dataFromQuestionsById ($id);

    if ($id == NULL || $id == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        include('error/error.php');
    } else {
        include('view/editQuestion.php');
    }
}

//UPDATE QUESTIONS
else if ($action == 'updateQuestion') {
    session_start();

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

    $_SESSION["email"] =$email;
    include('view/questionValidationCheck.php');

    if ($valid == true){
        updateQuestion($id, $qname, $qbody, $skills);
//        header("Location:?action=finalPage&&email=$email");
        redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage");
    }
    else{
        echo ' Try again';
    }
}

//DELETE QUESTIONS
else if ($action == 'deleteQuestion') {
    session_start();

    $id = filter_input(INPUT_POST, 'id',FILTER_VALIDATE_INT);
    $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    if ($id == NULL || $id == FALSE || $email == NULL || $email == FALSE ) {
        $error = "Missing or incorrect product id or category id.";
        include('error/error.php');
    } else {
        deleteQuestion($id);
        header("Location: .?action=finalPage");
    }
}

else if ($action == 'fullview') {
    session_start();

    if ($_SESSION["logged"]=== false ){
        header("Location: logout.php");
    }
    $email= $_SESSION["email"];
    $greetings = greetings();
    //$email = filter_input( INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $result = UserDB::userFromAccounts ($email);

    $id = $_POST['id'];

    $results = dataFromQuestionsById ($id);
    include('view/fullview.php');
}

//FINAL DISPLAY PAGE/ QUESTION DISPLAY PAGE
else if ($action =='finalPage'){
    session_start();

    if ($_SESSION["logged"]=== false ){
        header("Location: logout.php");
    }
    $email= $_SESSION["email"];
    $greetings = greetings();
    //$email = filter_input( INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $results = UserDB::userFromAccounts ($email);
    $dataFromQuestions = dataFromQuestions ($email);
    $allQuestions = getallquestions();
    include('view/finalPage.php');
}

// LOGOUT
else if ( $action == 'logout'){
    include('view/logout.php');
}

?>