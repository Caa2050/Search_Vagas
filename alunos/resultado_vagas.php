<?php

require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");


if(isset($_SESSION['idvagas'])){
  $id = mysqli_escape_string($nulink,$_SESSION['idvagas']);
  $sql = "SELECT * FROM vagas WHERE idvagas = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
else{

  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM vagas WHERE idvagas = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
}
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nome_vaga'];?></h5>

	<div class="divider"></div>
	<div class="section">
<h5>Informações da Vaga</h5>
		<h6 class="left-align">Tipo:</h6>
		<h6 class="left-align"><?php echo $dados['tipo'];?></h6>
		<div class="divider"></div>
		<h6 class="left-align">Descrição:</h6>
		<h6 class="left-align"><?php echo $dados['descricao'];?></h6>
		<div class="divider"></div>
		<h6 class="left-align">Requisitos:</h6>
		<h6 class="left-align"><?php echo $dados['requisitos'];?></h6>
</div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>