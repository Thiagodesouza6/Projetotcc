<html>
    <head>
        <title>Tipos de variáveis em PHP</title>
    </head>
    <body>
        <?php
        /*Declarando variáveis*/
        $valor1 = 10; //inteiro
        $valor2 = 10.33; //decimal    
        $nome = "Aula exemplo de variáveis em php"; //variável texto - string
        $checado = true; //variavel booleana

        //impressão dos valores atribuitos acima nas variáveis
        echo "Exemplo de um programa em php";
        print "<p>";//comando html para pular linha

        echo "Conteúdo de valor1: ";
        echo $valor1 . " /Tipo de dado inteiro";
        print "<p>"; //comando html para pular linha

        echo "Conteúdo de valor2: ";
        echo $valor2 . " /Tipo de dado decimal";
        print "<p>"; //comando html para pular linha

        echo "Conteúdo de nome: ";
        echo $nome . " /tipo de dado string/texto";
        print"<p>";//comando html para pular linha

        echo "Conteúdo de checado: ";
        echo $checado . " /tipo de dado booleano";
        print"<p>";//comando html para pular linha
        ?>
    </body>
 <html>