<?php
/**
 * Created by PhpStorm.
 * User: TM
 * Date: 11/1/2018
 * Time: 9:46 PM
 */
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
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query= "SELECT * FROM account";
    $statement = $db -> prepare($query);
    $statement -> execute();
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
//include ("myfn.php");
//$email = $_POST["email"];
//$product_id = $_POST["pass"];
//
//product($product_id);
//header('')


//test query


$db = null;
?>