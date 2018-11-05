<?php
/**
 * Created by PhpStorm.
 * User: TM
 * Date: 11/5/2018
 * Time: 7:56 AM
 */
function authentic( $email, $pass ){
    global $db;
    $sql = "SELECT count(*) FROM account WHERE email = '$email' and pass = '$pass'";
    $result = $con->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();
    echo "$number_of_rows";
}
?>