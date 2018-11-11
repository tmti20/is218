<?php include 'header.php';  ?>

<form action="registration.php" method = "POST">
    <!-- First Name Input -->
    First Name: <input type = text name = "fname"  id = "user" placeholder="Enter First Name "  autofocus ><br>
    <!-- Last Input -->
    Last Name: <input type = text name = "lname"  id = "user" placeholder="Enter Last Name " ><br>
    <!-- Date of Birth Input -->
    Birthday: <input type = date name = "dob"  id = "user" placeholder="Enter Date of Birth " ><br>
    <!-- Email Address Input -->
    Email: <input type = text name = "email"  id = "user" placeholder="Enter Your Email "><br>
    <!--Password Input -->
    Password :  <input type = password  name = "pass"  id = "password" placeholder="Enter Password " ><br>

    <!-- Submit Button -->
    <input type=submit value="SEND" ><br>
</form>

<!--USING THIS FORM TO REDIRECT TO LOGIN PAGE-->
<form action ="loginForm.php" method= "post" >
    <input type="submit" value="LOGIN">
</form>

<?php include 'footer.php'; ?>