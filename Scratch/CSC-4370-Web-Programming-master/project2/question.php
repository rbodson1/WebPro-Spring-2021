<?php

$_REQUEST['id'];

$cat=substr($_REQUEST['id'],0,1);
$question=substr($_REQUEST['id'],2,1);
//create ints for storing the row and column of the question

session_start(); 
$questions=$_SESSION["questions"];
//pull the questions used from the session variable

$dash=strpos($questions[$cat][$question]," - ");
$q=substr($questions[$cat][$question],0,$dash);
//create a substring from the beginning of the string to the dash to get just the question

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
    echo '<a href="answer.php?id='.$_REQUEST['id'].'">'.$q.'</a>';
    //output the question as a link to the answer page with the corresponding answer
?>
</html>