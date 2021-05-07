<html>

<head>
    <title>Order Me</title>
</head>

<body>
    <?php
    $plate1 = $_POST['Plate1'];
    $plate2 = $_POST['Plate2'];
    $plate3 = $_POST['Plate3'];
    $find = $_POST['find'];
    $hasOrdered = false;
    $today = date("F j, Y, g:i a");

    $totPlate = $plate1 + $plate2 + $plate3;

    if ($totPlate > 0) {
        $hasOrdered = true;
    }

    function calcTotal($p1, $p2, $p3)
    {
        $p1C = $p1 * 2100;
        $p2C = $p2 * 199;
        $p3C = $p3 * 899;

        $subtotal = $p1C + $p2C + $p3C;

        echo "<p>Subtotal: $$subtotal</p>";
    }

    function calcTax($p1, $p2, $p3)
    {
        $p1C = $p1 * 2100;
        $p2C = $p2 * 199;
        $p3C = $p3 * 899;

        $tax = ($p1C + $p2C + $p3C) * 1.1;
        echo "<p>Total including tax: $$tax</p>";
    }

    function evaluateDropDown($val)
    {
        $res = "";
        switch ($val) {
            case "a":
                $res = "Google";
                break;
            case "b":
                $res = "Web ad";
                break;
            case "c":
                $res = "TV ad";
                break;
            case "d":
                $res = "Word of mouth";
                break;
        }

        echo "<p>Customer referred by $res</p>";
    }

    function emptyOrder($val)
    {
        if ($val == 0) {
            echo "You did not order anything on the previous page!";
        }
    }


    echo '<h1>Henry Fav Restaurant</h1>';
    echo '<h2>Order Results</h2>';
    echo "<p>Order Processed at: $today</p>";
    echo '<p>Your order is as follows:</p>';
    echo "<p>Plates ordered: $totPlate</p>";
    emptyOrder($hasOrdered);
    calcTotal($plate1, $plate2, $plate3);
    calcTax($plate1, $plate2, $plate3);
    evaluateDropDown($find);
    ?>
</body>

</html>