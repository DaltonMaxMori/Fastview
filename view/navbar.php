<?php
use \App\Session\Login;
$usuarioLogado=Login::getUsuarioLogado();

$usuario =$usuarioLogado?
          $usuarioLogado['nome'].'&nbsp&nbsp<a href="logout.php" class="btn btn-secondary " >Sair</a>':
          '<a href="login.php" class="btn btn-secondary" >Entrar</a>'
?>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container" >
    <a class="navbar-brand" href="index.php">FASTVIEW</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">CADASTRAR</a>
        </li>
      </ul>
    </div>
    <div class="d-flex-justify-content-end">
        <?=$usuario?>

      </div>
  </div>
</nav>