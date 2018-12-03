<?php include 'header.php';  ?>
<?php

$data = str_replace(' ', '', $qskill);
$skill_array = explode(",", $data);
$skills = implode(",", $skill_array);
//Array Count
$skills_count = count($skill_array);


$valid = TRUE;
if ($valid) {
    $valid = TRUE;
    if (empty($qname)) {
        echo"Question Title Should Not be Empty !! Go Back..........<br> ";
        $valid = false;
    } elseif (strlen($qname) < 3) {
        echo "Title Should be at least 3 Character !! Go Back........<br> ";
        $valid = false;
    }

    if (empty($skills)) {
        echo "Question skills Should Not be Empty !! Go Back..........<br> ";
        $valid = false;
    }else if ($skills_count < 2) {
        echo"Enter at least 2 skills !! Go Back.......<br> ";
        echo "<br>";
        $valid = false;
    }

    if (strlen($qbody)===0) {
        $valid = false;
        echo" Question Body Should Not be Empty !! Go Back..........<br> ";
    } elseif (strlen($qbody) > 500){
        $valid = false;
        echo"It Shouldn't be more than 500 Character !! Go Back............ <br>";
    }

    return $valid;
}

?>

<?php include 'footer.php'; ?>
