<?php include 'header.php';  ?>

<?php
//SESSION STARING HERE
session_start();

//CONNECTION WITH OTHER FILES
require 'config.php';
require  'function.php';

$greetings = greetings();
//INPUR FROM FORM
$fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
$birth = filter_input(INPUT_POST, 'dob');
$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass');

//DEFINE SESSSION
$_SESSION['logged']=true;
$_SESSION['email'] = $email;

// VALIDATION CHECK FOR FIRST NAME
function checkFname($fname){
    $valid = true;
    if (empty($fname)){
        echo " You must Enter First Name<br>";
        $valid = false;
    }
    return $valid;
}

// VALIDATION CHECK FOR LAST NAME
function checkLname($lname){
    $valid = true;
    if (empty($lname)){
        echo " You must Enter last Name<br>";
        $valid = false;
    }
    return $valid;
}

// VALIDATION FOR DATE OF BIRTH
function checkBirth($birth){
    $valid = true;
    if (empty($birth)){
        echo " You must Enter DOB <br>";
        $valid = false;
    }
    return $valid;
}

//VALIDATION CHECK FOR EMAIL
function checkEmail ( $email){
    $valid = TRUE;
    if (empty($email)) {
        echo "You must enter Email Address<br>";
        $valid = false;

    }
    elseif (strpos($email, '@') === false){
        echo "The Email is Missing '@' !!  <br>";
        $valid = false;
    }
    return $valid;
}

//VALIDATION CHECK FOR PASSWORD
function checkPass ( $pass)
{
    $valid = TRUE;
    if (empty($pass)){
        echo " You must enter Password!!<br>";
        $valid = false;
    }
    elseif ( strlen($pass) < 8 ){
        echo " Password must be at least 8 character !<br>";
        $valid = false;
    }
    return $valid;
}

//IF EVERY CONDINTION VALID THEM PERFORM THE ACTION HERE
if ( checkFname($fname) && checkLname($lname) && checkBirth($birth) && checkEmail($email) && checkPass($pass)){

    $query = "select * from accounts where email='$email'";
    $results = runQuery($query);

    if(count($results) > 0) {
        echo " Email address already registered<br><br>";
        // IF EMAIL IS IN THE DATABASE GO BACK OR REGISTER OPTION
        echo "<form action =\"regForm.php\" method= \"post\" >
          <input type=\"submit\" value=\"BACK\"></form>";

        echo '<br>';

        echo "<form action =\"loginForm.php\" method= \"post\" >
          <input type=\"submit\" value=\"LOGIN\">
      </form>";
    }

    else{
        $results = addUser($email,$fname,$lname,$birth,$pass);
        redirect (" <h2>  $greetings $fname $lname, <br> <b style=\"color: green; text-align: center \"> Registration Successful !! Redirecting to Display Page..... </b> <h2>", "finalPage.php");
    }
}
else {
    echo "<form action =\"regForm.php\" method= \"post\" >
          <input type=\"submit\" value=\"BACK\"></form>";
    //redirect(" <h2><b style=\"color: red; text-align: center \"> Registration not Complete </b> <h2>", "regForm.php");
}

?>

<?php include 'footer.php'; ?>
