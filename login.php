<?php

require __DIR__.'/vendor/autoload.php';
use App\entity\Usuario;
use \App\Session\Login;

$alertaLogin='';
$alertaCadastro='';

//obriga o usuario a nao estar logado
Login::requireLogout();
if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'logar':
            $oUsuario=Usuario::getUsuarioPorEmail($_POST['email']);
            if (!$oUsuario instanceof Usuario||!password_verify($_POST['senha'],$oUsuario->senha)) {
                $alertaLogin="E-mail ou senha inválidos";
                break;
            }
            Login::login($oUsuario);
            break;
    
        case 'cadastrar':
            if(isset($_POST['nome'],$_POST['email'],$_POST['senha'])){
                $oUsuario=Usuario::getUsuarioPorEmail($_POST['email']);
                if ($oUsuario instanceof Usuario){
                    $alertaCadastro='O e-mail digitado já está em uso';
                    break;
                }
                $oUsuario = new Usuario;
                $oUsuario->nome = $_POST['nome'];
                $oUsuario->email = $_POST['email'];
                $oUsuario->senha = password_hash( $_POST['senha'],PASSWORD_DEFAULT);
                $oUsuario->cadastrar();
                Login::login($oUsuario);
            }
            break;
    }
}

include __DIR__ . '/view/header.php';
include __DIR__ .'/view/navbar.php';
include __DIR__.'/view/formulario-login.php';
include __DIR__.'/view/footer.php';