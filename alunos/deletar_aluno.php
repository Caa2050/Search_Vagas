<?php
session_start();
require_once("../conexão/db_connect.php");
if (isset($_POST['btn-deletar'])) {
	
	$id = mysqli_escape_string($nulink,$_POST['id']);
	$sql = "DELETE FROM alunos WHERE idaluno = '$id'";
	if (mysqli_query($nulink,$sql)) {
		$_SESSION['mensagem'] = "Deletado com sucesso!";

		header('Location:../administrador/pesquisa.php');

	}else{
		$_SESSION['mensagem']="Erro ao deletar!";
		header('Location:../administrador/pesquisa.php');
	}
}
?>