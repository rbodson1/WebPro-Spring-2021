<!DOCTYPE html>
<html>
<head>
	<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="nav" align="right">
<a href="index.php">Home</a> &nbsp; &nbsp;
<a href="book.php">Book Flights</a> &nbsp;
<a href="parking.php">Reserve Parking</a> &nbsp;
<?php
if(isset($_SESSION['user_info']))
	echo '<a href="myFlights.php">My Flights</a>';
else
	echo '<a href="login.php">Login</a>';
?>
</div>
</body>
</html>