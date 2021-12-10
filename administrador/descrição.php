<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM vagas WHERE idvagas = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nome_vaga'];?><a href="editar_vagas;.php?id=<?php echo $dados['idvagas'];?>" class="btn-floating grey darken-3"><i class="material-icons">edit</i></a> <a href="#modal<?php echo $dados['idvagas'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></h5>
              <div id="modal<?php echo $dados['idvagas'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir essa vaga</p>
              </div>
              <div class="modal-footer">
              <form action="deletar_vaga.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['idvagas'];?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
              </div>

	<div class="divider"></div>
	<div class="section">
<h5>Informações da Vaga</h5>
		<h6 class="left-align">Tipo:</h6>
		<p style="font-size: 20px" class="left-align"><?php echo $dados['tipo'];?></p>
		<div class="divider"></div>
		<h6 class="left-align">Descrição:</h6>
		<p style="font-size: 20px" class="left-align"><?php echo $dados['descricao'];?></p>
		<div class="divider"></div>
		<h6 class="left-align">Requisitos:</h6>
		<p style="font-size: 20px" class="left-align"><?php echo $dados['requisitos'];?></p>
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
<?php
require_once("../estrutura_pagina/footer.php");
?>