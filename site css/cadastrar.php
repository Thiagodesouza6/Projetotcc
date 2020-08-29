<?php 
include('cadastrarback.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/open-iconic-bootstrap.css">
        <link rel="stylesheet" href="css/reset.css">
      <link rel="stylesheet" href="css/estilos.css">
     
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <title>Checkout Mirror Fashion</title>
    </head>
    <body>
  
    <?php include('header.php');
 ?><br><div class="container"><?php echo "<h1 class=novidades lead  >$error</h1>";?>
 <form method="POST">
    <fieldset>
        <legend><h1 class="lead">Dados pessoais</legend></h1>
    
        <div class="form-group">
            <label for="nome">Nome completo</label>
            <input type="text" class="form-control" id="nome" name="nome" autofocus>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mb-1">
               
                <input type="email" class="form-control" id="email" name="email" placeholder="email@exemplo.com">
            </div>
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="000.000.000-00">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" >
        </div>
        <div class="form-group">
            <label for="consenha">Confirmar Senha</label>
            <input type="password" class="form-control" id="consenha" name="consenha" >
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
    <input type="submit" class="btn btn-primary" name="cadastrar" value="Cadastrar">
        
   
</form>
<br> <br>
</div>
<?php include('footer.php');?>
</body>
  </html>