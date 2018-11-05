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

//test query
//$name = '1';
echo "%%%%%%%%%%%%%%%%%%%%%%%%%%<br>";
global $db;
$query = 'SELECT * FROM account where fname = "Mike"';
$statement = $db->prepare($query);
//$statement->bindValue(":product_id", $product_id);
$statement->execute();
$product = $statement->fetchAll();
$statement->closeCursor();
//$statement->debugDumpParams();

//print_r ($product);
echo "<br>";
foreach ($product as $products)
    echo $products['fname'];
    echo "<br>";
//print_r($products);
//}


$db = null;

?>