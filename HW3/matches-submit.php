<!--
This file reads the user's input name and gets the matches for the user.
-->
<?php include("commonTop.php"); 
$userName = $_GET["name"];?>

<h1>Matches for <?= $userName ?></h1>
<div class='match'>
<?php

// Find the user's matches and output their info

    // Get user's info from the singles.txt file 
    $userData = "";
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $userData) {
        //Using indexes 0-->name, 1-->gender, 2-->age, 3-->personality type, 4-->OS, 5--> min age,6-->max age
        // Find user's data using their name
        if ( $userName == explode(",", $userData)[0]) {

             $uName = (explode(",", $userData)[0]);
             $uGender = (explode(",", $userData)[1]);
             $uAge = (explode(",", $userData)[2]);
             $uPType = (explode(",", $userData)[3]);
             $uOS = (explode(",", $userData)[4]);
             $uMinAge = (explode(",", $userData)[5]);
             $uMaxAge = (explode(",", $userData)[6]);
            
        }
    }
           // Getting the matches data
    foreach (file("singles.txt", FILE_IGNORE_NEW_LINES) as $matchData) {
             $mName = (explode(",", $matchData)[0]);
             $mGender = (explode(",", $matchData)[1]);
             $mAge = (explode(",", $matchData)[2]);
             $mPType = (explode(",", $matchData)[3]);
             $mOS = (explode(",", $matchData)[4]);
             $mMinAge = (explode(",", $matchData)[5]);
             $mMaxAge = (explode(",", $matchData)[6]);
             
             //splitting the personality type to find at least one letter in common at the same index
             $firstLetter = (str_split($mPType)[0]);
             $secondLetter = (str_split($mPType)[1]);
             $thirdLetter = (str_split($mPType)[2]);
             $fourthLetter = (str_split($mPType)[3]);

             //Comparing to find a match(es)
        if ($uName != $mName && 
            $uGender != $mGender &&
            $uMinAge <= $mAge &&
            $uMaxAge >= $mAge &&
            $uOS     == $mOS &&
            ($firstLetter  == $firstLetter || $secondLetter == $secondLetter 
            || $thirdLetter == $thirdLetter || $fourthLetter == $fourthLetter)
        
        ) {
     
            ?>  
            <!--Print out the matches to the screen -->
            <p><img src='img/user.jpg'><?= $mName ?></p>
            <ul>
                <li><strong>gender:</strong><?= $mGender ?></li>
                <li><strong>age:</strong><?= $mAge ?></li>
                <li><strong>type:</strong><?= $mPType ?></li>
                <li><strong>OS:</strong><?= $mOS ?></li>
            </ul>   

        <?php 
        }
    }
?>
</div>
<?php include("commonBottom.php"); ?>

