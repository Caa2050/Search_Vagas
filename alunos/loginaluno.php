<?php
session_start();
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");
require_once("../conexão/db_connect.php");
// login do aluno(em construção)
?>
<div class="row">
	<div class="row">
	<form class="col s6 offset-m3" action="loginaluno.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Login</span>
          <input placeholder="Digite seu CPF" name="cpf" type="text" class="validate">
          
          <input placeholder="Digite sua senha" name="senha" type="password" class="validate">
          
          <button class="btn waves-effect waves-light" type="submit" name="entrar">Entrar</button> <button class="waves-effect waves-light btn-small" type="submit" name="cadastrar">Cadastrar</button> <button class="waves-effect waves-light btn-small" type="submit" name="rec-senha">Esqueci minha senha</button>
        </div>
      </div>
	</form>
</div>
</div>
<?php
if(isset($_POST['entrar'])){
	$login = $_POST['cpf'];
	$senha = $_POST['senha'];
		$sql = "SELECT cpf FROM alunos WHERE cpf = '$login'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado) > 0){
				$senha = md5($senha);
				$sql = "SELECT * FROM alunos WHERE cpf = '$login' AND senha = '$senha'" ;
				$resultado = mysqli_query($nulink,$sql);

				if(mysqli_num_rows($resultado) == 1){
					$dados = mysqli_fetch_array($resultado);
					$_SESSION['cpf'] = $dados['cpf'];
					$dados = mysqli_fetch_array($resultado);
					header('Location:principal.php');
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
if (isset($_POST['cadastrar'])) {
	header('location:cadastro.php');
}
if(isset($_POST['rec-senha'])){
	header('Location:recuperar-senha.php');
}
require_once("../estrutura_pagina/footer.php");
?>