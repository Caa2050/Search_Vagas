<?php
session_start();
require_once("../conexão/db_connect.php");
if (isset($_POST['btn-deletar'])) {
	
	$id = mysqli_escape_string($nulink,$_POST['id']);
	$sql = "DELETE FROM curriculos WHERE idcurriculo = '$id'";
	if (mysqli_query($nulink,$sql)) {
		$_SESSION['mensagem'] = "Deletado com sucesso!";

		header('Location:contaaluno.php');

	}else{
		$_SESSION['mensagem']="Erro ao deletar!";
		header('Location:contaaluno.php');
	}
}
?>