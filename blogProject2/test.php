<?php

session_start();
if (!isset($_SESSION['logged'])){
    echo"<br> Login First...<br><br>";
    //header("refresh:3;url=login.html");
    exit();
}
$email=$_SESSION["email"];
echo $email;
?>