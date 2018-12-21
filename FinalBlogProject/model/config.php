<?php

//$username = 'ti36';
//$password = 'fQ8f50AMO';
//$hostname = 'sql2.njit.edu';
//$dsn = "mysql:host=$hostname;dbname=$username";
//try {
//    $db = new PDO($dsn, $username, $password);
//    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    //echo "Connected successfully<br>";
//}
//catch(PDOException $e)
//{
//	 echo "Connection failed: " . $e->getMessage();
//	http_error("500 Internal Server Error\n\n"."There was a SQL error:\n\n" . $e->getMessage());
//}


class Database {
    private static $username = 'ti36';
    private static $password = 'fQ8f50AMO';
    private static $dsn = 'mysql:host=sql2.njit.edu;dbname=ti36';
    private static $db;
    private function __construct() {}
    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $message = $e->getMessage();
                include('../error/error.php');
                exit();
            }
        }
        return self::$db;
    }
}

?>