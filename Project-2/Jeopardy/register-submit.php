<!-- Store the registration info into the data.txt. -->

<?php  

$userData = "";
$username = $_POST["username"];
    
    // check if user exists
    foreach (file("data.txt", FILE_IGNORE_NEW_LINES) as $userData) {

        if ($username == (explode(",", $userData)[0]) ){
            $username == (explode(",", $userData)[0]);  
        }
        }

    foreach (file("data.txt", FILE_IGNORE_NEW_LINES) as $matchData) {
            $mUsername = (explode(",", $matchData)[0]);

            if($username == $mUsername ){
               die("<p style='font-size:30pt'>User already exists, <a href='login.html'>try login in</a> or <a href='register.html'>register</a> with different user</p>");
            }
           }
  // Get the user's data
    $userData = "";
   foreach ($_POST as $info) {
       $userData = $userData . $info . ",";
   }

   //Put the data in the data.txt file
   file_put_contents("data.txt", "\n" .$userData, FILE_APPEND);
   
   die("<p style='font-size:30pt'>Registration successful, now you can <a href='login.html'>login</a> to play!</p>");

?>
