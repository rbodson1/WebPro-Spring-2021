<!DOCTYPE html>
<html>
<head>
<title>Parking</title>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php 
	session_start();
	include("nav.php"); 
	$conn = mysqli_connect("localhost","root","root","airline");
	$sql = "SELECT *
		FROM parking";
	$result = mysqli_query($conn, $sql);
	$rows = array();
	while($row = mysqli_fetch_array($result)) {
		$rows[] = $row;
	}

	if (isset($_POST['submit'])&&isset($_POST['reserve'])){
		$sql = "UPDATE `airline`.`parking` SET `p_no` = '".$_SESSION['p_id']."' WHERE (`spot_no` = '".$_POST['reserve']."');";
	if(mysqli_query($conn, $sql)){  
		$message = "You have reserved space number ".$_POST['reserve'].".";
	}
	else{
		$message="Transaction failed";
	}
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>
<div align="center" style="background: grey;">
<form method="post" action="parking.php">
<table>
	<h3>Parking Spaces Available</h3>
<tr>
	<th></th>
    <th>Number</th>
	<th>Price</th>
	<th>Reserve</th>
  </tr>
	<?php
		foreach($rows as $row){

			if($row[1]!="")
				continue;
			else{
				if($row[2]==1)
					echo "<tr><td>VIP</td>";
				else
					echo "<tr><td></td>";
				echo "<td>".$row[0]."</td>";
				echo "<td>$".$row[3]."</td>";
				echo "<td><input type='radio' name='reserve' value='".$row[0]."'></button></tr>";
			}
		};

	?>
</table>
<input type='submit' id='submit' name='submit' value='Reserve'></input>
</form>
</div>
</body>
</html>