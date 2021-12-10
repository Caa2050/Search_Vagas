<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");

/*$sql = "SELECT * FROM recrutador WHERE nomerecrutador = '$search'";
	$resultado = mysqli_query($nulink,$sql);
	if(mysqli_num_rows($resultado) == 1){
		$dados = mysqli_fetch_array($resultado);
		$_SESSION['idrecrutador'] = $dados['idrecrutador'];
		header('Location:resultado_recrutador.php');
	}

	

	
	if($search == 'Estagio' or $search == 'estagio' or $search== 'Emprego' or $search== 'emprego'){
		$sql = "SELECT * FROM vagas WHERE tipo = '$search'";
		$resultado = mysqli_query($nulink,$sql);
		if(mysqli_num_rows($resultado)>=1){
			$dados = mysqli_fetch_array($resultado);
			$_SESSION['idvagas'] = $dados['idvagas'];
			header('Location:resultado.php');
		}
	}*/
$search = $_SESSION['search'];
if ($_SESSION['tipo'] == 'Estagio') {
	

?>
<div class="row">
	<?php
          $sql = "SELECT * FROM vagas WHERE tipo= 'Estagio' AND nome_vaga LIKE  '%$search%' LIMIT 5";
			$resultado = mysqli_query($nulink,$sql);
			while($dados = mysqli_fetch_array($resultado)){
		
          ?>
	<div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nome_vaga'];?></span>
          <p>Tipo da Vaga:</p>
          <p><?php echo $dados['tipo'];?></p>
          <p><?php echo $dados['local'];?></p>
        </div>
        
        <div class="card-action red accent-4 white-text">
          <a href="descrição.php?id=<?php echo $dados['idvagas'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
    
</div>
<?php
}
elseif ($_SESSION['tipo'] == 'Emprego'){?>
<div class="row">
	<?php
          $sql = "SELECT * FROM vagas WHERE tipo= 'Emprego' AND nome_vaga LIKE  '%$search%' LIMIT 5";
			$resultado = mysqli_query($nulink,$sql);
			while($dados = mysqli_fetch_array($resultado)){
		
          ?>
	<div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nome_vaga'];?></span>
          <p>Tipo da Vaga:</p>
          <p><?php echo $dados['tipo'];?></p>
          <p><?php echo $dados['local'];?></p>
        </div>
        
        <div class="card-action red accent-4 white-text">
          <a href="descrição.php?id=<?php echo $dados['idvagas'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
    
</div>
<?php
}
elseif($_SESSION['tipo'] == 'Recrutador') {
	

?>
<div class="row">
	<?php
          $sql = "SELECT * FROM recrutador WHERE  cnpj LIKE  '%$search%' LIMIT 5";
			$resultado = mysqli_query($nulink,$sql);
			while($dados = mysqli_fetch_array($resultado)){
		
          ?>
	<div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nomerecrutador'];?></span>
          <p>Tipo da Vaga:</p>
          <p><?php echo $dados['email'];?></p>
          <p><?php echo $dados['cnpj'];?></p>
        </div>
        
        <div class="card-action red accent-4 white-text">
          <a href="pesqrecrut.php?id=<?php echo $dados['idrecrutador'];?>">Ver Perfil</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
<?php
}
else{
?>
<div class="row">
  <?php
          $sql = "SELECT * FROM alunos WHERE  cpf LIKE  '%$search%' LIMIT 5";
      $resultado = mysqli_query($nulink,$sql);
      while($dados = mysqli_fetch_array($resultado)){
    
          ?>
  <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nomealuno'];?></span>
          <p>CPF:</p>
          <p><?php echo $dados['cpf'];?></p>
          <p>Sexo:</p>
          <p><?php echo $dados['sexo'];?></p>
        </div>
        
        <div class="card-action red accent-4 white-text">
          <a href="pesqaluno.php?id=<?php echo $dados['idaluno'];?>">Ver Perfil</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
<?php
}
require_once("../estrutura_pagina/footer.php");
?>