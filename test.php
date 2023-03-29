?>
    <h1>Question:</h1>
    <p name='vraag'><?php echo $row['question']; ?></p>
    <input type="hidden" id="vraag-<?php echo $row['id'] ?>" value="vraag-<?php echo $row['id'] ?>" />
    <form>
      <label for="answer">Your answer:</label>
      <input type="text" id="answer-<?php echo $row['id'] ?>" name="answer-<?php echo $row['id'] ?>">
      <button type="button" id="button-<?php echo $row['id'] ?>" onclick="checkAnswer(<?php echo $row['id'] ?>)">Submit</button>
      <p id='result-<?php echo $row['id'] ?>'></p>
    </form>
<?php