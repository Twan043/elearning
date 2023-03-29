<?php


if(isset($_SESSION['gebruikersnaam'])) {
    session_destroy();
}
else {
    header('Location: index.php');
}

header('Location: index.php');