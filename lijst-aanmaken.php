<?php
session_start();
include "header.php";


if(isset($_POST['submit'])) {
    onSubmit();
}

function onSubmit() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $beschrijving = $_POST['beschrijving'];
    $conn = new mysqli($servername, $username, $password, 'E-Learning');    
    $sql = "INSERT INTO `lijst`(`users_id`, `name`, `description`, `mode_id`) VALUES (?,?,?,?)";
    var_dump($sql);
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issi', $_SESSION['gebruikersID'], $_POST['titel'], $_POST['beschrijving'], $_POST['mode']);
    $stmt->execute();
    $sql = "SELECT * FROM `lijst` WHERE lijst.description='$beschrijving'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id_lijst = $row['id'];
            var_dump($id_lijst);
        }
    for($i = 1;$i<6;$i++) {
        $conn = new mysqli($servername, $username, $password, 'E-Learning'); 
        $sql = "INSERT INTO `lijst_vragen`(`lists_id`, `question`, `good_answer`) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $vraag_id = $_POST['Vraag' . $i];
        $antwoord_id = $_POST['Antwoord' . $i];
        echo $vraag_id;
        $stmt->bind_param('iss',$id_lijst, $vraag_id, $antwoord_id);
        $stmt->execute();
    }
}
}

?>

<form method="POST">
<div class="form-group">
    <label for="exampleInputEmail1">Titel Lijst</label>
    <input type="text" class="form-control" id="titel" name="titel" aria-describedby="Titel lijst" placeholder="Vul hier je titel in">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Beschrijving lijst</label>
    <input type="text" class="form-control" id="beschrijving" name="beschrijving" aria-describedby="Vraag1" placeholder="Vul je beschrijving">
  </div>
  <div class="form-group" name="mode">
  <select class="form-select" name="mode" aria-label="Default select example">
  <option selected>Wil je hem prive of openbaar</option>
  <option value="1">Prive</option>
  <option value="2">Openbaar</option>
</select>
</div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vraag 1</label>
    <input type="text" class="form-control" id="Vraag1" name="Vraag1" aria-describedby="Vraag1" placeholder="Vul je vraag in">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Antwoord</label>
    <input type="text" class="form-control" id="Antwoord1" name="Antwoord1" placeholder="Vul je antwoord in">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vraag 2</label>
    <input type="text" class="form-control" id="Vraag2" aria-describedby="Vraag2" name="Vraag2" placeholder="Vul je vraag in">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Antwoord</label>
    <input type="text" class="form-control" id="Antwoord2" name="Antwoord2" placeholder="Vul je antwoord in">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vraag 3</label>
    <input type="text" class="form-control" id="Vraag3" aria-describedby="Vraag3" name="Vraag3" placeholder="Vul je vraag in">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Antwoord</label>
    <input type="text" class="form-control" id="Antwoord3" name="Antwoord3" placeholder="Vul je antwoord in">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vraag 4</label>
    <input type="text" class="form-control" id="Vraag4" aria-describedby="Vraag4" name="Vraag4" placeholder="Vul je vraag in">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Antwoord</label>
    <input type="text" class="form-control" id="Antwoord4" name="Antwoord4" placeholder="Vul je antwoord in">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vraag 5</label>
    <input type="text" class="form-control" id="Vraag5" aria-describedby="Vraag5" name="Vraag5" placeholder="Vul je vraag in">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Antwoord</label>
    <input type="text" class="form-control" id="Antwoord5" name="Antwoord5" placeholder="Vul je antwoord in">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>