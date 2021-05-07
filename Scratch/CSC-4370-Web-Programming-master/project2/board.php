<html>
<head>
  <meta charset = "UTF-8">
  <title>Jeopardy!</title>
  <link rel = "stylesheet"
    type = "text/css"
    href = "style.css" />
</head>

<?php

  session_start(); 
  $questions=$_SESSION["questions"]; 
  $answered=$_SESSION["answered"]; 
  //start the session and set local variables to the session variables
  
?>

<div class="container">
  <div class="row">
    <?php
      for($i=0;$i<6;$i++){
        echo '<div class="square"><p class="category">'.$questions[$i][0].'</p></div>';
      }
      //loop through outputting six squares on the first row and output the names of the categories
    ?>
  </div>
  <div class="row">
    <?php
      for($i=6;$i<12;$i++){
        if($answered[$i-6][1]==0)
          echo '<div class="square"><a href="question.php?id='.($i-6).'-1">$100</a></div>';
        else
          echo '<div class="square">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
      }
      //loop through the next row of squares and put the corresponding questions on each category's column
      //output a dollar amount
      //repeat for each row
    ?>
  </div>
  <div class="row">
    <?php
      for($i=12;$i<18;$i++){
        if($answered[$i-12][2]==0)
          echo '<div class="square"><a href="question.php?id='.($i-12).'-2">$200</a></div>';
        else
          echo '<div class="square">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
      }
    ?>
  </div>
  <div class="row">
    <?php
      for($i=18;$i<24;$i++){
        if($answered[$i-18][3]==0)
          echo '<div class="square"><a href="question.php?id='.($i-18).'-3">$300</a></div>';
        else
          echo '<div class="square">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
      }
    ?>
  </div>
  <div class="row">
    <?php
      for($i=24;$i<30;$i++){
        if($answered[$i-24][4]==0)
          echo '<div class="square"><a href="question.php?id='.($i-24).'-4">$400</a></div>';
        else
          echo '<div class="square">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
      }
    ?>
  </div>
  <div class="row">
    <?php
      for($i=30;$i<36;$i++){
        if($answered[$i-30][5]==0)
          echo '<div class="square"><a href="question.php?id='.($i-30).'-5">$500</a></div>';
        else
          echo '<div class="square">&nbsp;&nbsp;&nbsp;&nbsp;</div>';
      }
    ?>
  </div>
</div>
</html>