<?php include 'header.php';  ?>

<form action ="../../../../../xampp/htdocs/t/n" method= "post">
        <input type="hidden" name="action" value="AddQuestion">
        <input type="hidden" name="email" value="<?php echo "$email";?>">
        <!-- User Input Question Name -->
        Question Name: <input type = text name = "qname"  id = "user" placeholder="Enter Questions Name "  autofocus ><br>
        <!-- User Input Question Skill-->
        Question Skill: <input type = text name = "qskill"  id = "user" placeholder="Enter Question Skills" ><br>
        <!-- User Input Question Body -->
        Question Body: <input type = text name = "qbody"  id = "user" placeholder="Enter Question Body" > <br>
        <!-- Submit Button -->
        <input type=submit value="Send" ><br>

</form>

<?php include 'footer.php'; ?>