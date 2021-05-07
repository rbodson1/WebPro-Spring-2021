
<html> 
<head>
	<title> Jeopardy Leader Board</title>
	<style>
	.content {
            background-color: rgba(255, 255, 255, .8);
            border-radius: .25em;
            box-shadow: 0 0 .25em rgba(0, 0, 0, .25);
            box-sizing: border-box;
            left: 50%;
            padding: 10vmin;
            position: relative;
            text-align: left;
            top: 50%;
			overflow-y: scroll;
            transform: translate(-50%, -50%);
			height: 1000px; 
            overflow-y:auto;
            width:900px;
            float:left;
            position:relative;
            margin-left:-5px;
        }

		
table, th {
  border: 1px solid black;

}
td {
  text-align: center;
  border: 1px solid black;
}

</style>
	<!-- CSS linking -->
	<link href="./jeopardy.css" rel="stylesheet" type="text/css">
</head>
<body >

<div class="content">
<br><br>
		<a href="startGame.php">Go Back</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="resetGame.php">Play Again</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="logout.php">Quit</a>
		<h1 style="color:yellow">Jeopardy Leader Board</h1>
<table style="width:700px">
            <tr>
                <th>Ranking</th>
                <th>Player Name</th>
                <th>Money</th>
            </tr>
<?php
include("turns&scores.php");

	if($player1Score != 0 || $player2Score != 0){ 
		
	$player1Name = $_COOKIE["player1Name"];
	$player2Name = $_COOKIE["player2Name"];

   file_put_contents("leaderboard.txt", "\n" .(int)$player1Score.":".$player1Name, FILE_APPEND);
   file_put_contents("leaderboard.txt", "\n" .(int)$player2Score.":".$player2Name, FILE_APPEND);
  
	}
$position = 0;

$oldfile = file("leaderboard.txt"); 
$newfile = fopen("orderedLeaderboard.txt", "w+"); 
$header = $oldfile[0]; 
echo $header."<br>"; 
fwrite($newfile, $header); 
array_shift($oldfile); 
rsort($oldfile, SORT_NUMERIC); 
foreach($oldfile as $line){ 
	$score = (explode(":",$line)[0]);
	$name = (explode(":",$line)[1]);
	    $position++ ; 
		            
    echo "<tr><td>$position</td><td>$name</td><td>$$score</td></tr> ";
    fwrite($newfile, trim($line)."\n"); 
}
fclose($newfile); 
?>
</table>

	
	</div>



</body>
</html>