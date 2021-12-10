<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");


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
          <a href="inscrição.php?id=<?php echo $dados['idvagas'];?>">Inscrever</a>
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
          <a href="inscrição.php?id=<?php echo $dados['idvagas'];?>">Inscrever</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
    
</div>
<?php
}
else {
	

?>
<div class="row">
	<?php
          $sql = "SELECT * FROM recrutador WHERE  nomerecrutador LIKE  '%$search%' LIMIT 5";
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
          <a href="resultado_recrutador.php?id=<?php echo $dados['idrecrutador'];?>">Ver Perfil</a>
        </div>
      </div>
    </div>
    <?php }?>
   </div>
<?php
}
require_once("../estrutura_pagina/footer.php");
?>