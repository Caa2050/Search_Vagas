<?php
session_start();
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("../estrutura_pagina/menu_logo.php");
?>
<div class="row">
	<div class="row">
	<form class="col s6 offset-m3" action="recuperar-senha.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Confirmar Usuario</span>
          <input placeholder="Digite seu CPF" name="cpf" type="text" class="validate"]>
          
          
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
	$cpf = $_POST['cpf'];

	if(empty($cpf)){
		print("<script type='text/javascript'>
				alert('informe o cnpj');
			</script>");
	}
	else{
		$sql = "SELECT * FROM alunos WHERE cpf = '$cpf'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado)== 1){
				
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['cpf'] = $dados['cpf'];
			header('Location:nova_senha.php');
		}
		else{
			print("<script type='text/javascript'>
				alert('O usuario não existe');
			</script>");
		}
	}
}
require_once("../estrutura_pagina/footer.php");
?>
