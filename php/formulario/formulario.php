<!DOCTYPE html>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    <title>frase</title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="mudaCor.php">
    <p>
    <label>Escolha a Cor:</label>
    <select name="cor" id="cor">
    <option value="vermelho">Vermelho</option>
    <option value="azul">Azul</option>
    <option value="verde">Verde</option>
    <option value="amarelo">Amarelo</option>
    </select>
    </p>
    <p>
    <label>Entre com a frase:</label>
    <input name="frase" type="text" id="frase" size="100" maxlength="1000"/>
    </p>
    <p>
    <input type="submit" name="submit" id="submit" value="Enviar"/>
    </p>
    </form>
<body>
</html>