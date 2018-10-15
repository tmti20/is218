<?php

$email = $_POST["email"];
$pass = $_POST["pass"];
$a = "@";

if ( empty($email) ){


    echo "You must enter Email Address<br>";
}

elseif (strpos($email,$a) !== false) {
    echo " <b>Welcome</b> <br> ";
    echo " Your Email is: $email <br> ";
}

else {

    echo "The Email is not valid !! Missing @ <br>";

}

 if (empty($pass)){

    echo " You must enter Password!!<br>";
}
 elseif ( strlen($pass) < 8 ){

     echo " Invalid Password!! Password must be at least 8 character !<br>";
 }
 else {

     echo " The Password is Correct<br>";

 }



echo "<br><b>Have a good day !!</b><br>";

?>