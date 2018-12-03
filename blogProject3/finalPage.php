<?php include 'header.php';  ?>

<?php
//START SESSION



//session_start();
//
////REQUIRED FILES
//require "config.php";
//require "function.php";
//
//// TAKING GREETING MESSAGE FROM FUNCTION
//$greetings = greetings();
//
//// CHECK SESSION LOGIN
////gatekeeper();
//
////EMAIL VALUE FORM SESSION
//$email = $_SESSION['email'];
////echo "$emaill";
//QUERY TO GET FIRST NAME AND LAST NAME FROM DATABASE
//$query = "SELECT * FROM accounts where email = '$email'";

if ( $results > 0) {
    foreach ($results as $result) {
        $fname = $result['fname'];
        $lname = $result['lname'] . '<br>';
    }
}
else {
    echo ' Email does not exist';
}

//GET TIME FROM FUNCTION FILE
$date= date("l \, F   j   Y  \, h:i:sA ");

//PRINTING GREETING MESSAGE
echo "<h2> $greetings  $fname $lname </h2>";
echo " Today $date<br><br>";

// QUERY FOR GETTING VALUE FROM QUESTION TABLE
//CHECKING IS THERE HAVE ANY QUESTION ON THE DATABASE OR NOT
if(count($dataFromQuestions) < 1)
{
    echo "<h3> Question Not set yet !! Please Add Question</h3>";
}

?>
<!-- PRINT VALUE IN STYLE-->
<table>
    <tr class="title">
        <td>Title</td><td>Body</td><td>Skills</td><td>&nbsp;</td><td>&nbsp;</td>

        <?php foreach($dataFromQuestions as $questions) {?>

        <tr>
        <td><?php echo $questions['title'];?></td>
        <td><?php echo $questions['body'];?></td>
        <td><?php echo $questions['skills'];?></td>
        <td>
            <form action ="." method= "post" >
                <input type="hidden" name="action" value="editQuestion">
                <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                <input type="hidden" name="title" value="<?php echo $questions['title'];?>">
                <input type="hidden" name="skills" value="<?php echo $questions['skills'];?>">
                <input type="hidden" name="body" value="<?php echo $questions['body'];?>">
                <input type="submit" value="EDIT">
            </form>
        </td>
        <td>
            <form action ="." method= "post" >
                <input type="hidden" name="action" value="deleteQuestion">
                <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                <input type="submit" value="DELETE">
            </form>
        </td>
    </tr>
    <?php }?>
</table>


<!--JAVA SCRIPT FOR STYLISH QUESTION INSER-->
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Questions (JS)</button>

<div id="id01" class="modal">

    <form class="modal-content animate" action="." method="post">

            <br><label> Enter Your Questions</label>


        <div class="container">
            <input type="hidden" name="action" value="AddQuestion">
            <input type="hidden" name="email" value="<?php echo $email;?>">
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
<form action ="." method= "post" >
    <input type="hidden" name="action" value="showAddQuestion">
    <input type="hidden" name="email" value="<?php echo $email;?>">
    <input type="submit" value="Add Question(PHP)">
</form> (Assignment Purpose I added both PHP & JS option )

<form action ="." method= "post" >
    <input type="hidden" name="action" value="logout">
    <input type="submit" value="LOGOUT">
</form>

<?php include 'footer.php'; ?>