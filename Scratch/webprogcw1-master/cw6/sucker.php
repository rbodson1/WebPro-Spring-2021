<html>

<head>
    <title>Suckers</title>
</head>

<body>
    <h1>Thanks, Sucker!</h1>
    <dl>
        <dt>Name</dt>
        <dd>
            <?php echo $_POST['name']; ?>
        </dd>

        <dt>Section</dt>
        <dd>
            <?php echo $_POST['section']; ?>
        </dd>

        <dt>Credit Card</dt>
        <dd>
            <?php
            $a = $_POST['creditcard'];
            $a .= " (";
            $a .= $_POST['cc'];
            $a .= ")";

            echo $a; ?>
        </dd>
    </dl>

    <p>Here are all the suckers who have submitted here:</p>
    <pre>
<?php
$name = $_POST['name'];
$section = $_POST['section'];
$creditcard = $_POST['creditcard'];
$cc = $_POST['cc'];

$txt = "$name;$section;$creditcard;$cc";
echo $txt;

$myfile = fopen("sucker.php", "a");
fwrite($myfile, "</br>" . $txt);
fclose($myfile);
?>
</pre>

</body>

</html></br>