<?php
$servername = "localhost";
$username = "root";
$password = "";

$answer = $_POST["answer"];
$question = $_POST["question"];
$modified_question = str_replace("vraag-", "", $question);

$con = new mysqli($servername, $username, $password, 'E-Learning');
$sql = "SELECT * FROM `lijst_vragen` WHERE lijst_vragen.id='$modified_question' AND lijst_vragen.good_answer='$answer'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo "true";
} else {
  echo "false";
}

  



?>