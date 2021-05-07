
<?php
/*
This file set the cookies for the players names, players turns, questions, answers
and players scores.
*/
  	session_start();


	if(isset($_POST["player1"]) && $_POST["player2"]){ // get data from the inputPlayersNames.html
		$player1Name = $_POST["player1"];
	    $player2Name = $_POST["player2"];
        
        setcookie("player1Name",$player1Name,time()+ 31536000); // setcookies for the players names
		setcookie("player2Name",$player2Name,time()+ 31536000);
		header("location: startGame.php");
    }
 
	// setcookies for players scores
	if(!isset($_COOKIE["player1Score"])){
        setcookie("player1Score","0",time()+ 31536000);
    }
    if(!isset($_COOKIE["player2Score"])){
        setcookie("player2Score","0",time()+ 31536000);
    }
    $player1Score = $_COOKIE["player1Score"];
	$player2Score = $_COOKIE["player2Score"];
	if(!isset($_COOKIE["questionCount"])){
		setcookie("questionCount", 0, time()+31536000);
	}
	// setcookies for players turns
	if(!isset($_COOKIE["player1turn"])){
		$player1turn = TRUE;
		setcookie("player1turn", TRUE, time() + 31536000);
		setcookie("player2turn", FALSE, time() + 31536000);
    }
    
	// setcookies for questions, and answers
	$questionCount = $_COOKIE["questionCount"];
	$player1turn = $_COOKIE["player1turn"];
	if(isset($_POST["answerButton"])){
		setcookie("questionCount", ((int)$_COOKIE["questionCount"] + (int)1), time() + 31536000);
		$questionCount = $_COOKIE["questionCount"];
		if($_POST["correctAnswer"] == $_POST["selectedAnswer"]){
			$player1Score = $_COOKIE["player1Score"];
			if($_COOKIE["player1turn"] == TRUE){
				$_COOKIE["player1Score"] = ((int)$_COOKIE["player1Score"] + (int)$_POST["questionScore"]);
				$player1Score = $_COOKIE["player1Score"];
				setCookie("player1Score", $player1Score, time()+ 31536000);
			}else{
				$_COOKIE["player2Score"] = ((int)$_COOKIE["player2Score"] + (int)$_POST["questionScore"]);
				$player2Score = $_COOKIE["player2Score"];
				setCookie("player2Score", $player2Score, time()+ 31536000);
			}
		}else{
			if($player1turn){
				$player1turn = FALSE;
				setcookie("player1turn", FALSE, time() + 31536000);
				setcookie("player2turn", TRUE, time() + 31536000);
			}else{
				$player1turn = TRUE;
				setcookie("player1turn", TRUE, time() + 31536000);
				setcookie("player1turn", FALSE, time() + 31536000);
			}
		}
	}


	

	
?>
