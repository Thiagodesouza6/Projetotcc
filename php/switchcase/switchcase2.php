<?php
    $departamento=$_POST["departamento"];
    switch($departamento){
    case "Informatica":
        print "BEM VINDO AO DEPTO DE INFORMATICA";
    break;
    case "Esporte e lazer":
        print "BEM VINDO AO DEPTO DE Esporte e lazer";
    break;
    case "Moda":
        print "BEM VINDO AO DEPTO DE Moda";
    break;
    case "Cine & Foto":
        print "BEM VINDO AO DEPTO DE Cine & Foto";
    break;
    }
?>