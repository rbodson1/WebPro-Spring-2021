<html>

<head>

<title>10 Best Restaurants in Atlanta</title>

</head>

<body>

<?php

$rest=array("Chama Gaucha"=>"40.50",

"Aviva by Kameel"=> "15.00",

"Bone's Restaurant"=> "65.00",

"Umi Sushi Buckhed"=> "40.50",

"Fandangles"=> "30.00",

"Capital Grille"=> "60.50",

"Canoe"=> "35.50",

"One Flew South"=> "21.00",

"Fox Bros.BBQ"=> "15.00",

"South City Kitchen Midtown"=> "29.00" );

if(isset($_GET['sortPrice'])){
	arsort($rest);
}

if(isset($_GET['sortName'])){
	ksort($rest); //sort by name
}

?>

<form>

<table border>

<tr>

	<th>Restaurant Name</th>

	<th>Average Price</th>

</tr>

<?php

foreach($rest as $name => $price){

	echo "<tr>";

		echo "<td> ".$name." </td>";

		echo "<td> $".$price." </td>";

	echo "</tr>";

}

?>

</table>

<br><br>

<a href='restaurants.php?sortPrice=true'>Sort by Average Price</a>

<br><br>

<a href='restaurants.php?sortName=true'>Sort by Name</a>

<br><br>

</form>

</body>

</html>
