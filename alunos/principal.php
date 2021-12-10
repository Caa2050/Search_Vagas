<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");
// tela principal do sitema, com cards.

?>
<div class="row ">

  <div class="row" id="recentes">
  <div class="row">
    <h5>Vagas Adicionadas</h5>
    <?php
       
        $cpf = $_SESSION['cpf'];
        $sql = "SELECT * FROM vagas";
        $resultado = mysqli_query($nulink,$sql);
        $sql2 = "SELECT * FROM alunos WHERE cpf = '$cpf'";
        $resultado2 = mysqli_query($nulink,$sql2);
        $result = mysqli_fetch_array($resultado2);
        $_SESSION['idaluno'] = $result['idaluno'];
        while($dados = mysqli_fetch_array($resultado)):

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
  <?php endwhile;?>
  </div>
</div>
</div>
<div class="row" id="vagas">
  <div class="row">
     <h5>Minhas Vagas</h5>
    <?php
        $cpf = $_SESSION['cpf'];
        $sql2 = "SELECT * FROM alunos WHERE cpf = '$cpf'";
        $resultado2 = mysqli_query($nulink,$sql2);
        $result = mysqli_fetch_array($resultado2);
        $idaluno = $result['idaluno'];
        $sql = "SELECT * FROM inscricao WHERE fkaluno = '$idaluno'";
        $resultado = mysqli_query($nulink,$sql);
        while($result2 = mysqli_fetch_array($resultado)):

    ?>
    <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          <?php 
          $fkvagas = $result2['fkvagas'];
            $sql2 = "SELECT * FROM vagas WHERE idvagas = '$fkvagas'";
            $resultado2 = mysqli_query($nulink,$sql2);
            $result = mysqli_fetch_array($resultado2);
              ?>
          <span class="card-title"><?php echo $result['nome_vaga'];?></span>
          <p>Tipo da Vaga:</p>
          <p><?php echo $result['tipo'];?></p>
          <p><?php echo $result['local'];?></p>
        </div>
        
        <div class="card-action red accent-4 white-text">
          <a href="descrição.php?id=<?php echo $result['idvagas'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
    
  <?php endwhile;?>
  </div>    
</div>

<?php
require_once("../estrutura_pagina/footer.php");
?>