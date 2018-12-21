<?php
echo "best takjhjllkncZXcr of luck";
session_start();
$test= $_SESSION["favcolor"];
if(!isset($_SESSION["logged"])){
        //header("Location: logout.php");
    }
echo $test ;

?>