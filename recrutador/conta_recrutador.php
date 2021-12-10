<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menurecrutador.php");

if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM recrutador WHERE idrecrutador = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nomerecrutador'];?></h5>

	<div class="divider"></div>
	<div class="section">
<h5>Informações do Usuario</h5>
	
		<h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
		<h6 class="left-align">Telefone: <?php echo $dados['telefone'];?></h6>
		<h6 class="left-align">CNPJ: <?php echo $dados['cnpj'];?></h6>
    <h6 class="left-align">Telefone Celular: <?php echo $dados['telefonecel'];?></h6>
		<h6 class="left-align">Email: <?php echo $dados['email'];?></h6>

</div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>