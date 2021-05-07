<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="./style.css" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hang Man: Player Name</title>
</head>

<body>
    <div>
        <form action="game.php" method="post">
            <h1>Lets play hangman</h1>
            <input type="text" name="name" placeholder="Enter Player Name" required /><br />
            <p>Choose game difficulty</p>
            <fieldset id="group1">
                <input type="radio" value="Easy" name="group1" required><label for="Easy">Easy</label>
                <input type="radio" value="Medium" name="group1" required><label for="Medium">Medium</label>
                <input type="radio" value="Hard" name="group1" required><label for="Hard">Hard</label>
                <input type="radio" value="Extreme" name="group1" required><label for="Extreme">Extreme</label>
            </fieldset>
            <input type="submit" name="startgame" value="Submit!" />
        </form>
    </div>
</body>

</html>