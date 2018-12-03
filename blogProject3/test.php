<?php
echo "session test";
session_start();
$_SESSION['name'] ="tancir";
echo $_SESSION['name'];

echo $_SESSION['email'];
?>