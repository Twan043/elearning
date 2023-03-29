<?php
session_start();
include "header.php";

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, 'E-Learning');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit'])){
    $name = htmlspecialchars($_POST['name']);
    $wachtwoord = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $sql2 = "SELECT name FROM gebruikers WHERE name = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("s", $name);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if ($row = $result2->fetch_array() == true) {
        echo "<script>alert('naam bestaat al');</script>";
    } else {
        $sql = "INSERT INTO `gebruikers` (`name`, `password`) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $name, $wachtwoord);
        $result = $stmt->execute();
        $realResult = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registeren</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
</div>
<form method="post" action="">
        <br><label>Vul hier alles onder in om een account te maken</label>
        <br><label>Naam:</label>
        <input type="text" name="name" required placeholder="Vul hier je gebruikersnaam in">
        <input type="password" name="wachtwoord" required placeholder="Vul hier je wachtwoord in">
        <input type="submit" name="submit" placeholder="submit">
</form>
</body>
</html>