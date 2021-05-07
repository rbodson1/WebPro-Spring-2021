<?php
    
    echo "<h1>Part 1:</h1><br>";
$month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December');
for ($x = 0; $x <= 11; $x++) {
    echo "$month[$x], ";
}

    echo "<br><h1>Part 2:</h1><br>";

$month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December');
sort($month);
for ($x = 0; $x <= 11; $x++) {
    echo "$month[$x], ";
}

    echo "<br><h1>Part 3a:</h1><br>";

$month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December');
foreach ($month as &$val) {
    echo "$val, ";
}

    echo "<br><h1>Part 3b:</h1><br>";

$month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December');
sort($month);
foreach ($month as &$val) {
    echo "$val, ";
}
?>
