<?php
$n=$_POST["num"];
$a=1;
while($a<=10)
{
    $total=$n*$a;
    echo "$n X $a = $total<br>";
    $a++;
}
?>