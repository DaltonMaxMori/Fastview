<?php
require __DIR__ . '/vendor/autoload.php';

use App\entity\Cliente;

use App\Session\Login;

//obriga o usuario a estar logado
Login::requireLogin();

$clientes=Cliente::getCliente();

include __DIR__ . '/view/header.php';
include __DIR__ . '/view/navbar.php';
include __DIR__ . '/view/listagem.php';
include __DIR__ . '/view/footer.php';


?> 