<?php
session_start();
require_once("../conexão/db_connect.php");
if (isset($_GET['id'])) {
	$idvaga = $_GET['id'];
	$idaluno = $_SESSION['idaluno'];

	$sql = "SELECT * FROM curriculos WHERE fkaluno = '$idaluno'";
	$resultado = mysqli_query($nulink,$sql);
	if(mysqli_num_rows($resultado)==0){
	    header('Location:contaaluno.php');
	}
	else{
	$dados = mysqli_fetch_array($resultado);
	$curriculo = $dados['idcurriculo'];

	$sql = "INSERT INTO inscricao (fkaluno,fkvagas,fkcurriculo) VALUES ('$idaluno','$idvaga','$curriculo')";
	if(mysqli_query($nulink,$sql)){
		print("<script type='text/javascript'>
						alert('Inscrição Feita')
					</script>");
		header('Location:principal.php');
	}
	else{
		print("<script type='text/javascript'>
						alert('Não foi possivel fazer a inscrição')
					</script>");
		header('Location:principal.php');
	}
	}
}
?>