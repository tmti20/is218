<?php include 'header.php';  ?>

<?php
//START SESSION
session_start();

//REQUIRED FILES
require "config.php";
require "function.php";

$email = $_GET ['email'];

// TAKING GREETING MESSAGE FROM FUNCTION
$greetings = greetings();

// CHECK SESSION LOGIN
//gatekeeper();

//EMAIL VALUE FORM SESSION
//$email = $_SESSION['email'];
//echo $email;

//QUERY TO GET FIRST NAME AND LAST NAME FROM DATABASE
$query = "SELECT * FROM account where email = '$email'";
$results = runQuery($query);

foreach ($results as $result) {
    $fname = $result['fname'] ;
    $lname = $result['lname'] . '<br>';
}

//GET TIME FROM FUNCTION FILE
$date= date("l \, F   j   Y  \, h:i:sA ");

//PRINTING GREETING MESSAGE
echo "<h2> $greetings  $fname $lname </h2>";
echo " Today $date<br><br>";

// QUERY FOR GETTING VALUE FROM QUESTION TABLE
global $db;
$query = "SELECT * FROM questions where owneremail = '$email'";
$results = runQuery($query);

//CHECKING IS THERE HAVE ANY QUESTION ON THE DATABASE OR NOT
if(count($results) < 1)
{
    echo "<h3> Question Not set yet !! Please Add Question</h3>";
}
else {
    foreach ($results as $result) {
        $title = $result['title'] . '<br>';
        $body = $result['body'] . '<br>';
        $skill = $result['skills'] . '<br>';
    }
}

?>
<!-- PRINT VALUE IN STYLE-->
<table>
    <tr class="title">
        <!-- <td>id</td><td>Email</td>
        <td>Owner ID</td><td>Date</td> -->
        <td>Title</td><td>Body</td><td>Skills</td><!-- <td>Score</td>
        </tr> -->

        <?php foreach($results as $questions) {?>
    <tr>
        <!-- <td><?php echo $questions['id'];?></td>
            <td><?php echo $questions['owneremail'];?></td>
            <td><?php echo $questions['ownerid'];?></td>
            <td><?php echo $questions['createddate'];?></td> -->
        <td><?php echo $questions['title'];?></td>
        <td><?php echo $questions['body'];?></td>
        <td><?php echo $questions['skills'];?></td>
        <!-- <td><?php echo $questions['score'];?></td>
             -->
    </tr>
    <?php }?>
</table>


<!--JAVA SCRIPT FOR STYLISH QUESTION INSER-->
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Questions (JS)</button>

<div id="id01" class="modal">

    <form class="modal-content animate" action="question.php?email=<?php echo $email?>" method="post">

            <br><label> Enter Your Questions</label>


        <div class="container">
            <!-- User Input Question Name -->
            Question Name: <input type = text name = "qname"  id = "user" placeholder="Enter Questions Name "  autofocus ><br>

            <!-- User Input Question Skill-->
            Question Skill: <input type = text name = "qskill"  id = "user" placeholder="Enter Question Skills" ><br>
            <!-- User Input Question Body -->
            Question Body: <input type = text name = "qbody" rows="5" cols="40" id = "user" placeholder="Enter Question Body" > <br>

            <!-- Submit Button -->
            <input type=submit value="SEND" ><br>

        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

        </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

<br>
<form action ="addQuestion.php?email=<?php echo $email?>" method= "post" >
    <input type="submit" value="Add Question(PHP)">
</form> (Assignment Purpose I added both PHP & JS option )

<form action ="logout.php" method= "post" >
    <input type="submit" value="LOGOUT">
</form>

<?php include 'footer.php'; ?>