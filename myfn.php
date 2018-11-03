<?php
/**
 * Created by PhpStorm.
 * User: TM
 * Date: 11/2/2018
 * Time: 3:45 PM
 */
function product($product_id) {
    global $db;
    echo "%%%%%%%%%%%%%%%%%%%%%%%%%%";
    $query = 'SELECT * FROM account
              WHERE id = :product_id';

    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    echo "*******rrrrrrrrrrrrrrr@@@@@@@@@@@@@@@@**********";
    return $product;

}
?>