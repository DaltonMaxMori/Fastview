<?php

use App\entity\Cliente;


require __DIR__ . '/vendor/autoload.php';

use \App\Session\Login;
//obriga o usuario a estar logado
Login::requireLogin();

define('TITLE','CADASTRAR CLIENTE');
$oCliente= new Cliente ;


// alerta();
if(isset($_POST['nome'],$_POST['telefone'],$_POST['email'])){
    $oCliente->nome=$_POST['nome'];
    $oCliente->telefone=$_POST['telefone'];
    $oCliente->email=$_POST['email'];  
    $oCliente->cadastrar(); 
    
    echo alerta('success','Cadastrado Com Sucesso');
    exit;
    
}
include __DIR__ . '/view/header.php';
include __DIR__ . '/view/navbar.php';
include __DIR__ . '/view/formulario.php';
include __DIR__ . '/view/footer.php';

?>
