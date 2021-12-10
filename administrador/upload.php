<?php
session_start();
require_once("../conexão/db_connect.php");

$id = $_SESSION['idaluno'];
if(isset($_POST['enviar-formulario'])){
	$nome = $_FILES['arquivo']['name'];
	$destino = 'uploads/'. $nome;
	$extension = pathinfo($nome,PATHINFO_EXTENSION);
	$arquivo = $_FILES['arquivo']['tmp_name'];
	$size = $_FILES['arquivo']['size'];

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
			$sql ="INSERT INTO curriculos (nome,size,fkaluno) VALUES ('$nome','$size','$id')";
			if(mysqli_query($nulink,$sql)){
				echo "file uploaded successfully";
				header('Location:contaaluno.php');
			}
			else{
				echo "failed to up upload file";
			}
		}
	}
}



?>

