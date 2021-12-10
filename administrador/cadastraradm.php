<?php
session_start();
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");
require_once("./mensagem.php");
?>
<div class="row">
	<form class="col s12" action="cadastraradm.php" method="POST">
      <div class="row">
        <div class="input-field col s6">
        	<label for="nomeadm">Nome</label>
          <input  name="nomeadm" type="text" class="validate">

        </div>
        <div class="input-field col s6">
        	<label for="cnpj">CNPJ</label>
          <input name="cnpj" type="text" class="validate">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        	<label for="endereço">Endereço</label>
          <input  name="endereço" type="text" class="validate">
          
        </div>
        <div class="input-field col s6">
        	<label for="telefone">Telefone</label>
          <input name="telefone" type="text" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        	<label for="email">Email</label>
          <input name="email" type="email" class="validate">
          
        </div>
        <div class="input-field col s6">
        	<label for="senha">Senha</label>
          <input name="senha" type="password" class="validate">
          
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
        	<label for="nomeadm">Confirmar Senha</label>
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
	$nomeadm = $_POST['nomeadm'];
	$cnpj= $_POST['cnpj'];
	$endereço = $_POST['endereço'];
	$telefone = $_POST['telefone'];
	$email= $_POST['email'];
	$senha = $_POST['senha'];
	$confsenha = $_POST['confsenha'];

	if(empty($nomeadm) or empty($cnpj) or empty($endereço) or empty($telefone) or empty($email) or empty($senha) or empty($confsenha)){
		print("Todos os campos devem estar preenchidos!");
	}
	elseif($confsenha != $senha){
		print("Senha e Confirmar senha estão incorretos!");
	}
	else{
		// Aqui 
		$cripsenha = md5($senha);
		$cripconf = md5($confsenha);
		$sql = "INSERT INTO administrador(nomeadm,endereco,telefone,cnpj,email,senha,confsenha) VALUES ('$nomeadm','$endereço','$telefone','$cnpj','$email','$cripsenha','$cripconf')";
		if(mysqli_query($nulink,$sql)){	
      $_SESSION['mensagem'] = "Cadastrado com sucesso!";
		  header('Location:loginadm.php');
		}
		else{
      $_SESSION['mensagem'] = "Não foi possivel fazer inclusão!";
         header('Location:loginadm.php');
		}
	}
}
require_once("../estrutura_pagina/footer.php");
?>