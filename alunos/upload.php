<?php
session_start();
require_once("../conexão/db_connect.php");

$id = $_SESSION['idaluno'];
$sql = "SELECT * FROM curriculos WHERE fkaluno ='$id'";
$resultado = mysqli_query($nulink,$sql);
if(mysqli_num_rows($resultado) == 0){
if(isset($_POST['enviar-formulario'])){
	$nome = $_FILES['arquivo']['name'];
	$destino = 'uploads/'. $nome;
	$extension = pathinfo($nome,PATHINFO_EXTENSION);
	$arquivo = $_FILES['arquivo']['tmp_name'];
	$size = $_FILES['arquivo']['size'];

	if(!in_array($extension,['pdf'])){
		echo "a extensão do arquivo deve ser .zip,.pdf ou png";
	}
	elseif($_FILES['arquivo']['size'] > 1000000){
		echo "arquivo muito grande";
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
}
else{
	print("<script type='text/javascript'>
						alert('Apenas um curriculo pode ser cadastrado! Delete o já cadastrado ou altere-o')
					</script>");
	$nome = $_FILES['arquivo']['name'];
	$destino = 'uploads/'. $nome;
	$extension = pathinfo($nome,PATHINFO_EXTENSION);
	$arquivo = $_FILES['arquivo']['tmp_name'];
	$size = $_FILES['arquivo']['size'];

	if(!in_array($extension,['pdf'])){
		echo "a extensão do arquivo deve ser .zip,.pdf ou png";
	}
	elseif($_FILES['arquivo']['size'] > 1000000){
		echo "arquivo muito grande";
	}
	else{
		if(move_uploaded_file($arquivo,$destino)){
			$sql ="UPDATE curriculos SET nome ='$nome', size = '$size' WHERE fkaluno = '$id'";
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