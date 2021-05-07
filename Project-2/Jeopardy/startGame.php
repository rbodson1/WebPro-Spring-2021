<!-- Create a division to show the user score. 
Create a continer for the game cards. 
Create animations and styling for the cards. -->

<?php include("turns&scores.php"); ?>

<html> 
<head>
	<title> Jeopardy</title>

	<!-- CSS linking -->
	<link href="./jeopardy.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Create a Header with links. -->
	<div style="background-color:blue">
			<div >
                <h1 class="center" id="h1">
                    Jeopardy
                </h1>
            </div>
            <div>
                <div class="topnav">
                    <a href="./resetGame.php">Reset Game</a>
                    <a href="./howToPlay.html">HowToPlay </a>
					<a href="./inputPlayersNames.html">EnterPlayersNames </a>
				    <a href="./logout.php" style="float:right"> Logout </a>
					<a href="./leaderboard.php" style="float:right">Leaderboard </a>                    
                    
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
	<br><br><br>
	<form action="ques&ansPage.php" method="post">
	
          <!--inputting the categories-->
		<div class="wrapper">
			 <div  style =  "background-image: url('./images/category.jpg');font-size:35px;font-family:'Comic Sans'; color:white; text-align:center"><b><i>SPORTS</i></b></div>

			 <div  style =  "background-image: url('./images/category.jpg');font-size:35px;font-family:'Comic Sans'; color:white; text-align:center"><b><i>MUSIC</i></b></div>
			
			 <div  style =  "background-image: url('./images/category.jpg');font-size:35px;font-family:'Comic Sans'; color:white; text-align:center"><b><i>EDUCATION</i></b></div>
			
			 <div  style =  "background-image: url('./images/category.jpg');font-size:35px;font-family:'Comic Sans'; color:white; text-align:center"><b><i>TRIVIA</i></b></div>
			
        </div>

		<!--setting up the cards for the questions-->
		<!--first row-->
	<div class="wrapper"> 

		<?php if(($_COOKIE["firstfirst"])){ ?>
				<div   ><button type="submit" name = "firstfirst" style="width: 100%; height: 100%;  color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div  ><button type="submit" name = "firstfirst" style="width: 100%; height: 100%; " >$200</button></div>
		<?php } ?>

		<?php if(($_COOKIE["firstsecond"])){ ?>
				<div  id="soccer"><button type="submit" name = "firstsecond" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "firstsecond" style="width: 100%; height: 100%; " >$200</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["firstthird"])){ ?>
				<div ><button type="submit" name = "firstthird" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "firstthird" style="width: 100%; height: 100%; " >$200</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["firstfourth"])){ ?>
				<div ><button type="submit" name = "firstfourth" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "firstfourth" style="width: 100%; height: 100%; " >$200</button></div>
		<?php } ?>
		
	</div>
	 
        
	<div class="wrapper"> 
		<!--second row-->
		
		<?php if(($_COOKIE["secondfirst"])){ ?>
				<div ><button type="submit" name = "secondfirst" style="width: 100%; height: 100%; color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')" disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "secondfirst" style="width: 100%; height: 100%; " >$400</button></div>
		<?php } ?>

		<?php if(($_COOKIE["secondsecond"])){ ?>
				<div ><button type="submit" name = "secondsecond" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "secondsecond" style="width: 100%; height: 100%; " >$400</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["secondthird"])){ ?>
				<div ><button type="submit" name = "secondthird" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "secondthird" style="width: 100%; height: 100%; " >$400</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["secondfourth"])){ ?>
				<div ><button type="submit" name = "secondfourth" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "secondfourth" style="width: 100%; height: 100%; " >$400</button></div>
		<?php } ?>
			
	</div>

	<div class="wrapper"> 
		<!--third row-->
		
		<?php if(($_COOKIE["thirdfirst"])){ ?>
				<div ><button type="submit" name = "thirdfirst" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "thirdfirst" style="width: 100%; height: 100%;" >$600</button></div>
		<?php } ?>

		<?php if(($_COOKIE["thirdsecond"])){ ?>
				<div ><button type="submit" name = "thirdsecond" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "thirdsecond" style="width: 100%; height: 100%; " >$600</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["thirdthird"])){ ?>
				<div ><button type="submit" name = "thirdthird" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "thirdthird" style="width: 100%; height: 100%; " >$600</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["thirdfourth"])){ ?>
				<div ><button type="submit" name = "thirdfourth" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "thirdfourth" style="width: 100%; height: 100%; " >$600</button></div>
		<?php } ?>
			
	</div>

	<div class="wrapper"> 
		<!--fouth row-->
		
		<?php if(($_COOKIE["fourthfirst"])){ ?>
				<div ><button type="submit" name = "fourthfirst" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fourthfirst" style="width: 100%; height: 100%; " >$800</button></div>
		<?php } ?>

		<?php if(($_COOKIE["fourthsecond"])){ ?>
				<div ><button type="submit" name = "fourthsecond" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fourthsecond" style="width: 100%; height: 100%; " >$800</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["fourththird"])){ ?>
				<div ><button type="submit" name = "fourththird" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fourththird" style="width: 100%; height: 100%; " >$800</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["fourthfourth"])){ ?>
				<div ><button type="submit" name = "fourthfourth" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fourthfourth" style="width: 100%; height: 100%; " >$800</button></div>
		<?php } ?>
	</div>	



	<div class="wrapper"> 
		<!--fifth row-->
		
		<?php if(($_COOKIE["fifthfirst"])){ ?>
				<div ><button type="submit" name = "fifthfirst" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fifthfirst" style="width: 100%; height: 100%; " >$1000</button></div>
		<?php } ?>

		<?php if(($_COOKIE["fifthsecond"])){ ?>
				<div ><button type="submit" name = "fifthsecond" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fifthsecond" style="width: 100%; height: 100%; " >$1000</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["fifththird"])){ ?>
				<div ><button type="submit" name = "fifththird" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fifththird" style="width: 100%; height: 100%; " >$1000</button></div>
		<?php } ?>
			
		<?php if(($_COOKIE["fifthfourth"])){ ?>
				<div ><button type="submit" name = "fifthfourth" style="width: 100%; height: 100%;color:red;font-size:30;color:red;font-size:30;background-image: url('./images/alreadyAns.png')"  disabled >Answered</button></div>
			<?php }else { ?>
				<div ><button type="submit" name = "fifthfourth" style="width: 100%; height: 100%; " >$1000</button></div>
		<?php } ?>
	</div>
		

</body>
</html>