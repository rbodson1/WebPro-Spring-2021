<?php 
session_start();
	if(empty($_SESSION['user_info'])){
		echo "<script type='text/javascript'>alert('Please login before proceeding further!');</script>";
		header('Location: login.php');
	}
$conn = mysqli_connect("localhost","root","root","airline");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$source=$_POST['source'];
$destination=$_POST['destination'];
$sql = "SELECT * FROM flights WHERE f_src = '$source' AND f_dest='$destination';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$email=$_SESSION['user_info'];
$f_no=$row['f_no'];
$query="INSERT INTO tickets (`p_id`, `f_no`) VALUES ('".$_SESSION['p_id']."', '".$f_no."');";

	if(mysqli_query($conn, $query))
{  
	if(!empty($row)){
			$f_no=$row['f_no'];
			$message = "Flight booked successfully";
		}
		else{
			$message="No flights available.";
		}
}
	else {
		$message="No flights available.";
	}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<html>
<head>
<title>Book a Flight</title>
<script type="text/javascript">
		function validate()	{
			var source=document.getElementById("source");
			if(source.selectedIndex==0)
			{
				alert("Please select your origin");
				source.focus();
				return false;		
			}
			var destination=document.getElementById("destination");
			if(destination.selectedIndex==0)
			{
				alert("Please select your destination");
				destination.focus();
				return false;		
			}
		}
</script>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php 
include ("nav.php")
?>
<div id="mainarea">
<h1 align="center"><font color="Cornsilk" face="Times New Roman">Enter the Flight Details</font></h1>
<form name="transaction" action="book.php" method="post" onsubmit="return validate()">
<table align="center">
<tr>
<td><p><font color="Cornsilk" size="5"> Select Origin:</font></p></td>&nbsp;&nbsp;
<td><select id="source" align="center" name="source">
<option value="None" disabled selected>Select Origin</option>
<option value="Atlanta">Atlanta</option>
<option value="New York">New York</option>
<option value="Chicago">Chicago</option>
<option value="Denver">Denver</option>
<option value="Los Angeles">Los Angeles</option>
<option value="Boston">Boston</option>
</select>
</td>
</tr>
<tr>
<td><p><font color="Cornsilk" size="5">Select Destination:</font></p></td>
<td><select id="destination" align="center" name="destination">
<option value="None" disabled selected>Select Destination</option>
<option value="New York">New York</option>
<option value="Los Angeles">Los Angeles</option>
<option value="Miami">Miami</option>
<option value="San Diego">San Diego</option>
<option value="Denver">Denver</option></select></td>
</tr>
</table><br><br>
<center><input type="submit" value="submit" id="submit" name="submit" ></center>
</div>
</body>
</html>