<!--This is the page that displays the questions and the answers-->

<?php include("inputQuestions.php"); ?>

<html> 
<head>
	<title> Jeopardy Questions&Answers</title>

	<!-- CSS linking -->
	<link href="./jeopardy.css" rel="stylesheet" type="text/css">
</head>
<body>
    
<div id = "body_header_main" style="background-color:blue">
			<div >
                <h1 class="center" id="h1">
                    Jeopardy
                </h1>
            </div>
            <div>
                <div class="topnav">
                    <a href="./startGame.php">Back To Game</a>                  
                    
                </div>

			</div>
	</div>

	<div id = "score_container_main">
		<div>
			<?php if($player1turn){ ?> <!--getting the players turn starting with player1 with a background of lightgreen-->
				<div style="float:left; width: 50%;text-align: center;font-size: 35px;background: lightgreen; color:white; "><?php if(isset($_COOKIE["player1Name"])){ echo $_COOKIE["player1Name"];} else{ echo "Player 1";}?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 35px; color:white;"><?php if(isset($_COOKIE["player2Name"])){ echo $_COOKIE["player2Name"];} else{ echo "Player 2";}?></div>
			<?php }else{ ?>
				<div style="float:left; width: 50%;text-align: center;font-size: 35px; color:white;"><?php if(isset($_COOKIE["player1Name"])){ echo $_COOKIE["player1Name"];} else{ echo "Player 1";}?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 35px;background: lightgreen; color:white;"><?php if(isset($_COOKIE["player2Name"])){ echo $_COOKIE["player2Name"];} else{ echo "Player 2";}?></div>
			<?php } ?>
			
		</div>
		<div>
			<?php if($player1turn){ ?> <!--getting the players scores starting with player1 with a background of lightgreen-->
				<div style="float:left; width: 50%;text-align: center;font-size: 30px;background: lightgreen; color:white;"><?php if(isset($_COOKIE["player1Score"])){ echo $player1Score; }else{ echo 0;} ?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 30px; color:white;"><?php if(isset($_COOKIE["player2Score"])){ echo $player2Score; }else{ echo 0;} ?></div>
				<?php }else{ ?>
					<div style="float:left; width: 50%;text-align: center;font-size: 30px; color:white;"><?php if(isset($_COOKIE["player1Score"])){ echo $player1Score; }else{ echo 0;} ?></div>
				<div style="float:right; width: 50%; text-align: center;font-size: 30px;background: lightgreen; color:white;"><?php if(isset($_COOKIE["player2Score"])){ echo $player2Score; }else{ echo 0;} ?></div>
					<?php } ?>
			
			
		</div>
	</div>
    <br/>
    <br/>
    <br/>
    <!-- The questions and options for the answer choices -->
	<form action="startGame.php" method="post">
        <div id = "questiondiv" style= "text-align: center; color:aqua" >
            <div>
                <h2><?php echo $question; ?></h2>
            </div>
            <br/>
            <input type="radio" id="true" name="selectedAnswer" value="option1">
            <label for="true"><?php echo $option1 ?></label><br>
            <input type="radio" id="false" name="selectedAnswer" value="option2">
            <label for="false"><?php echo $option2 ?></label><br>
            <input type="radio" id="false" name="selectedAnswer" value="option3">
            <label for="false"><?php echo $option3 ?></label><br>
            <div>
                <input style = "align: center" type = "submit" name="answerButton" value = "Submit Answer">
            </div>
            <input style = "visibility:hidden;" type="text" id="correctAnswer" name = "correctAnswer" value = <?php echo $correctAnswer?>> </input> 
            <input style = "visibility:hidden;" type="text" id="questionScore" name = "questionScore" value = <?php echo $questionScore?>> </input> 
            <input style = "visibility:hidden;" type="text" id="player1turn" name = "player1turn" value = <?php echo $player1turn?>> </input> 
            <!-- <input style = "visibility:hidden;" type="text" id="buttonID" name = "buttonID" value = <?php echo $buttonID?>> </input>  -->
        </div>
    </form>
</body>
</html>