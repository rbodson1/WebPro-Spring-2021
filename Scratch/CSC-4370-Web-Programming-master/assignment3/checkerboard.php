<?php

$count=0;

echo "<html><head><title> Checker Board </title></head>";

echo '<table style="width:300px" border="1" cellspacing="1" cellpadding="1" align="center">'; // using table tag to create the checker board

for($x=0;$x<9;$x++){
    
    echo "<tr>";
    
    for($y=0;$y<9;$y++){
        $count=$count+1;

        if($count%2 == 0){
            echo '<td height="35" width="35" style="background-color:red;"></td>';
        }
        
        else{
        echo '<td height="35" width="35" style="background-color:black;>"</td>';
        }
    }
    echo "</tr>";
}
    
echo "</table></html>";

?>
