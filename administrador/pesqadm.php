<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");

  $id = $_SESSION['idadm'];
  $sql = "SELECT * FROM administrador WHERE idadm = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nomeadm'];?></h5>

	<div class="divider"></div>
	<div class="section">
	<h5>Informações do Usuario</h5>
	
		<h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
		<h6 class="left-align">Telefone Cel: <?php echo $dados['telefone'];?></h6>
		<h6 class="left-align">CNPJ: <?php echo $dados['cnpj'];?></h6>
		<h6 class="left-align">Email: <?php echo $dados['email'];?></h6>

</div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>