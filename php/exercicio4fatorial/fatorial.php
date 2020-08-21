<?php
$n=$_POST["num"];
$a=1;
$s=$n;
while($s>1)
{
    
    $a=$a*$s--;
}
echo " o fatorial de $n é $a ";
?>