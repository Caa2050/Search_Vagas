<?php
require_once ("../conexão/db_connect.php");
require_once ("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
 if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM alunos WHERE idaluno = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
 ?>
 <div class="row">
      <div class="col s12 m6 push-m3">
        <h3>Editar alunos </h3>
        <form action="editar_aluno.php" method="POST">
          <input type="hidden" name = "id" value="<?php echo $dados['idaluno'];?>">
          <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value= "<?php echo $dados['nomealuno'];?>">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="endereco" id="endereco"value= "<?php echo $dados['endereco'];?>">
            <label for="endereco"></label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="telcelular" id="telcelular"value= "<?php echo $dados['telcelular'];?>">
            <label for="telcelular">Telefone</label>
          </div>
          <button type= "submit"name="btn-editar" class="btn">Atualizar</button>
        </form>
        </div>
      </div>
      <br>
<br>
<br>
<br>
<br>
<br>
<?php
if (isset($_POST['btn-editar'])) {
  $nome = mysqli_escape_string($nulink,$_POST['nome']);
  $endereco = mysqli_escape_string($nulink,$_POST['endereco']);
  $telcelular = mysqli_escape_string($nulink,$_POST['telcelular']);

  $id = mysqli_escape_string($nulink,$_POST['id']);
  $sql = "UPDATE alunos SET nomealuno ='$nome', endereco = '$endereco', telcelular = '$telcelular' WHERE idaluno = '$id'";
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