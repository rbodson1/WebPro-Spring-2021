<?php
session_start();

require_once 'hangman.php';

$words = array();
$numwords = 0;
$userName = $_POST['name'];
$gameMode = $_POST['group1'];

$_SESSION['playername'] = $userName;

function startPage($image, $guesstemplate, $which, $guessed, $wrong)
{
    echo <<<ENDPAGE
<!DOCTYPE html>
<html>
  <head>
  <link href="./style.css" rel="stylesheet">
	<title>Hangman</title>
  </head>
</html>
<body>
  <h1>Hangman Game</h1>
  <br />
  <pre>$image</pre>
  <br />
  <p><strong>Word to guess: $guesstemplate</strong></p>
  <p>Letters used so far: $guessed</p>
  <form method="post" action="$script">
	<input type="hidden" name="wrong" value="$wrong" />
	<input type="hidden" name="lettersguessed" value="$guessed" />
	<input type="hidden" name="word" value="$which" />
	<fieldset>
	  <legend>Your next guess</legend>
	  <input type="text" name="letter" autofocus />
	  <input type="submit" value="Guess" class="myButton"/>
	</fieldset>
  </form>
</body>
ENDPAGE;
}

function loadWords()
{
    global $words;
    global $numwords;

    $input = fopen("words.txt", "r");

    while (true) {
        $str = fgets($input);
        if (!$str) break;
        $words[] = rtrim($str);
        $numwords++;
    }

    fclose($input);
}

function startGame()
{
    global $words;
    global $numwords;
    global $hang;

    $which = rand(0, $numwords - 1);
    $word =  $words[$which];
    $len = strlen($word);
    $guesstemplate = str_repeat('_ ', $len);
    $script = $_SERVER["PHP_SELF"];

    startPage($hang[0], $guesstemplate, $which, "", 0);
}

function gameOver($word)
{
    echo <<<ENDPAGE
<!DOCTYPE html>
<html>
 <head>
  <link href="./lose.css" rel="stylesheet">
	<title>Hangman</title>
  </head>
  <body>
	<h1>You lost!</h1>
	<p>The word you were trying to guess was <em>$word</em>.</p>
  </body>
</html>
ENDPAGE;
}

function gameWon($word, $name)
{
    echo
        <<<ENDPAGE
<!DOCTYPE html>
<html>
  <head>
  <link href="./win.css" rel="stylesheet">
	<title>Hangman</title>
  </head>
  <body>
	<h1>You win!</h1>
	<p>Congratulations! You guessed that the word was <em>$word</em>.</p>
  </body>
</html>
ENDPAGE;
}

function findMatch($word, $guessedLetters)
{
    $len = strlen($word);
    $guesstemplate = str_repeat("_ ", $len);

    for ($i = 0; $i < $len; $i++) {
        $ch = $word[$i];
        if (strstr($guessedLetters, $ch)) {
            $pos = 2 * $i;
            $guesstemplate[$pos] = $ch;
        }
    }

    return $guesstemplate;
}

function checkAnswer()
{
    global $words;
    global $hang;

    $which = $_POST["word"];
    $word  = $words[$which];
    $wrong = $_POST["wrong"];
    $lettersguessed = $_POST["lettersguessed"];
    $guess = $_POST["letter"];
    $letter = strtoupper($guess[0]);

    if (!strstr($word, $letter)) {
        $wrong++;
    }

    $lettersguessed = $lettersguessed . $letter;
    $guesstemplate = findMatch($word, $lettersguessed);

    if (!strstr($guesstemplate, "_")) {
        updateDbContent($_SESSION['playername']);
        gameWon($word, $_SESSION['playername']);
    } else if ($wrong >= 6) {
        gameOver($word);
    } else {
        startPage($hang[$wrong], $guesstemplate, $which, $lettersguessed, $wrong);
    }
}

function fakeDbContent($name, $win, $loss)
{
    $myFile = "fakedatabase.json";
    $arr_data = array();
    $arr_playernames = array();

    $formdata = array(
        'playername' => $_POST['name'],
        'wins' => $win
    );

    $jsondata = file_get_contents($myFile);

    $arr_data = json_decode($jsondata, true);

    foreach ($arr_data as $value) {
        array_push($arr_playernames, $value["playername"]);
    }

    if (!in_array($name, $arr_playernames)) {
        array_push($arr_data, $formdata);
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($myFile, $jsondata);
        $_SESSION['dbList'] = $myFile;
    }
}

function updateDbContent($name)
{
    echo $name;
    $myFile = "fakedatabase.json";
    $jsonString = file_get_contents($myFile);
    $data = json_decode($jsonString, true);

    foreach ($data as $key => $entry) {
        if ($entry['playername'] == $name) {
            $data[$key]['wins'] = $data[$key]['wins'] + 1;
            echo $data[$key]['wins'];
        }

        $newJsonString = json_encode($data);
        file_put_contents($myFile, $newJsonString);
    }
}

$method = $_SERVER["REQUEST_METHOD"];
if (isset($_POST['startgame'])) {
    $method = 'GET';
}


loadWords();

if ($method == "POST") {
    checkAnswer();
} else {
    startGame();
    fakeDbContent($userName, 0, 0);
}
