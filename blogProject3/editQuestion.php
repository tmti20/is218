

<?php include 'header.php';  ?>
<?php
foreach ($dataFromQuestions as $result) {
        $email = $result ['owneremail'];
        $title = $result['title'] ;
        $body = $result['body'] ;
        $skills = $result['skills'];
    }
?>
<form action ="../../../../../xampp/htdocs/t/n" method= "post">
    <input type="hidden" name="action" value="updateQuestion"><br>
     <input type="hidden" name="id" value="<?php echo $id ?>"><br>
    <input type="hidden" name="email" value="<?php echo $email ?>"><br>
    <!-- User Input Question Name -->
    Question Name: <input type = text name = "qname"  id = "user" value="<?php echo $title ?>" placeholder="Enter Questions Name "  autofocus ><br>
    <!-- User Input Question Skill-->
    Question Skill: <input type = text name = "qskill"  id = "user" value="<?php echo $skills ?>" placeholder="Enter Question Skills" ><br>
    <!-- User Input Question Body -->
    Question Body: <input type = text name = "qbody"  id = "user" value="<?php echo $body; ?>" placeholder="Enter Question Body" > <br>
    <!-- Submit Button -->
    <input type=submit value="Send" ><br>

</form>

<?php include 'footer.php'; ?>
