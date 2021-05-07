<!-- Store the signup info into the singles.txt. -->

<?php include("commonTop.php"); 

$name = $_POST["name"]; ?>

 <div>
    <h1>Thank you!</h1>
    <p>
        <!--Display welcome message with the user's name -->
        Welcome to NerdLuv, <?php print $name ?> <br/><br/>
        Now <a href='matches.php'>log in to see your matches!</a>
    </p>
</div> 

 <?php  
// Get the user's data
     $userData = "";
    foreach ($_POST as $info) {
        $userData = $userData . $info . ",";
    }

    //Put the data in the singles.txt file
    file_put_contents("singles.txt", "\n" .$userData, FILE_APPEND);


    include("commonBottom.php");
?>

