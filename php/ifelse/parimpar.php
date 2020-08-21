<?php
    $num = $_POST["num"];
    print "Verificando se o número é par ou ímpar <br/>";
    if ($num % 2==0)
    {
        print "O número $num é par.";
    }
    else
    {
        print "O número $num é ímpar.";
    }
?>