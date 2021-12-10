<?php
session_start();
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");

?>
<div class="row">
  <form class="col s12" action="cadastro.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <label for="nomealuno">Nome</label>
          <input  name="nomealuno" type="text" class="validate">

        </div>
        <div class="input-field col s6">
          <label for="cpf">cpf</label>
          <input name="cpf" type="text" class="validate">
        </div>
      </div>
      <div class="row">
        <label> Sexo</label>
        <p>
      <label>
        <input name="sexo" type="radio" value = "M"checked />
        <span>Masculino</span>
      </label>
    </p>
    <p>
      <label>
        <input name="sexo" type="radio" value="F" />
        <span>Feminino</span>
      </label>
    </p>
    <p>
      <div class="input-field col s6">
          <label for="dtnasc">Data de Nascimento</label>
          <input type='date' name='dtnasc'>
        </div>
        <div class="input-field col s6">
          <label for="endereço">Endereço</label>
          <input name="endereço" type="text" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <label for="telcelular">Telefone Celular</label>
          <input name="telcelular" type="text" class="validate">
          
        </div>
        <div class="input-field col s6">
          <label for="senha">Senha</label>
          <input name="senha" type="password" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <label for="confsenha">Confirmar Senha</label>
          <input name="confsenha" type="password" class="validate">
        </div>
      </div>
        <div class="row">
          <button class="btn waves-effect waves-light" type="submit" name="btn-cadastrar">Cadastrar</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['btn-cadastrar'])){
  $nomealuno = $_POST['nomealuno'];
  $cpf= $_POST['cpf'];
  $sexo = $_POST['sexo'];
  $datanasc = $_POST['dtnasc'];
  $endereco = $_POST['endereço'];
  $telefone = $_POST['telcelular'];
  $senha = $_POST['senha'];
  $confsenha = $_POST['confsenha'];

  if(empty($nomealuno) or empty($cpf) or empty($sexo) or empty($endereco) or empty($datanasc) or empty($telefone) or empty($senha)or empty($confsenha)){
    print("Todos os campos devem estar preenchidos!");
  }
  elseif($confsenha != $senha){
    print("Senha e Confirmar senha estão incorretos!");
  }
  else{
    // Aqui 
    $cripsenha = md5($senha);
    $cripconf = md5($confsenha);
    $sql = "INSERT INTO alunos(nomealuno,cpf,sexo,dtnasc,endereco,telcelular,senha,confsenha) VALUES ('$nomealuno','$cpf','$sexo','$datanasc', '$endereco','$telefone','$cripsenha','$cripconf')";
    if(mysqli_query($nulink,$sql)){ 
    header('Location:loginaluno.php');
    }
    else{
      print("Não foi possivel fazer inclusão!");
    }
  }
}
require_once("../estrutura_pagina/footer.php");
?>