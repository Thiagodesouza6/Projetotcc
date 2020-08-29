<?php
$error="";

if(isset($_POST['cadastrar'])){
    $nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$consenha=$_POST['consenha'];
  if($consenha!=$senha){
    $error="senha nada a ver";
  }else if(strlen($senha)<6){
    $error="senha pequena";
  }else{
    header('Location:sucesso.php ');;}
    
  
}
?>