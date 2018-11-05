<?php

//connect to the database
echo "<h1>PDO demo!</h1>";
$username = 'ti36';
$password = 'fQ8f50AMO';
$hostname = 'sql2.njit.edu';
$dsn = "mysql:host=$hostname;dbname=$username";
try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$db = null;

?>