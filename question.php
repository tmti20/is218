<?php

$question_name = $_POST["qname"];
$question_body = $_POST["question_body"];
$question_skill = $_POST["question_skill"];
$skill_array = explode(",", $question_skill);
$array_count = count($skill_array);

// Question Name code
if (empty($question_name)){
    echo "Should Not empty <br>";
}
elseif(strlen($question_name) <3){
    echo "Should be at least 3 Character<br>";
}
else {
    echo " Here is the Question Name: $question_name <br>";
}
// Question Body
if (empty($question_body)){
    echo "Should Not empty <br>";
}
elseif(strlen($question_body) > 500){
    echo "It Shouldn't be more than 500 Character<br>";
}
else {
    echo " Here is the Question Body: $question_body <br>";
}

// Question Skills Here
if ( $array_count >=2){
        echo "Here is the Question Skills     : " . implode(',', $skill_array);
    }

echo "<br><b>Have a good day !!</b><br>";

?>