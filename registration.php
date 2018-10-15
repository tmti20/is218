<?php
// Welcome message
echo " <b>Welcome</b> <br> ";

// Input form registration.html
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$a = "@";

//Check Conditions for First Name
if ( empty($fname) ){
    echo "You Must Enter First Name<br>";
}
else {
    echo "Your First Name is : $fname<br>";
}

//Check Conditions for last Name
if ( empty($lname) ){
    echo "You Must Enter Last Name<br>";
}
else {
    echo "Your Last Name is : $lname<br>";
}

//Check Conditions for Date of Birth
if ( empty($dob) ){
    echo "You Must Enter Date of Birth<br>";
}
else {
    echo "Your Data of Birth is : $dob<br>";
}

//Check Conditions for Email
if ( empty($email) ){
    echo "You must enter Email Address<br>";
}
elseif (strpos($email,$a) !== false) {
    echo " Your Email is: $email <br> ";
}
else {
    echo "The Email is Missing '@' !! <br>";
}

//Check Conditions for Password
if (empty($pass)){

    echo " You must enter Password!!<br>";
}
elseif ( strlen($pass) < 8 ){

    echo "Password must be at least 8 character !<br>";
}
else {
    echo " The Password is Correct<br>";
}

//Goodbye Message
echo "<br><b>Have a good day !!</b><br>";

?>