<?php
//CONNECTION WITH OTHER FILES
require "config.php";
require "function.php";

$id = filter_input(INPUT_POST, 'id');
deleteQuestion($id);
header("Location: finalPage.php");

?>