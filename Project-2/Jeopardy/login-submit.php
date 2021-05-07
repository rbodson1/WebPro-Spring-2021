<?php


$userData = "";
$username = $_POST["username"];
$password = $_POST["password"];


    foreach (file("data.txt", FILE_IGNORE_NEW_LINES) as $userData) {

        if ($username == (explode(",", $userData)[0]) && $password == (explode(",", $userData)[1])){
            $username == (explode(",", $userData)[0]);
             $password == (explode(",", $userData)[1]);
        }

        }
    foreach (file("data.txt", FILE_IGNORE_NEW_LINES) as $matchData) {
            $mUsername = (explode(",", $matchData)[0]);
            $mPassword = (explode(",", $matchData)[1]);

            if($username == $mUsername && $password == $mPassword){
                header("location: startGame.php");
            }
    }
    die("<p style='font-size:30pt'>Incorrect username or password,<a href='login.html'>try again</a> or <a href='register.html'>register!</a></p>");

?>