<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];

$email = $_POST["email"];
$pass = $_POST["pass"];
$a = "@";
echo " <b>Welcome</b> <br> ";
if ( empty($fname) ){

    echo "You Must Enter First Name<br>";
}
else {

    echo "Your First Name is : $fname<br>";

}

if ( empty($lname) ){

    echo "You Must Enter Last Name<br>";
}
else {

    echo "Your Last Name is : $lname<br>";

}

if ( empty($dob) ){

    echo "You Must Enter Date of Birth<br>";
}
else {

    echo "Your Data of Birth is : $dob<br>";

}

if ( empty($email) ){

    echo "You must enter Email Address<br>";
}

elseif (strpos($email,$a) !== false) {

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