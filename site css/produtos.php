<?php

?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produto</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="css/produto.css">
   
</head>
<body>
<?php include('header.php');?>
    
    <div class="produto container">
        <h1>Fuzzy Cardigan</h1>
        <p>por apenas R$ 129,90</p>
        <form>
            <fieldset class="cores">
                <legend>Escolha a cor:</legend>
                <input type="radio" name="cor" value="verde" id="verde" checked>
                
                <label for="verde">
                    <img src="img/produtos/foto1-verde.png" alt="Produto na cor verde">
                </label>
                <input type="radio" name="cor" value="rosa" id="rosa">
                <label for="rosa">
                    <img src="img/produtos/foto1-rosa.png" alt="Produto na cor rosa">
                </label>
                <input type="radio" name="cor" value="azul" id="azul">
                <label for="azul">
                        <img src="img/produtos/foto1-azul.png" alt="Produto na cor azul">
                </label>
            </fieldset>
            <br>
            <button type="button" class="btn btn-success btn-lg"><a href="checkout.php">Comprar</a></button>
        </form>
        <div class="detalhes">
            <h2>Detalhes do produto</h2>
            <p>Esse é o melhor casaco de Cardigã que você já viu. Excelente material
                italiano com estampa desenhada pelos artesãos da comunidade de Krotor nas ilhas
                gregas. Compre já e receba hoje mesmo pela nossa entrega a jato.
            </p>
            <table>
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Detalhe</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Modelo</td>
                        <td>Cardigã 7845</td>
                    </tr>
                    <tr>
                        <td>Material</td>
                        <td>Algodão e poliester</td>
                    </tr>
                    <tr>
                        <td>Cores</td>
                        <td>Azul, Rosa e Verde</td>
                    </tr>
                    <tr>
                        <td>Lavagem</td>
                        <td>Lavar a mão</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php include('footer.php');?>
</body>
</html>
