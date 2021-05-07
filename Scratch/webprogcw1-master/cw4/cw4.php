<html>

<head>
    <title>CW 4</title>
</head>

<body>
    <h1>Ex 1</h1>
    <?php echo '<p>Hello World</p>'; ?>
    <h1>Ex 2</h1>
    <?php
    $star = "*";
    for ($i = 0; $i <= 4; $i++) {
        echo $star;
        echo "<br>";
        $star = $star . "*";
    }
    ?>
    <h1>Ex 3</h1>
    <?php
    drawTriangle(6, "*");
    function drawTriangle($end, $star)
    {
        for ($i = 0; $i < $end; $i++) {
            echo $star;
            echo "<br>";
            $star = $star . "*";
        }
    }
    ?>
    <h1>Ex 4</h1>
    <?php
    echo word_count("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, vitae commodi esse, eveniet a rerum, non dolores ea deserunt odio voluptatem similique. Iusto odio voluptates sed eveniet, cum non distinctio!");

    function word_count($string)
    {
        $arrLen = str_word_count($string);
        return $arrLen;
    }
    ?>
    <h1>Ex 5</h1>
    <?php
    echo countWords("Lorem, ipsum dolor sit amet consectetur adipisicing elit. Doloribus, vitae commodi esse, eveniet a rerum, non dolores ea deserunt odio voluptatem similique. Iusto odio voluptates sed eveniet, cum non distinctio!");
    function countWords($string)
    {
        print_r(array_count_values(str_word_count($string, 1)));
    }
    ?>
    <h1>Ex 6</h1>
    <?php
    echo remove_all("Summer is Here", 'e');
    function remove_all($string, $char)
    {
        return implode(explode($char, $string));
    }
    ?>
</body>

</html>