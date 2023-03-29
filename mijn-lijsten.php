<?php

include "header.php";

$nummers = [];

$servername = "localhost";
$username = "root";
$password = "";

$con = new mysqli($servername, $username, $password, 'E-Learning');

$user_id = $_SESSION['gebruikersID'];

$sql = "SELECT * FROM `lijst` WHERE `users_id`=$user_id AND `mode_id`=1;";
$result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title"><?php echo $row['name'];?></h5>
            <p class="card-text"><?php echo $row['description'];?></p>
            <a href="<?php echo "lijst-spelen.php?id=" . $row['id'];?>" class="btn btn-primary">Speel deze lijst!</a>
            </div>
            </div>
            <?php
        }
    }
?>

<link rel='stylesheet' href='styles.css'>
</div>