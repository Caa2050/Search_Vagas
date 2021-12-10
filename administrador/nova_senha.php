<?php
session_start();
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");
?>
<div class="row">
	<div class="row">
	<form class="col s6 offset-m3" action="nova_senha.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Nova senha</span>
          <input placeholder="Digite a nova senha" name="senha" type="password" class="validate"]>
          <span class="card-title">Confirme a nova senha</span>
          <input placeholder="Confirme a nova senha" name="confsenha" type="password" class="validate"]>
          <button class="btn waves-effect waves-light" type="submit" name="conf">Confirmar</button> 
        </div>
      </div>
	</form>
</div>
</div>
<br>
<br>
<br>
<br>
<?php
if (isset($_POST['conf'])){
	$email = $_SESSION['email'];
	$senha = $_POST['senha'];
	$confsenha = $_POST['confsenha'];
	if(empty($senha) or empty($confsenha)){
		print("<script type='text/javascript'>
				alert('Todos os campos devem estar preenchidos!');
			</script>");
	}
	elseif ($senha != $confsenha) {
		print("<script type='text/javascript'>
				alert('Nova senha e Confirmar a nova senha estão incorretos!');
			</script>");
	}
	else{
		$cripsenha = md5($senha);
		$cripconf = md5($confsenha);
		$sql = "UPDATE administrador SET senha ='$cripsenha',confsenha = '$cripconf' WHERE email = '$email'";
		if(mysqli_query($nulink,$sql)){
			$_SESSION['mensagem'] = "Atualizada com sucesso!";
			header('Location:loginadm.php');
		}
		else{
			print("<script type='text/javascript'>
				alert('Não foi possivel alterar a senha');
			</script>");
		}
	}
}
require_once("../estrutura_pagina/footer.php");
?>
