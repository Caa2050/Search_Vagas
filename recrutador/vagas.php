<?php
session_start();
require_once("../conexão/db_connect.php");
if(isset($_POST['enviar-formulario'])){
	$nome_vaga = $_POST['nome_vaga'];
	$tipo = $_POST['tipo'];
	$local = $_POST['local'];
	$descrição = $_POST['descrição'];
	$requisitos = $_POST['requisitos'];
	$fkrecrutador = $_SESSION['idrecrutador'];

	if(empty($nome_vaga) or empty($tipo) or empty($descrição) or empty($requisitos)){
		print("<script type='text/javascript'>
						alert('Todos os campos devem ser preenchidos')
					</script>");
	}
	else{
		$sql = "INSERT INTO vagas (nome_vaga,tipo,local,descricao,requisitos,fkrecrutador) VALUES ('$nome_vaga','$tipo','$local','$descrição','$requisitos','$fkrecrutador')";
		if(mysqli_query($nulink,$sql)){ 
   				 header('Location:principal_recrutador.php');
   		 }
    		else{
      		print("<script type='text/javascript'>
						alert('não foi possivel salvar');
					</script>");
    		}
	}
}
?>