<!DOCTYPE html>
<html>
<head>
    <title>CW4-First PHP Functions</title>
</head>
<body>
    <style>
        p{ color: red}
        .ans{
            color:yellow;
        }
        </style>

<p>Exercise 1: Function</p>
<?php 
function hello_world(){
    echo "Hello world!";
}
hello_world();
?>

<p>Exercise 2: Loops</p>
<?php 
    for($i=1;$i<=5;$i++){
        for($j=1;$j<=$i;$j++){
            echo "*"; 
        }
        echo '<br>';
    }
?>

<p>Exercise 3: Function-triangle</p>
<?php 
function triangle($num){
    for($i=1;$i<=$num;$i++){
        for($j=1;$j<=$i;$j++){
            echo "*";
        }
        echo "<br>";
    }
}
triangle(10);
?>

<p>Exercise 4: Function-word_count</p>
<?php 

function word_count($string){
   $count = str_word_count($string);
   echo "The string is ($string) <br>";
   return $count; 
}
echo word_count("hello, how are you? My name is Rachid");
?>

<p>Exercise 5: Function-countWord</p>
<?php 
function countWord($str){
    echo "The string is ($str)<br>";
    $counted = print_r(array_count_values(str_word_count($str,1)));
    return $counted;

}

echo countWord("Rachid is the man, because rachid is the one that we all follow and aspire to be like")

?>

<p>Exercise 6: Function-remove_all</p>
<?php 
function remove_all($str,$char){
    echo "The string is ($str), the character to be removed is (e)<br>";
    return implode(explode($char,$str));

}
echo remove_all("Summer is here and it will be over soon","e");
?>

</body>

</html>