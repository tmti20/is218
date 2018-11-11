<?php include 'header.php';  ?>
<?php
//SESSION START
session_start();

//CONNECTED OTHER FILES
require 'config.php';
require "function.php";

// GETTING INPUT FROM DIFFERENT FILES
$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass');

// GETTING GREETING VALUE FOR FUNCITON
$greetings = greetings();
//SESSION LOGIN DEFINE & VALUE STORE
$_SESSION['logged'] = true;
$_SESSION['email'] = $email;


// CHECKING CONDITIONS FOR EMAIL
function checkEmail ( $email)
{
    $valid = TRUE;
    if (empty($email)) {
        echo "You must enter Email Address<br>";
        $valid = false;
    }
    elseif (strpos($email, '@') === false) {
        echo "The Email is Missing '@' !!  <br>";
        $valid = false;
    }
    elseif (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo " '$email' is Not a valid <br> ";
        $valid = false;
    }
    return $valid;
}

//CHECKING CONDITIONS FOR PASSWORD
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

// CHECKING AUTHENTICATION
if (checkEmail($email) && checkPass($pass)){

    $query = "select * from accounts where email='$email' and password='$pass'";
    $results = runQuery($query);
    //GETTING VALUES FROM DATABASE
    foreach ($results as $result) {
        $fname = $result['fname'] ;
        $lname = $result['lname'] . '<br>';
    }
    if(count($results) > 0){
        //USING REDIRECT FUNCTION TO REDIRECT TO NEW PAGE AND PRINT NEW MESSAGE
        redirect (" <h2>  $greetings $fname $lname <br> <b style=\"color: green; text-align: center \"> Login Successful !! Redirecting to Display Page.... </b> <h2>", "finalPage.php");
    }
    else{
        header("Location: loginFail.php");
    }
}
else
    // TRY AGAIN BUTTON IF IT'S WRONG
    echo ">
      </form>\"";
?>

<?php include 'footer.php'; ?>