<?php

    $lines = file("questions.txt", FILE_IGNORE_NEW_LINES); //set the $lines variable to each line in the questions.txt
    $questionPool=array();
    $category=0;
    $index=0;
    //create variables for storing each question and category as well as column and row indexes

    foreach($lines as $line){
        if($line!=""){
            $questionPool[$category][$index]=$line;
            $index++;
        }
        else{
            $category++;
            $index=0;
            continue;
        }
    }
    //loop through $lines and put each category name in the first index and each question on the same row
    
    $usedCats=array();
    while(sizeof($usedCats)!=6){
        $rand=rand(0,(sizeof($questionPool)-1));
        if(in_array($rand, $usedCats))
            continue;
        else
            array_push($usedCats, $rand);
    }
    //randomly choose category indexes from the question pool array and store them in the used categories array

    $questions=array(
        array($questionPool[$usedCats[0]][0],$questionPool[$usedCats[0]][1],$questionPool[$usedCats[0]][2],$questionPool[$usedCats[0]][3],$questionPool[$usedCats[0]][4],$questionPool[$usedCats[0]][5]),
        array($questionPool[$usedCats[1]][0],$questionPool[$usedCats[1]][1],$questionPool[$usedCats[1]][2],$questionPool[$usedCats[1]][3],$questionPool[$usedCats[1]][4],$questionPool[$usedCats[1]][5]),
        array($questionPool[$usedCats[2]][0],$questionPool[$usedCats[2]][1],$questionPool[$usedCats[2]][2],$questionPool[$usedCats[2]][3],$questionPool[$usedCats[2]][4],$questionPool[$usedCats[2]][5]),
        array($questionPool[$usedCats[3]][0],$questionPool[$usedCats[3]][1],$questionPool[$usedCats[3]][2],$questionPool[$usedCats[3]][3],$questionPool[$usedCats[3]][4],$questionPool[$usedCats[3]][5]),
        array($questionPool[$usedCats[4]][0],$questionPool[$usedCats[4]][1],$questionPool[$usedCats[4]][2],$questionPool[$usedCats[4]][3],$questionPool[$usedCats[4]][4],$questionPool[$usedCats[4]][5]),
        array($questionPool[$usedCats[5]][0],$questionPool[$usedCats[5]][1],$questionPool[$usedCats[5]][2],$questionPool[$usedCats[5]][3],$questionPool[$usedCats[5]][4],$questionPool[$usedCats[5]][5])
    );
    //fill the questions array with 5 questions from the randomly chosen usedCats array and each corresponding category

    $answered=array(
        array(0,0,0,0,0,0),
        array(0,0,0,0,0,0),
        array(0,0,0,0,0,0),
        array(0,0,0,0,0,0),
        array(0,0,0,0,0,0),
    );
    //create an array to store answered status. 0 is not answered, 1 is answered

    session_start(); 
    $_SESSION["questions"] = $questions; 
    $_SESSION["answered"] = $answered; 
    //start the session and add the questions and answered status arrays to the session variable

    header("Location: board.php");
    //redirect to the board page
    
?>