<?php include 'header.php';  ?>

  <div class='container' align="center">

    <form action="login.php" method = "POST">

        <!-- User Input -->
        Email Addr: <input type = text name = "email"  id = "user" placeholder="Enter Email "  autofocus autocomplete="off"><br>
        <!--Password Input -->
        Password :  <input type = password name = "pass"  id = "pass" placeholder="Enter Password " autocomplete="off"><br>
        <!-- Submit Button -->
        <input type=submit value="SEND" ><br>
    </form>

<!--      USING THIS FORM TO REDIRECT TO REGISTRATION FORM-->
      <form action ="regForm.php" method= "post" >
          <input type="submit" value="REGISTER">
      </form>

  </div>

<?php include 'footer.php'; ?>