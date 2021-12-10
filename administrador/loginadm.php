<?php
session_start();
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");
require_once("../conexão/db_connect.php");
require_once("./mensagem.php");
// login do aluno(em construção)
?>
<div class="row">
	<div class="row">
	<form class="col s6 offset-m3" action="loginadm.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Login</span>
          <input placeholder="Digite seu email" name="email" type="email" class="validate">
          
          <input placeholder="Digite sua senha" name="senha" type="password" class="validate">
          
          <button class="btn waves-effect waves-light" type="submit" name="entrar">Entrar</button> <button class="waves-effect waves-light btn-small" type="submit" name="cadastrar">Cadastrar</button> <button class="waves-effect waves-light btn-small" type="submit" name="rec-senha">Esqueci minha senha</button>

        </div>
      </div>
	</form>
</div>
</div>
<?php
if(isset($_POST['entrar'])){
	$login = $_POST['email'];
	$senha = $_POST['senha'];
		$sql = "SELECT email FROM administrador WHERE email = '$login'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado) > 0){
				$senha = md5($senha);
				$sql = "SELECT * FROM administrador WHERE email = '$login' AND senha = '$senha'" ;
				$resultado = mysqli_query($nulink,$sql);

				if(mysqli_num_rows($resultado) == 1){
					$dados = mysqli_fetch_array($resultado);
					$_SESSION['email'] = $dados['email'];
					$dados = mysqli_fetch_array($resultado);
					header('Location:principaladm.php');
				}
				else{
					print("<script type='text/javascript'>
						alert('Senha incorreta')
					</script>");
				}
		}
		else{
			print("<script type='text/javascript'>
				alert('Usuario não Cadastrado');
			</script>");
		}
}
elseif (isset($_POST['cadastrar'])){
	header('location:cadastraradm.php');
}
if (isset($_POST['rec-senha'])){
	header('Location:recuperar-senha.php');
}
require_once("../estrutura_pagina/footer.php");
?>