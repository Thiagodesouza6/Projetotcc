<html>
    <head>
        <title>Data e hora atuais...</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php
        date_default_timezone_set("Brazil/East");
        $data = date ("d/m/y",time());
        $hora = date ("h:i:s", time());
        ?>
        <p align="center"><strong>
        <font color="#0000F">Hoje é dia:</font>
        <?php
            echo $data;
        ?>
        <br>
        <p align="center"><strong>
        <font color="#0000F">Agora são:</font>
        <?php
            echo $hora;
        ?>
        </strong>
        </body>
 <html>