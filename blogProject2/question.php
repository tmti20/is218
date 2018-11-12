<?php include 'header.php';  ?>

<?php
//SESSION STARTING
session_start();

//CONNECTION WITH OTHER FILES
require "config.php";
require "function.php";

$email = $_GET['email'];
// INPUT VALUE FROM QUESTION FORM
$qname = filter_input(INPUT_POST, 'qname', FILTER_SANITIZE_STRING);
$qskill = filter_input(INPUT_POST, 'qskill', FILTER_SANITIZE_STRING);
$qbody = filter_input(INPUT_POST, 'qbody', FILTER_SANITIZE_STRING);
$datetime =  date('Y-m-d H:i:s');
$data = str_replace(' ', '', $qskill);
$skill_array = explode(",", $data);
$skills = implode(",", $skill_array);
//Array Count
$array_count = count($skill_array);

//$_SESSION['logged']=true;
//$email = $_SESSION['email'];

//CHECK CONDITIONS FOR TITLE
function checkTitle($qname){
    $valid = true;
    if (empty($qname)) {

        redirect("Title Should Not be empty !! Redirecting Back.......... ","finalPage.php");
        $valid = false;
    } elseif (strlen($qname) < 3) {
        redirect("Title Should be at least 3 Character !! Redirecting Back........ ","finalPage.php");
        $valid = false;
    }
    return $valid;
}

//CHECKING CONDITIONS FOR SKILLS
function checkSkill($array_count){
    $valid = true;
    if ($array_count < 2) {
        redirect("Enter at least 2 skills !! Redirecting Back....... ","finalPage.php");
        echo "<br>";
        $valid = false;
    }
    return $valid;
}

//CONDITION CHECK FOR BODY
function checkBody ($qbody){
    $valid = true;
    if (strlen($qbody)===0) {
        $valid = false;
        redirect("Body Should Not be Empty !! Redirecting Back.......... ","finalPage.php");
    }
    elseif (strlen($qbody) > 500){
    $valid = false;
        redirect("It Shouldn't be more than 500 Character !! Redirecting Back............ ","finalPage.php");
    }
    return $valid;
}

//VALIDATION CHECK FOR ACTION
if ( checkTitle($qname) && checkBody ($qbody) && checkSkill($array_count) ){

    global $db;
    $query = "SELECT * FROM account where email = '$email'";
    $results = runQuery($query);

    foreach ($results as $result) {
        $ownerid = $result['id'];}
    addQuestion($email, $ownerid, $datetime, $qname, $qbody, $skills);
    redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","finalPage.php?email=$email");
}
?>

<?php include 'footer.php'; ?>
