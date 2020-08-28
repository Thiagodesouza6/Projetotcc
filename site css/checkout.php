<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.css">
        <title>Checkout Mirror Fashion</title>
    </head>
    <body>
        <!--componente leve e flexivel para exibir conteudo.um componente leve e flexivel
        que pode se extender
    pela viewport inteira para exibir mensagens de market em sesu site
para um jumbotron com largura total e sem cantos arredondados, existe a classe modificadora
.jumbotron-fluid e adicione um .container ou .container-fluid
dentro do jumbotron-->
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <!--bootstrap 4 usa um font-size de font-size padrao de 16px e a line height
        é 1,5. a font-family padrão é "helvetica neue", helvetica, arial, sans-serif.
    além disso, todos os elementos <p> possuem margin-top: 0 e margin-bottom:1rem(16px por padrão)
        o bootstrap 4 estiliza os cabeçalhos HTML(<h1> a <h6>)
            os titulos de exibição são usados para se destacar mais do que os titulos normais(tamanho de 
            fonte maior e peso de fonte mais leve), e há quatro classes para escolher:
        .display-1, .display-2,  .display-3,  .display-4, -->
        <h1 class="display-4">Ótima escolha!</h1>
        <p class="lead">Obrigado por comprar na mirror Fashion!
            Preencha seus dados para efetivar a compra.
        </p>
    </div>
</div>
<div class="container">
    <!--um card é uym container de conteudo flexivel e extensivel.
    ele tem opçoes para cabeçalhos e rodapes, uma larga variedade de conteudo,
cores de background contextuais e opçoes de display poderosas.
e voce é familiarizado com bootstrap 3, saiba que os cards substituem nossos antigos panels, wells e
thumbnails.
uma funcionalidade similar a destes componentes está disponivel, usando classes modificadoras para cards.
https://getbootstrap.com.br/docs/4.1/components/card/ -->
<div class="card mb-3">
    <div class="card-header">
        <h2>Sua compra</h2>
    </div>
    <div class="card-body">
        <!--listas de definição nao se diferenciam muito de listas comuns
        como as listas c e não ordenadas
    a diferenca principal entre as listas comuns e a listas de definicao
é que listas de definição irao sempre trabalhar com dois itens que sao o termo e a definição.
a lista de definição fica contida dentro da tag dl.
na tag dl, há o termo descrito pela tag dt que por sua vez é definido posteriormente na tag dd.
bom para casos como, por exemplo, compor glossarios e dicionarios de termos para documentos.
-->
<dl>
    <img src="img/produtos/foto1-verde.png" alt="Fuzzy Cardigan" class="img-thumbnail mb">
    <dt>Produto</dt>
    <dd>Fuzzy Cardigan</dd>

    <dt>Cor</dt>
    <dd>Verde</dd>
    <dt>Tamanho</dt>
    <dd>40</dd>
    <dt>Preço</dt>
    <dd>R$ 129,90</dd>
</dl>
</div>
</div>
<form>
    <fieldset>
        <legend>Dados pessoais</legend>
        <!--https://getbootstrap.com.br/docs/4.1/components/forms/#form-controls-->
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-3">
                <div class="input-group-pretend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
            </div>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
        </div>
        <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="newsletter" value="sim" checked>
            <label class="custom-control-label" for="newsletter">
                Quero receber Newsletter da Mirror Fashion
            </label> 
        </div>
    </fieldset>
    <fieldset>
        <legend>Cartão de crédito</legend>
        <div class="form-group">
            <label for="numero-cartao">Número - CVV</label>
            <input type="text" class="form-control" id="numero-cartao" name="numero-cartao">
        </div>
        <div class="form-group">
                <div class="input-group mb-3">
                        <div class="input-group-pretend">
                            <label class="input-group-text" for="bandeira-cartao">Bandeira</label>
                        </div>
                        <select class="custom-select" id="bandeira-cartao">
                            <option disabled selected>Selecione uma opção...</option>
                            <option value="master">MasterCard</option>
                            <option value="visa">VISA</option>
                            <option value="amex">American Express</option>
                        </select>
                </div>            
        </div>
        <div class="form-group">
            <label for="validade-cartao">Validade</label>
            <input type="month" class="form-control" id="validade-cartao" name="validade-cartao">
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">
        <span class="oi oi-tumb-up"></span>
        Confirmar Pedido
    </button>
</form>
</div>
</body>
</html>