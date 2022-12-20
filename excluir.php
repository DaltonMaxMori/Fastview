<?php

use App\entity\Cliente;

require __DIR__ . '/vendor/autoload.php';


if(!isset($_GET['id'])or !is_numeric($_GET['id'])){
    header('location:index.php?status=error');
    exit;
}
//consulta cliente
$oCliente=Cliente::getClientePeloId($_GET['id']);

//validacao da cliente
if(!$oCliente instanceof Cliente){
    header('location:index.php?status=error');
    exit;
}

if(isset($_POST['excluir'])){

    $oCliente->excluir(); 
    echo alerta('success','removido com sucesso');
    exit;
}
include __DIR__ . '/view/header.php';
include __DIR__ . '/view/navbar.php';
include __DIR__ . '/view/confirmar-exclusao.php';
include __DIR__ . '/view/footer.php';

?>
