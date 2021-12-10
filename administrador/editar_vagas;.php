<?php
require_once ("../conexão/db_connect.php");
require_once ("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
 if(isset($_GET['id'])){
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM vagas WHERE idvagas = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
 ?>
 <div class="row">
      <div class="col s12 m6 push-m3">
        <h3>Editar vagas</h3>
        <form action="editar_vagas;.php" method="POST">
          <input type="hidden" name = "id" value="<?php echo $dados['idvagas'];?>">
          <div class="input-field col s12">
            <input type="text" name="nome" id="nome" value= "<?php echo $dados['nome_vaga'];?>">
            <label for="nome">Nome</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="tipo" id="tipo"value= "<?php echo $dados['tipo'];?>">
            <label for="tipo">Tipo</label>
          </div>
          <div class="input-field col s12">
            <label for="descrição">Descrição</label>
          <textarea  name="descrição"class="materialize-textarea"value= "<?php echo $dados['descricao'];?>"></textarea>
          </div>
          <div class="input-field col s12">
            <label for="requisitos">Requisitos</label>
          <textarea  name="requisitos"class="materialize-textarea"value= "<?php echo $dados['requisitos'];?>"></textarea>
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
  $descrição = mysqli_escape_string($nulink,$_POST['descrição']);
  $tipo = mysqli_escape_string($nulink,$_POST['tipo']);
  $requisitos = mysqli_escape_string($nulink,$_POST['requisitos']);
  $id = $_SESSION['idrecrutador'];
  $idvagas = mysqli_escape_string($nulink,$_POST['id']);
  $sql = "UPDATE vagas SET nome_vaga ='$nome',tipo = '$tipo',descricao = '$descrição', requisitos = '$requisitos',fkrecrutador = '$id'     WHERE idvagas = '$idvagas'";
  if (mysqli_query($nulink,$sql)) {
    $_SESSION['mensagem'] = "Atualizado com sucesso!";

    header('Location:./pesquisa.php');

  }else{
    $_SESSION['mensagem']="Erro ao atualizar!";
    header('Location:./pesquisa.php');
  }
}
require_once("../estrutura_pagina/footer.php");
?>