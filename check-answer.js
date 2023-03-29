var score = 0;
var questions_answered = 0;

function checkAnswer(a) {
    var answer = document.getElementById("answer-" + a).value;
    var question = document.getElementById("vraag-" + a).value;
    var xhr = new XMLHttpRequest();
    var test = "result-" + a + "-goed";
    var test1 = "result-" + a + "-fout";
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var result = document.getElementById(test);
        var result1 = document.getElementById(test1)
        if (this.responseText == "true") {
          result.innerHTML = "Correct! Dat is het goede antwoord";
          document.getElementById(test).removeAttribute("hidden");
          score++;
          questions_answered++;
        } else {
          result1.innerHTML = "Helaas, dat is het foute antwoord";
          document.getElementById(test1).removeAttribute("hidden");
          questions_answered++;
        }
      }
    };
    xhr.open("POST", "checkAnswer.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("answer=" + answer + "&question=" + question);
    document.getElementById("button-" + a).disabled = true;
    if (questions_answered == 4) {
      document.getElementById("check-score").removeAttribute("hidden");
      document.getElementById("vragen").style.display = "none";
      document.getElementById("score-value").innerHTML = score;
    }
  }
