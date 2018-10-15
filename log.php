<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style2.css">
    </head>
<body >
<fieldset   class="F1">


<?php
//Welcome Message
echo " <b>Welcome</b> <br> ";

//Get Input Values from form.html
$email = $_POST["email"];
$pass = $_POST["pass"];
$a = "@";

// Checking Conditions for Email
if ( empty($email) ){
    echo "You must enter Email Address<br>";
}
elseif (strpos($email,$a) !== false) {
    echo " Your Email is: $email <br> ";
}
else {
    echo "The Email is Missing '@' !!  <br>";
}

// Checking Conditions for Password
if (empty($pass)){
    echo " You must enter Password!!<br>";
}
elseif ( strlen($pass) < 8 ){
     echo " Password must be at least 8 character !<br>";
 }
 else {
     echo " The Password is Correct<br>";
 }

//Goodbye Message
echo "<br><b>Have a good day !!</b><br>";

?>

</fieldset>
</body>
</html>
