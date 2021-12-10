<?php
session_start();
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");

?>
<div class="row">
  <form class="col s12" action="cadastrarempresa.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
          <label for="nomerecrutador">Nome</label>
          <input  name="nomerecrutador" type="text" class="validate">

        </div>
        <div class="input-field col s6">
          <label for="cnpj">cnpj</label>
          <input name="cnpj" type="text" class="validate">
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
          <label for="endereco">Endereço</label>
          <input type="text" name="endereco" class="validate">
          
        </div>
        <div class="input-field col s6">
          <label for="telefone">Telefone</label>
          <input name="telefone" type="text" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <label for="telcelular">Telefone Celular</label>
          <input name="telcelular" type="text" class="validate">
          
        </div>
        <div class="input-field col s6">
          <label for="email">Email</label>
          <input name="email" type="email" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <label for="senha">Senha</label>
          <input name="senha" type="password" class="validate">
        </div>
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
  $nomerecrutador = $_POST['nomerecrutador'];
  $cnpj= $_POST['cnpj'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $telcelular = $_POST['telcelular'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $confsenha = $_POST['confsenha'];

  if(empty($nomerecrutador) or empty($cnpj) or empty($endereco) or empty($telefone) or empty($telcelular) or empty($email) or empty($senha)or empty($confsenha)){
    print("Todos os campos devem estar preenchidos!");
  }
  elseif($confsenha != $senha){
    print("Senha e Confirmar senha estão incorretos!");
  }
  else{
    // Aqui 
    $cripsenha = md5($senha);
    $cripconf = md5($confsenha);
    $sql = "INSERT INTO recrutador(nomerecrutador,endereco,telefone,cnpj,telefonecel,email,senha,confsenha) VALUES ('$nomerecrutador','$endereco','$telefone','$cnpj', '$telcelular','$email','$cripsenha','$cripconf')";
    if(mysqli_query($nulink,$sql)){ 
    header('Location:loginrecrutador.php');
    }
    else{
      print("Não foi possivel fazer inclusão!");
    }
  }
}
require_once("../estrutura_pagina/footer.php");
?>