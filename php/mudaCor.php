<?php 
$frase = $_POST["frase"];
$cor = $_POST["cor"];
if($cor=="vermelho")
    echo"<body bgcolor=blue><font color=red>".$frase;
else
if($cor=="azul")
    echo"<body bgcolor=Red>"."< font color=#0000FF>".$frase;  
else
if($cor=="verde")
    echo"<font color=#00FF00>".$frase;
else
if($cor=="amarelo")
    echo"<font color=#FFFF00>".$frase;
?>      