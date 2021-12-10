<?php
session_start();
require_once("../conexão/db_connect.php");

$id = $_SESSION['idrecrutador'];
if(isset($_POST['enviar-formulario'])){
	$nome_vaga = $_POST['nome_vaga'];
	$nome = $_FILES['arquivo']['name'];
	$destino = 'uploads/'. $nome;
	$extension = pathinfo($nome,PATHINFO_EXTENSION);
	$arquivo = $_FILES['arquivo']['tmp_name'];
	$tipo = $_POST['tipo'];

	if(!in_array($extension,['png','jpg','PNG','JPG'])){
		print("<script type='text/javascript'>
			alert('a extensão do arquivo deve ser .png ou jpg');</script>");
	}
	elseif($_FILES['arquivo']['size'] > 1000000){
		print("<script type='text/javascript'>
			alert('arquivo muito grande');</script>");
	}
	else{
		if(move_uploaded_file($arquivo,$destino)){		
			$sql ="INSERT INTO vagas (nome_vaga,banner,tipo,fkrecrutador) VALUES ('$nome_vaga','$nome','$tipo','$id')";
			if(mysqli_query($nulink,$sql)){
				header('Location:principal_recrutador.php');
			}
			else{
				print("<script type='text/javascript'>
			alert('falha ao enviar');</script>");
			}
		}
	}
}



?>

