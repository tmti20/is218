<?php include 'header.php';  ?>

<?php
//SESSION STARTING
//session_start();
//
////CONNECTION WITH OTHER FILES
//require "config.php";
//require "function.php";
//
//// INPUT VALUE FROM QUESTION FORM
//$qname = filter_input(INPUT_POST, 'qname', FILTER_SANITIZE_STRING);
//$qskill = filter_input(INPUT_POST, 'qskill', FILTER_SANITIZE_STRING);
//$qbody = filter_input(INPUT_POST, 'qbody', FILTER_SANITIZE_STRING);
$datetime =  date('Y-m-d H:i:s');
$data = str_replace(' ', '', $qskill);
$skill_array = explode(",", $data);
$skills = implode(",", $skill_array);
//Array Count
$array_count = count($skill_array);

//$_SESSION['logged']=true;
//$email = $_SESSION['email'];

//CHECK CONDITIONS FOR TITLE
function checkTitle($qname,$email){
    $valid = true;
    if (empty($qname)) {
            echo 'try';
//        header("Location: ?action=showAddQuestion&&email=$email");
        //redirect("Title Should Not be empty !! Redirecting Back.......... ","?action=showAddQuestion&&email=$email");
        $valid = false;
    } elseif (strlen($qname) < 3) {
        redirect("Title Should be at least 3 Character !! Redirecting Back........ ","?action=showAddQuestion&&email=$email");
        $valid = false;
    }
    return $valid;
}

//CHECKING CONDITIONS FOR SKILLS
function checkSkill($array_count,$email){
    $valid = true;
    if ($array_count < 2) {
        redirect("Enter at least 2 skills !! Redirecting Back....... ","?action=showAddQuestion&&email=$email");
        echo "<br>";
        $valid = false;
    }
    return $valid;
}

//CONDITION CHECK FOR BODY
function checkBody ($qbody,$email){
    $valid = true;
    if (strlen($qbody)===0) {
        $valid = false;
        redirect("Body Should Not be Empty !! Redirecting Back.......... ","?action=showAddQuestion&&email=$email");
    }
    elseif (strlen($qbody) > 500){
    $valid = false;
        redirect("It Shouldn't be more than 500 Character !! Redirecting Back............ ","?action=showAddQuestion&&email=$email");
    }
    return $valid;
}

//VALIDATION CHECK FOR ACTION
if ( checkTitle($qname,$email) && checkBody ($qbody,$email) && checkSkill($array_count,$email) ){
    global $db;
//    $query = "SELECT * FROM accounts where email = '$email'";
    $results = userFromAccounts ($email);
    foreach ($results as $result) {
        $ownerid = $result['id'];}
    addQuestion($email, $ownerid, $datetime, $qname, $qbody, $skills);
    redirect(" Question Insert Successfully !! Redirecting to the Blog....... ","?action=finalPage&&email=$email");
}
?>

<?php include 'footer.php'; ?>
