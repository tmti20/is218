<?php include 'view/header.php';  ?>
<?php
if ( $result > 0) {
    $fname = $result->getFname();
    $lname = $result->getLname();
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
<!DOCTYPE html>
<html>
<head>
    <style>
        .fullbox {
            background-color: green;
            color: white;
            margin: 20px;
            padding: 20px;
        }

        .title {
            text-align: center;
            background-color: red;
            color: white;
            margin: 20px;
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
        }
        .body {
            text-align: center;
            background-color: red;
            color: white;
            margin: 20px;
            padding: 10px;
            border: 2px solid black;
            border-radius: 5px;
        }

        .skills {
            text-align: center;
            background-color: red;
            color: white;
            margin: 20px;
            padding: 20px;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="fullbox">
    <?php foreach($results as $questions) {?>
    <div class="title">Title:<h2><?php echo $questions['title'];?></h2></div>
    <div class="body">Questions:<p><?php echo $questions['body'];?></p></div>
    <div class="skills">Skills:<br><?php echo $questions['skills'];?></div>


        <form action ="" method= "post" >
            <input type="hidden" name="action" value="finalPage">
            <input type="hidden" name="email" value="<?php echo $questions['owneremail'];?>">
            <input type="submit" value="Back to Display">
        </form>
    <?php }?>
</div>

</body>
</html>


<?php include 'view/footer.php'; ?>
