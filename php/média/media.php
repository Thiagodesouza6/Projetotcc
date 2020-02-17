<html>
    <head>
        <title>PHP - média de 3 números</title>
        <meta charset="utf-8">
    </head>
    <body>
        <b>Média de 3 números</b>
        <p></p>
        <form id="form1" method="post" action="media3numeros.php">

        <p><label for="frase">Nota 1:</label> 
        <input type="int" name="n1" id="n1" size="5" maxlength="5"></p>

        <p> <label for="frase">Nota 2:
        <input type="int" name="n2" id="n2" size="5" maxlength="5"></label></p>

        <p> <label for="frase">Nota 3:
        <input type="int" name="n3" id="n3" size="5" maxlength="5"></label></p>

        <p><label><input type="submit" name="submit" id="submit" value="Calcular"> </label>
        <label><input type="reset" name="reset" id="reset" value="Limpar"> </label></p>
        </form>  
</body>
</html>