<?php
session_start();
// esse é a barra de menu principal do site. O menu se inicia na tag <nav>
require_once("../conexão/db_connect.php");

$email = $_SESSION['email'];
  $sql = " SELECT * FROM administrador WHERE email = '$email'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);

?>
<nav class="nav-extended grey darken-3">
    <div class="nav-wrapper">
      <a href="principaladm.php" class="brand-logo">Search Vagas</a>

      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="pesquisa.php"><i class="material-icons">search</i></a></li>
        <li><a href="candidaturas.php">Candidaturas</a></li>
        <li><a href="relatorios.php">Relatorios</a></li>
        <li><a href="contaadm.php?id=<?php echo $dados['idadm'];?>">Minha Conta</a></li>
        <li><a href="logoffadm.php">Sair</a></li>
      </ul>
    </div>
    <div class="nav-content red accent-4">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#recentes">Vagas Recentes</a></li>
        <li class="tab"><a href="#adicionar">Adicionar Vagas</a></li>
        
      </ul>
    </div>
  </nav>
<?php
// essa parte abaixo é feito para telas menores (smartphones,tablets)
?>
  <ul class="sidenav" id="mobile-demo">
    <li><a href="pesquisa.php">Pesquisar</a></li>
    <li><a href="candidaturas.php">Candidaturas</a></li>
    <li><a href="relatorios.php">Relatorios</a></li>
    <li><a href="contaadm.php?id=<?php echo $dados['idadm'];?>">Minha Conta</a></li>
    <li><a href="logoffadm.php">Sair</a></li>
  </ul>

  

  

 