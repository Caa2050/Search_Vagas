<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");

if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM alunos WHERE idaluno = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
?>
<div class="row">
	<h5 class="center-align"><?php echo $dados['nomealuno'];?></h5>
	<div class="divider"></div>
	<div class="section">
	<h5>Informações do Usuario</h5>
	
		<h6 class="left-align">CPF: <?php echo $dados['cpf'];?></h6>
		<h6 class="left-align">Sexo: <?php echo $dados['sexo'];?></h6>
		<h6 class="left-align">Data de Nascimento: <?php echo $dados['dtnasc'];?></h6>
		<h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
    <h6 class="left-align">Telefone Celular: <?php echo $dados['telcelular'];?></h6>
</div>
<?php $_SESSION['idaluno'] = $dados['idaluno'];
		$idaluno = $dados['idaluno']?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <div class="file-field input-field">
      <div class="btn">
        <span>Arquivo</span>
        <input type="file" name="arquivo">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <button type="submit" class="btn waves-effect waves-light" name="enviar-formulario">Salvar</button>
  </form>
</div>
<div class="divider"></div>
<h5>Curriculo</h5>
<div class="col s12 m6 push-m3">
        <table class="striped">
          <thead>
            <tr>
              <th>id:</th>
              <th>Nome</th>
              <th>Size:</th>
              <th>Download</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM curriculos where fkaluno = '$idaluno'";
			$result = mysqli_query($nulink,$sql);
			$files = mysqli_fetch_all($result,MYSQLI_ASSOC);
			foreach ($files as $file):
				
			
            ?>
            <tr>
              <td><?php echo $file['idcurriculo'];?></td>
              <td><?php echo $file['nome'];?></td>
          	 <td><?php echo $file['size'];?></td>
     		<td><a href="download.php?file=<?php echo $file['nome'];?>">Download</a></td>
     			<td><a href="#modal<?php echo $file['idcurriculo'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
              <div id="modal<?php echo $file['idcurriculo'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir esse curriculo?</p>
              </div>
              <div class="modal-footer">
              <form action="deleta_curriculo.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $file['idcurriculo'];?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
              </div>
            </tr>
          <?php endforeach;?>

          </tbody>
        </table>
      </div>
<?php

require_once("../estrutura_pagina/footer.php");
?>