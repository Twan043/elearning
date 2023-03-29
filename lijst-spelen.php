<?php
include "header.php";
$servername = "localhost";
$username = "root";
$password = "";
$con = new mysqli($servername, $username, $password, 'E-Learning');
$ID = $_GET['id'];
$sql = "SELECT * FROM lijst_vragen WHERE lists_id=$ID";
$result = mysqli_query($con, $sql);
?>
   <div id="vragen">
<?php
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <style>
    .card-width {
      width: 70%;
      margin: 0 auto;
    }
  </style>
    <div  class="card mb-4 card-width" card-width>
      <div class="card-body text-center">
        <h3 class="mb-4">Question:</h3>
        <p name="vraag"><?php echo $row['question']; ?></p>
        <input type="hidden" id="vraag-<?php echo $row['id'] ?>" value="vraag-<?php echo $row['id'] ?>" />
        <form class="mb-3">
          <div class="mb-3">
            <label for="answer-<?php echo $row['id'] ?>" class="form-label">Your answer:</label>
            <input type="text" id="answer-<?php echo $row['id'] ?>" name="answer-<?php echo $row['id'] ?>" class="form-control w-50 mx-auto">
          </div>
          <button type="button" id="button-<?php echo $row['id'] ?>" class="btn btn-primary" onclick="checkAnswer(<?php echo $row['id'] ?>)">Submit</button>
          <div id="result-<?php echo $row['id'] ?>-goed" class="alert alert-success" hidden>

          </div>
          <div id="result-<?php echo $row['id'] ?>-fout" class="alert alert-danger" hidden>

          </div>
        </form>
      </div>
      </div>
    <?php     
  }
}
?>
</div>

<style>
        body {
            background-color: #f7f7f7;
        }

        .score-card {
            background-color: #4caf50;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .score-value {
            font-size: 72px;
            font-weight: bold;
            color: #3a3a3a;
        }
    </style>
        <div id="check-score" class="row" hidden>
            <div class="col-md-6 mx-auto">
                <div class="score-card">
                    <h2 class="mb-4">Your Score</h2>
                    <div class="score-value" id="score-value">3</div>
                    <p class="mt-4">Gefeliciteerd met je score, goed bezig!</p>
                </div>
            </div>
        </div>
    </div>
<button type="button" name="check-score" id="check-score" hidden>Check mijn score!</button>