<?php
session_start();
$conn = mysqli_connect("localhost","root","root","airline");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$mob=$_POST['mob'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$sql = "INSERT INTO passenger(Fname,Lname,age,mno,email,password) VALUES ('$fname', '$lname', '$age', '$mob','$email', '$pw');";
	if(mysqli_query($conn, $sql))
{  
	$message = "Your account has been created.";
}
else
{  
	$message = "Error: Account not created."; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<html>
<head>
<title>Account Registration</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
<script src="validation.js"></script>
</head>
<body>
<?php include("nav.php") ?>
<div id="register_form" align="center" height="200" width="200">
<form name="register" method="post" action="register.php" onsubmit="return validate()">
<table border="0">
<caption><font size="6"><br/>Enter your details:</font></caption>
<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">First name:</font></td>
<td><input name="fname" type="TEXT" placeholder="Enter your first name" size="30" maxlength="30" align="center" id="fname"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">Last name:</font></td>
<td><input type="TEXT" name="lname" align="center" size="30" maxlength="30" placeholder="Enter your last name" id="lname"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">Age:</font></td>
<td><input type="TEXT" name="age" align="center" size="30" maxlength="3" placeholder="Enter age" id="age"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">Mobile Number:</font></td>
<td><input type="TEXT" name="mob" size="30" maxlength="10" placeholder="Enter your mobile number" id="mob"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<tr></tr><tr></tr>
<tr class="left">
<td><font size="5">E-Mail ID:</font></td>
<td><input name="email" type="TEXT" id="email" placeholder="Enter your E-Mail ID" size="30" maxlength="30"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">password:</font></td>
<td><input type="pASSWORD" name="pw" size="30"  id="pw"></td>
</tr><tr></tr><tr></tr>
<tr class="left">
<td><font size="5">Confirm password:</font></td>
<td><input type="pASSWORD" name="cpw" size="30" id="cpw"></td>
</tr><tr></tr><tr></tr><tr></tr><tr></tr>
<tr></tr>
</table>
<p><input TYpE="Submit" value="Submit" name="submit" id="submit" class="button">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<input TYpE="Reset" value="Reset" id="reset" class="button"></p></form>
<hr width="450" style="border-color: blue;display: block;" noshade>
<form action="login.php">
<p align="CENTER"><font size="6" face="Arial">
Already have an account with us?<BR></font><br/><br/>
<input TYpE="submit" value="Login" id="login" class="button">
</p>
</form></div>
</body>
</html>