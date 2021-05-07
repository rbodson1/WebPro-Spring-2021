<?php
function isBitten() {
	return rand(0,1) == 1;
}
?>
<html>
	<head>
		<title>Charlie Ate My Lunch!</title>
	</head>
	<body>
		<p>
			<?php 
				$str = isBitten() ? "Charlie ate my lunch!" : "Charlie did not eat my lunch!";
				echo $str;
			?>
		</p>
	</body>
</html>

