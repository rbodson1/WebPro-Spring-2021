<?php 
include("top.html");
$username = trim($_GET["name"]);
?>


<h1>Matches for <?= $username ?></h1>

<?php
$lines = file("singles.txt", FILE_IGNORE_NEW_LINES);

list($name, $gender, $age, $personality, $os, $min, $max) = explode(",", $lines[0]);
$i = 0;
while ($username != $name) {
	$i++;
	list($name, $gender, $age, $personality, $os, $min, $max) = explode(",", $lines[$i]);
}

foreach ($lines as $line) {
	list($name2, $gender2, $age2, $personality2, $os2, $min2, $max2) = explode(",", $line);
	if ($gender2 != $gender && 
		$age2 >= $min &&
		$age2 <= $max &&
		$min2 <= $age &&
		$max2 >= $age && 
		similar_text($personality2, $personality) > 0 &&
		$os == $os2) {
?>

<div class="match">
<p>
	<?= $name2 ?>
</p>

<ul>
	<li><strong>gender:</strong><?= $gender2?></li>
	<li><strong>age:</strong><?= $age2?></li>
	<li><strong>type:</strong><?= $personality2?></li>
	<li><strong>OS:</strong><?= $os2?></li>
</ul>

</div>
	<?php 
	}
}

?>

<?php include("bottom.html"); ?>