<?php
session_start();
include "header.php";

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, 'E-Learning');

if (isset($_POST['login'])) {
    $name = htmlspecialchars($_POST['username']);
    $wachtwoord = htmlspecialchars($_POST['password']);
    var_dump($name);

    $sql = "SELECT * FROM gebruikers WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    var_dump($result);

    try {
        while ($row = $result->fetch_array()) {
            //result is in row
            $passwordreturn = password_verify($wachtwoord, $row['password']);

            if ($passwordreturn) {
                $_SESSION['gebruikersnaam'] = $name;
                $_SESSION['gebruikersID'] = $row['id'];
                var_dump($row['id']);
            }
            else {
                echo 'fout';
            }
        }
    } catch (Exception $e) {
        $e->getMessage();
    }


}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Login Pagina</title>
</head>
<body>
    <form method="post" action="login.php">
        <input type="text" required name="username" placeholder="typ hier je gebruikersnaam">
        <input type="password" required name="password" placeholder="typ hier je wachtwoord">
        <input type="submit" name="login" value="Login">
    </form>
</div>

</body>
</html>
