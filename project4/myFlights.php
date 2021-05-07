<!DOCTYPE html>
<html>
<head>
<title>GSU Flight Booking</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php 
session_start();
include("nav.php"); 
$conn = mysqli_connect("localhost","root","root","airline");
$sql = "SELECT *
	   FROM flights
	   WHERE f_no IN (
			SELECT f_no
			FROM tickets
  			WHERE p_id = ".$_SESSION['p_id']."
		)";
$result = mysqli_query($conn, $sql);
$rows = array();
while($row = mysqli_fetch_array($result)) {
    $rows[] = $row;
}
?>
<div align="center" id="main_area2">
<table>
<tr>
    <th>Flight Number</th>
    <th>Airline</th>
	<th>Origin City</th>
	<th>Destination City</th>
  </tr>
	<?php

		foreach($rows as $row){
			echo "<tr><td>".$row[0]."</td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td></tr>";
		};

	?>
</table>
</div>
</body>
</html>