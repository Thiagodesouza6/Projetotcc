<?php
    $Operação=$_POST["Operação"];
    $n1=$_POST["num1"];
    $n2=$_POST["num2"];
    switch($Operação){
    case "soma":
        $resultado = $n1 + $n2;
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center;  type=float size=5 readonly=true value=$resultado></p> ";
    break;
    case "subtraçao":
        $resultado = $n1 - $n2;
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center;  type=float size=5 readonly=true value=$resultado></p> ";
    break;
    case "multiplicaçao":
        $resultado = $n1 * $n2;
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center;  type=float size=5 readonly=true value=$resultado></p> ";
    break;
    case "divisao":
        $resultado = $n1 / $n2;
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center;  type=float size=5 readonly=true value=$resultado></p> ";
    break;
    case "resto":
        $resultado = $n1 % $n2;
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center;  type=float size=5 readonly=true value=$resultado></p> ";
    break;
    case "outro":
        
        print "<p align=center><b>Resultado:<br></b>
        <input style=text-align:center; type=float size=15 readonly=true value=Operação inválida></p> ";
    break;
    }
?> 