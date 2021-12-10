<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");

if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM alunos WHERE idaluno = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
 
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nomealuno'];?>   <a href="../alunos/editar_aluno.php?id=<?php echo $dados['idaluno'];?>" class="btn-floating grey darken-3"><i class="material-icons">edit</i></a><a href="#modal<?php echo $dados['idaluno'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></h5>
              <div id="modal<?php echo $dados['idaluno'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir essa conta?</p>
              </div>
              <div class="modal-footer">
              <form action="../alunos/deletar_aluno.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['idaluno'];?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
              </div>
	<div class="divider"></div>
	<div class="section">
	<h5>Informações do Usuario</h5>
	
		<h6 class="left-align">CPF: <?php echo $dados['cpf'];?></h6>
		<h6 class="left-align">Sexo: <?php echo $dados['sexo'];?></h6>
		<h6 class="left-align">Data de Nascimento: <?php echo $dados['dtnasc'];?></h6>
		<h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
		<h6 class="left-align">Telefone Cel: <?php echo $dados['telcelular'];?></h6>
</div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>