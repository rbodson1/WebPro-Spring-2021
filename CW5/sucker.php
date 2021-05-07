
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<?php

		
		
		if(!empty($_POST['name']) && !empty($_POST['section']) && !empty($_POST['ccNumber']) && !empty($_POST['ccType'])){
		$name = $_POST['name'];
		$section = $_POST['section'];
		$cardNumber = $_POST['ccNumber'];
		$cardType = $_POST['ccType'];
        
		echo "<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>";

		echo "<dl>
		<dt>Name</dt>
		<dd> 
		 $name
		 </dd>

		 <dt>Section</dt>
		<dd> 
		 $section
		 </dd>

		 <dt>Credit Card</dt>
		<dd> 
		  $cardNumber ($cardType)
		 </dd>";


		echo "<br/>Here are all the suckers who have submitted here:";

		$datails = "$name;$section;$cardNumber;$cardType";
		echo "<p>$datails</p>";

		$saveDetail = fopen("./sucker.php", "a");
		fwrite($saveDetail, "</br>" . $details);
		fclose($saveDetail);
		
	}
	else {

		echo "<h1>Sorry</h1><br/>";
		echo "You didn't fill out the form completely. ". '<a href="buyagrade.html">Try again?<br/></a>';
		
	}
		?>

	</body>
</html></br></br></br></br>