<?php
require_once ("../conexão/db_connect.php");
require_once ("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
 if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM administrador WHERE idadm = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
 ?>
 <div class="row">
      <div class="col s12 m6 push-m3">
        <h3>Editar Administrador</h3>
        <form action="editaramd.php" method="POST">
          <input type="hidden" name = "id" value="<?php echo $dados['idadm'];?>">
          <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value= "<?php echo $dados['nomeadm'];?>">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="endereco" id="endereco"value= "<?php echo $dados['endereco'];?>">
            <label for="sobrenome">Endereço</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="telefone" id="telefone"value= "<?php echo $dados['telefone'];?>">
            <label for="email">Telefone</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="cnpj" id="cnpj"value= "<?php echo $dados['cnpj'];?>">
            <label for="email">CNPJ</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="email" id="email"value= "<?php echo $dados['email'];?>">
            <label for="email">Email</label>
          </div>
          <button type= "submit"name="btn-editar" class="btn">Atualizar</button>
        </form>
        </div>
      </div>
<?php
if (isset($_POST['btn-editar'])) {
	$nome = mysqli_escape_string($nulink,$_POST['nome']);
	$endereco = mysqli_escape_string($nulink,$_POST['endereco']);
	$telefone = mysqli_escape_string($nulink,$_POST['telefone']);
	$cnpj = mysqli_escape_string($nulink,$_POST['cnpj']);
	$email = mysqli_escape_string($nulink,$_POST['email']);

	$id = mysqli_escape_string($nulink,$_POST['id']);
	$sql = "UPDATE administrador SET nomeadm ='$nome', endereco = '$endereco', telefone = '$telefone', cnpj = '$cnpj', email = '$email' WHERE idadm = '$id'";
	if (mysqli_query($nulink,$sql)) {
		$_SESSION['mensagem'] = "Atualizado com sucesso!";

		header('Location:pesquisa.php');

	}else{
		$_SESSION['mensagem']="Erro ao atualizar!";
		header('Location:pesquisa.php');
	}
}
require_once("../estrutura_pagina/footer.php");
?>