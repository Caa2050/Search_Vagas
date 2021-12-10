<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
require_once("./mensagem.php");


?>
<div class="row">
	<h5 class="center-align"> Pesquise por alunos, vagas e recrutadores  </h5>
	<form class="col s6 offset-m3" action="pesquisa.php" method="POST">
    <div class="col s6">
    <select name="tipo">
             <option value="Estagio">Estagio</option>
             <option value="Emprego">Emprego</option>
             <option value="Alunos">Alunos</option>
             <option value="Recrutador">Recrutador</option>
            </select>
           </div>
        <div class="input-field">
          <input name="search" type="search" required >
         
          <i class="material-icons">close</i>
           <button class="btn waves-effect waves-light" type="submit" name="pesquisar">Buscar</button>
        </div>
      </form>
</div>
<?php
if(isset($_POST['pesquisar'])){
	$_SESSION['search'] = $_POST['search'];
  $_SESSION['tipo'] = $_POST['tipo'];
  header('Location:resultado.php');
	/*$sql = "SELECT * FROM alunos WHERE cpf = '$search'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado)== 1){
				$dados = mysqli_fetch_array($resultado);
				$_SESSION['idaluno'] = $dados['idaluno'];
				header('Location:pesqaluno.php');
		}

		$sql = "SELECT * FROM recrutador WHERE cnpj = '$search'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado) == 1){
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['idrecrutador'] = $dados['idrecrutador'];
			header('Location:pesqrecrut.php');
		}

		$sql = "SELECT * FROM administrador WHERE email = '$search'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado) == 1){
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['idadm'] = $dados['idadm'];
			header('Location:pesqadm.php');
		}
    $sql = "SELECT * FROM vagas WHERE nome_vaga = '$search'";
    $resultado = mysqli_query($nulink,$sql);
    if(mysqli_num_rows($resultado)== 1){
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['idvagas'] = $dados['idvagas'];
        header('Location:pesqvagas.php');
    }*/
}
?>

<?php
require_once("../estrutura_pagina/footer.php");
?>