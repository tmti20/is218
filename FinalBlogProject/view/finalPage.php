<?php include 'view/header.php';  ?>

<?php

if ( $results > 0) {
    $fname = $results->getFname();
    $lname = $results->getLname();
}
else {
    echo ' Email does not exist';
}

//GET TIME FROM FUNCTION FILE
$date= date("l \, F   j   Y  \, h:i:sA ");

//PRINTING GREETING MESSAGE
echo "<h2> $greetings  $fname $lname </h2> ";
echo " Today $date<br><br>";

?>
    <!--HERE IS THE BUTTONS---------------------------------------------------------------------->


    <form action ="" method= "post" >
        <input type="hidden" name="action" value="showAddQuestion">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="submit" value="Add Question(PHP)">
    </form>

    <form action ="" method= "post" >
        <input type="hidden" name="action" value="logout">
        <input type="submit" value="LOGOUT">
    </form>





<style>
        * {box-sizing: border-box}

        /* Set height of body and the document to 100% */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        }

        /* Style tab links */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        .tablink:hover {
            background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: white;
            display: none;
            padding: 100px 20px;
            height: 100%;
        }

        #myQuestions {background-color: #9900ff;}
        #allQuestions {background-color: #00cc66;}
        #answeredQuestions {background-color: #0066ff;}
        #aboutProject {background-color: #ff8000;}
    </style>

    <button class="tablink" onclick="openPage('myQuestions', this, '#b84dff')" id="defaultOpen">My Questions</button>
    <button class="tablink" onclick="openPage('allQuestions', this, '#66cc99')" >All Questions</button>
    <button class="tablink" onclick="openPage('answeredQuestions', this, '#3385ff')">Answered Questions</button>
    <button class="tablink" onclick="openPage('aboutProject', this, '#ff9933')">About Project</button>


    <div id="myQuestions" class="tabcontent">
        <h3>Here is Your Questions</h3>

        <?php
        if(count($dataFromQuestions) < 1)
        {
            echo "<h3> Question Not set yet !! Please Add Question</h3>";
        }

        ?>

        <!-- PRINT VALUE IN STYLE------------------------------------------------------------------->
        <table>
            <tr class="title">
                <td><center>Question Title</center></td><td><center>Question Body</center></td><td><center>Skills</center></td>

                <?php foreach($dataFromQuestions as $questions) {?>

            <tr>
                <td><?php echo $questions['title'];?></td>
                <td><?php echo $questions['body'];?></td>
                <td><?php echo $questions['skills'];?></td>
                <!-- -----------------------EDIT QUESTION BUTTON-------------------------------------------------------------->

                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="editQuestion">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="submit" value="EDIT">
                    </form>
                </td>
<!-- --------------------------------------------DELETE BUTTON-------------------------------------------------------------->

                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="deleteQuestion">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                        <input type="submit" value="DELETE">
                    </form>
                </td>
<!-- --------------------------------------------FULL VIEW BUTTON-------------------------------------------------------------->
                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="fullview">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                        <input type="submit" value="Full View">
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>


    </div>




    <div id="allQuestions" class="tabcontent">
        <h3>Here is Question from All USER</h3>


        <?php
        if(count($allQuestions) < 1)
        {
            echo "<h3> Question Not set yet !! Please Add Question</h3>";
        }

        ?>

        <!-- PRINT VALUE IN STYLE------------------------------------------------------------------->
        <table>
            <tr class="title">
                <td><center>Question Title</center></td><td><center>Question Body</center></td><td><center>Skills</center></td>

                <?php foreach($allQuestions as $questions) {?>

            <tr>
                <td><?php echo $questions['title'];?></td>
                <td><?php echo $questions['body'];?></td>
                <td><?php echo $questions['skills'];?></td>
                <!-- -----------------------EDIT QUESTION BUTTON-------------------------------------------------------------->

<!--                <td>-->
<!--                    <form action ="" method= "post" >-->
<!--                        <input type="hidden" name="action" value="editQuestion">-->
<!--                        <input type="hidden" name="id" value="--><?php //echo $questions['id'];?><!--">-->
<!--                        <input type="submit" value="EDIT">-->
<!--                    </form>-->
<!--                </td>-->
                <!-- --------------------------------------------DELETE BUTTON-------------------------------------------------------------->

<!--                <td>-->
<!--                    <form action ="" method= "post" >-->
<!--                        <input type="hidden" name="action" value="deleteQuestion">-->
<!--                        <input type="hidden" name="id" value="--><?php //echo $questions['id'];?><!--">-->
<!--                        <input type="hidden" name="email" value="--><?php //echo $questions['owneremail'];?><!--">-->
<!--                        <input type="submit" value="DELETE">-->
<!--                    </form>-->
<!--                </td>-->


                <!-- --------------------------------------------FULL VIEW BUTTON-------------------------------------------------------------->
                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="fullview">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                        <input type="submit" value="Full View">
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>

    </div>



    <div id="answeredQuestions" class="tabcontent">
        <h3>Answered Questions</h3>

        <!-- PRINT VALUE IN STYLE------------------------------------------------------------------->
        <table>
            <tr class="title">
                <td><center>Question Title</center></td><td><center>Question Body</center></td><td><center>Skills</center></td>

                <?php foreach($dataFromQuestions as $questions) {?>

            <tr>
                <td><?php echo $questions['title'];?></td>
                <td><?php echo $questions['body'];?></td>
                <td><?php echo $questions['skills'];?></td>
                <!-- -----------------------EDIT QUESTION BUTTON-------------------------------------------------------------->

                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="editQuestion">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="submit" value="EDIT">
                    </form>
                </td>
                <!-- --------------------------------------------DELETE BUTTON-------------------------------------------------------------->

                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="deleteQuestion">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                        <input type="submit" value="DELETE">
                    </form>
                </td>
                <!-- --------------------------------------------FULL VIEW BUTTON-------------------------------------------------------------->
                <td>
                    <form action ="" method= "post" >
                        <input type="hidden" name="action" value="fullview">
                        <input type="hidden" name="id" value="<?php echo $questions['id'];?>">
                        <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
                        <input type="submit" value="Full View">
                    </form>
                </td>
            </tr>
            <?php }?>
        </table>


    </div>

    <div id="aboutProject" class="tabcontent">
        <h3>About Project</h3>
        <p>This is project about an application build on PHP.
        Our professor was very young, helpfull and friendly. I have learned a lot of thing in this project.
        Due to short time I couldn't finish all the functionality. </p>
    </div>

    <script>
        function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>



<!--HERE IS THE BUTTONS---------------------------------------------------------------------->

    <!--JAVA SCRIPT FOR STYLISH QUESTION INSER-->
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Questions (JS)</button>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="" method="post">

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

<!--Add Question Button-->

<!--    <br>-->
<!--    <form action ="" method= "post" >-->
<!--        <input type="hidden" name="action" value="showAddQuestion">-->
<!--        <input type="hidden" name="email" value="--><?php //echo $email;?><!--">-->
<!--        <input type="submit" value="Add Question(PHP)">-->
<!--    </form> (Assignment Purpose I added both PHP & JS option )-->
<!---->
<!--    <form action ="" method= "post" >-->
<!--        <input type="hidden" name="action" value="logout">-->
<!--        <input type="submit" value="LOGOUT">-->
<!--    </form>-->


    <!--HERE IS THE BUTTONS---------------------------------------------------------------------->









<?php include 'view/footer.php'; ?>