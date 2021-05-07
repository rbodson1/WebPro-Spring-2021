<?php
  /* 
  * In this file, we set the questions for the all the categories.
  * There are 5 rows and 4 columns, making it a 20 question jeopardy.
  * Each row has a sports, music, education, and trivia questions
  */
	session_start();
	
    if(!isset($_COOKIE["player1Score"])){
        setcookie("player1Score","0",time()+ 31536000);
    }
    if(!isset($_COOKIE["player2Score"])){
        setcookie("player2Score","0",time()+ 31536000);
    }
    if($_COOKIE["player1turn"]){
        $player1turn = TRUE;
    }else{
        $player1turn = FALSE;
    }
    $player1Score = $_COOKIE["player1Score"];
    $player2Score = $_COOKIE["player2Score"];
    
    
    // first row
	if(isset($_POST["firstfirst"])){ //sports question
        $question = "Who is the first coach to win the European Champions League in three consecutive years ?";
        $correctAnswer = "option2";
        $option1 = "José Mourinho";
        $option2 = "Zinedine Zidane";
        $option3 = "Pep Guardiola";
        $questionScore = 200;
        setcookie("firstfirst", TRUE, time() + 31536000);
	}elseif (isset($_POST["firstsecond"])) { //music Question
        $question = "Who was the first American Idol winner?";
        $correctAnswer = "option2";
        $option1 = "Carrie Underwood";
        $option2 = "Kelly Clarkson";
        $option3 = "Jordin Sparks";
        $questionScore = 200;
        setcookie("firstsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["firstthird"])) { //science Question
        $question = "How many elements are there in the periodic table?";
        $correctAnswer = "option1";
        $option1 = "118";
        $option2 = "119";
        $option3 = "120";
        $questionScore = 200;
        setcookie("firstthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["firstfourth"])) { //Trivia Question
        $question = "In what year were the first Air Jordan sneakers released?";
        $correctAnswer = "option3";
        $option1 = "1982";
        $option2 = "1990";
        $option3 = "1984";    
        $questionScore = 200;
        setcookie("firstfourth", TRUE, time() + 31536000);
    
        // second row questions
    }elseif (isset($_POST["secondfirst"])) { // sports Question
        $question = "During the first ever modern Olympics, what were the first placers awarded with?";
        $correctAnswer = "option3";
        $option1 = "Gold medals";
        $option2 = "Bronze medals";
        $option3 = "Silver medals";
        $questionScore = 400;
        setcookie("secondfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondsecond"])) { // music Question
        $question = "Who was the first woman ever inducted into the Rock and Roll Hall of Fame?";
        $correctAnswer = "option1";
        $option1 = "Aretha Franklin";
        $option2 = "Whitney Houston";
        $option3 = "Janet Jackson";
        $questionScore = 400;
        setcookie("secondsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondthird"])) { // science Question
        $question = "How many hearts does an octopus have?";
        $correctAnswer = "option3";
        $option1 = "1";
        $option2 = "2";
        $option3 = "3";
        $questionScore = 400;
        setcookie("secondthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["secondfourth"])) { // Trivia Question
        $question = "According to Greek mythology, who was the first woman on earth?";
        $correctAnswer = "option1";
        $option1 = "Pandora";
        $option2 = "Aphrodite";
        $option3 = "Athena";
        $questionScore = 400;
        setcookie("secondfourth", TRUE, time() + 31536000);
    
        // third row question
    }elseif (isset($_POST["thirdfirst"])) { // sports Question
        $question = "There are only two states in the united States that have yet to send a team to the NCAA. Which two are they?";
        $correctAnswer = "option1";
        $option1 = "Arkansas and Maine";
        $option2 = "Rhode Island and Wyoming";
        $option3 = "Utah and Kansas";
        $questionScore = 600;
        setcookie("thirdfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdsecond"])) { // music Question
        $question = "Where was Tupac Shakur born?";
        $correctAnswer = "option2";
        $option1 = "The Bronx";
        $option2 = "East Harlem";
        $option3 = "East Village";
        $questionScore = 600;
        setcookie("thirdsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdthird"])) { // science Question
        $question = "How many bones do sharked have total?";
        $correctAnswer = "option3";
        $option1 = "138";
        $option2 = "253";
        $option3 = "0";
        $questionScore = 600;
        setcookie("thirdthird", TRUE, time() + 31536000);
    }elseif (isset($_POST["thirdfourth"])) { // Trivia Question
        $question = "Which African country was formerly known as Abyssinia?";
        $correctAnswer = "option2";
        $option1 = "Algeria";
        $option2 = "Ethiopia";
        $option3 = "Somalia";
        $questionScore = 600;
        setcookie("thirdfourth", TRUE, time() + 31536000);
    
        // fourth row question
    }elseif (isset($_POST["fourthfirst"])) { //sports Question
        $question = "What Is Canada’s National Sport?";
        $correctAnswer = "option3";
        $option1 = "Ice Hockey";
        $option2 = "Baseball";
        $option3 = "Lacrosse";
        $questionScore = 800;
        setcookie("fourthfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthsecond"])) { // music Question
        $question = "What was Elvis Presley‘s first No. 1 hit in the United States?";
        $correctAnswer = "option3";
        $option1 = "Can't Help Falling in Love";
        $option2 = "It's Now Or Never";
        $option3 = "Heartbreak Hotel";
        $questionScore = 800;
        setcookie("fourthsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourththird"])) { // science Question
        $question = "Human hair and nails are made from the same material";
        $correctAnswer = "option1";
        $option1 = "True";
        $option2 = "False";
        $questionScore = 800;
        setcookie("fourththird", TRUE, time() + 31536000);
    }elseif (isset($_POST["fourthfourth"])) { // Trivia Question
        $question = "Which country consumes the most chocolate per capita?";
        $correctAnswer = "option2";
        $option1 = "France";
        $option2 = "Switzerland";
        $option3 = "Sweden";
        $questionScore = 800;
        setcookie("fourthfourth", TRUE, time() + 31536000);
    

        // fifth row question
    }elseif (isset($_POST["fifthfirst"])) { //sports Question
        $question = "What pitcher holds the record for most complete games in an MLB career?";
        $correctAnswer = "option1";
        $option1 = "Cy Young";
        $option2 = "Nolan Ryan";
        $option3 = "Don Sutton";
        $questionScore = 1000;
        setcookie("fifthfirst", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthsecond"])) { // music Question
        $question = "Which contemporary pop singer has a tattoo of Jesus Christ on one of his calves?";
        $correctAnswer = "option3";
        $option1 = "Ed Sheeran";
        $option2 = "Adele";
        $option3 = "Justin Bieber";
        $questionScore = 1000;
        setcookie("fifthsecond", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifththird"])) { // science Question
        $question = "The measurement is used to measure the depth of water is?";
        $correctAnswer = "option2";
        $option1 = "Feet";
        $option2 = "Fathom";
        $option3 = "Volume";
        $questionScore = 1000;
        setcookie("fifththird", TRUE, time() + 31536000);
    }elseif (isset($_POST["fifthfourth"])) { // Trivia Question
        $question = "Whats the worlds' largest island?";
        $correctAnswer = "option3";
        $option1 = "Madagascar";
        $option2 = "New Guinea";
        $option3 = "Greenland";
        $questionScore = 1000;
        setcookie("fifthfourth", TRUE, time() + 31536000);
    
    }
?>