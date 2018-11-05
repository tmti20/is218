<?php
/**
 * Created by PhpStorm.
 * User: TM
 * Date: 11/4/2018
 * Time: 10:33 PM
 */
include("configure.php");
//Email input check validation
$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$pass = filter_input(INPUT_POST, 'pass');
$a = '@';
//Email validation check
if ( empty($email) ){
    echo "<br>You must enter Email Address<br>";
}
elseif (strpos($email,$a) !== false) {
    // Validate e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("$email is a valid email address");
        return true;
    } else {
        echo("$email is <b>not</b> a valid email address");
    }
}
else {
    echo "<br>The Email is Missing '@' !!  <br>";
}


if (isset( $pass)){
    if ( strlen($pass) < 8 ){
        echo " <br>Password must be at least 8 character !<br>";
 }
 else {
        echo " <br> Your Password is Correct <br>";
        return true;
    }
}
else{
    echo"<br>You Must Enter Password";
}

if ($email != true || $pass != true){
    echo "<br>this will work if everything is okay";
}



?>