<?php
$n=$_POST["num"];
$a=0;//contador 
$cont=0;//contador do número de divisores
while($a<=$n)//enquanto $a(contador) for menor ou igual a $n (número informado pelo usuário)
{
    $a++;//
    if($n%$a==0)
    {
        $cont++;
        echo $a."<br>";
    }
}
if($cont==2)
{
    echo "<h3>$n é número primo";
}
else
{
    echo "<h3>$n não é primo";
}
?>