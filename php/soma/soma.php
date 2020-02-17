<html>
    <head>
        <title>PHP - formulário</title>
        <meta charset="utf-8">
    </head>
    <body>
        <b>Formulário para soma de dois números</b>
        <p></p>
        <form id="form1" method="post" action="somadedoisnumeros.php">

        <p><label for="frase">Informe o primeiro número:</label> 
        <input type="int" name="n1" id="n1" size="5" maxlength="5"></p>

        <p> <label for="frase">Informe o segundo número:
        <input type="int" name="n2" id="n2" size="5" maxlength="5"></label></p>

        <p><label><input type="submit" name="submit" id="submit" value="Calcular"> </label>
        <label><input type="reset" name="reset" id="reset" value="Limpar"> </label></p>
        </form>  
</body>
</html>