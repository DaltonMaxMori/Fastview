<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar Cliente');


use \App\Entity\Cliente;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A Cliente
$oCliente = Cliente::getClientePeloId($_GET['id']);



//VALIDAÇÃO DA Cliente
if(!$oCliente instanceof Cliente){
  header('location: index.php?status=error');
  exit;
}
// var_dump($oCliente);exit;

//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['telefone'],$_POST['email'])){

  $oCliente->nome    = $_POST['nome'];
  $oCliente->telefone = $_POST['telefone'];
  $oCliente->email     = $_POST['email'];
  $oCliente->atualizar();

  echo alerta('success','Alterado Com Sucesso');
  exit;
}
include __DIR__.'/view/header.php';
include __DIR__ .'/view/navbar.php';
include __DIR__.'/view/formulario.php';
include __DIR__.'/view/footer.php';