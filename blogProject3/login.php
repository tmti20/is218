<?php include 'header.php';  ?>
<?php
//SESSION START
//session_start();

////SESSION LOGIN DEFINE & VALUE STORE
//$_SESSION['logged'] = true;
//$_SESSION['email'] = $email;

//// GETTING GREETING VALUE FOR FUNCITON
$greetings = greetings();



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
    $results = authentication ($email, $pass);

//    $query = "select * from accounts where email='$email' and password='$pass'";
//    $results = runQuery($query);
    //GETTING VALUES FROM DATABASE
    foreach ($results as $result) {
        $fname = $result['fname'] ;
        $lname = $result['lname'] . '<br>';
    }
    if(count($results) > 0){
        //USING REDIRECT FUNCTION TO REDIRECT TO NEW PAGE AND PRINT NEW MESSAGE
//        header("Location:?action=finalPage&&email=$email");
        redirect (" <h2>  $greetings $fname $lname <br> <b style=\"color: green; text-align: center \"> Login Successful !! Redirecting to Display Page.... </b> <h2>", "?action=finalPage&&email=$email");
    }
    else{
        header("Location: loginFail.php");
    }
}
else
    // TRY AGAIN BUTTON IF IT'S WRONG

?>

    <form action ="../../../../../xampp/htdocs/t/n" method= "post" >
        <input type="hidden" name="action" value="show_login">
        <input type="submit" value="Try Again">
    </form>

<?php include 'footer.php'; ?>