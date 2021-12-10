<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");

if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM administrador WHERE idadm = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nomeadm'];?> <a href="editaramd.php?id=<?php echo $dados['idadm'];?>" class="btn-floating grey darken-3"><i class="material-icons">edit</i></a> <a href="#modal<?php echo $dados['idadm'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></h5>
              <div id="modal<?php echo $dados['idadm'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir sua conta?</p>
              </div>
              <div class="modal-footer">
              <form action="deletaadm.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['idadm'];?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
              </div>

	<div class="divider"></div>
	<div class="section">
	<h5>Informações do Usuario</h5>
	
		<h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
		<h6 class="left-align">Telefone: <?php echo $dados['telefone'];?></h6>
		<h6 class="left-align">CNPJ: <?php echo $dados['cnpj'];?></h6>
		<h6 class="left-align">Email: <?php echo $dados['email'];?></h6>

</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once("../estrutura_pagina/footer.php");
?>