<?php
session_start();
// esse é a barra de menu principal do site. O menu se inicia na tag <nav>
require_once("../conexão/db_connect.php");

$cpf = $_SESSION['cpf'];
  $sql = " SELECT * FROM alunos WHERE cpf = '$cpf'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
?>
<nav class="nav-extended navbar-fixed grey darken-3">
    <div class="nav-wrapper">
      <a href="principal.php" class="brand-logo">Search Vagas</a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="pesquisaluno.php"><i class="material-icons">search</i></a></li>
        <li><a href="contaaluno.php?id=<?php echo $dados['idaluno'];?>">Minha Conta</a></li>
        <li><a href="logoffaluno.php">Sair</a></li>
      </ul>
    </div>
    <div class="nav-content red accent-4">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#recentes">Vagas Recentes</a></li>
        <li class="tab"><a href="#vagas">Minhas Vagas</a></li>
        
      </ul>
    </div>
  </nav>
<?php
// essa parte abaixo é feito para telas menores (smartphones,tablets)
?>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="pesquisaluno.php">Pesquisar</a></li>
    <li><a href="contaaluno.php?id=<?php echo $dados['idaluno'];?>">Minha Conta</a></li>
    <li><a href="logoffaluno.php">Sair</a></li>
  </ul>

  

  

 