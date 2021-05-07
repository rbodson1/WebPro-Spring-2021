<?php

    $_REQUEST['id'];

    $cat=(int) substr($_REQUEST['id'],0,1);
    $question=(int) substr($_REQUEST['id'],2,1);
    //create ints for storing the row and column of the answer

    session_start(); 
    $questions=$_SESSION["questions"];
    //pull the questions used from the session variable

    $dash=strpos($questions[$cat][$question]," - ");
    $a=substr($questions[$cat][$question],$dash+2);
    //create a substring from the dash to the end of the string to get just the answer

    $_SESSION["answered"][$cat][$question]=1;
    //mark the question as answered by setting the same index of the question as answered in the "answered array"

?>

<html>
<head>
  <meta charset = "UTF-8">
  <title>Jeopardy!</title>
  <link rel = "stylesheet"
    type = "text/css"
    href = "card.css" />
</head>
<?php
    echo '<a href="board.php">'.$a.'</a>';
    //output the answer as a link back to the board
?>
</html>