<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
// tela principal do sitema, com cards.


?>
<div class="row">
  <div class="row">
    <h5>Candidaturas</h5>
   <?php
   $query = "SELECT * FROM vagas";
    $sqlresult = mysqli_query($nulink,$query);
    while ($dado= mysqli_fetch_array($sqlresult)) {
      ?>
    <?php
        $sql = "SELECT * FROM inscricao WHERE fkvagas = '$dado[idvagas]'";
        $resultado = mysqli_query($nulink,$sql);
        while($dados = mysqli_fetch_array($resultado)):

    ?>
    <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          <?php 
              $fkaluno = $dados['fkaluno'];
             $sql = "SELECT * FROM alunos WHERE idaluno = $fkaluno";
            $resultado = mysqli_query($nulink,$sql);
              $result = mysqli_fetch_array($resultado);

          ?>
          <span class="card-title"><?php echo $result['nomealuno'];?></span>
          <p>Vaga:</p>
          <?php 
              $fkvagas = $dados['fkvagas'];
             $sql = "SELECT * FROM vagas WHERE idvagas = $fkvagas";
            $resultado = mysqli_query($nulink,$sql);
              $result3 = mysqli_fetch_array($resultado);

          ?>
          <p><?php echo $result3['nome_vaga'];?></p>
        </div>
            <?php 
              $fkcurriculo = $dados['fkcurriculo'];
             $sql = "SELECT * FROM curriculos WHERE idcurriculo = $fkcurriculo";
            $resultado = mysqli_query($nulink,$sql);
            $result2 = mysqli_fetch_array($resultado);

          ?>
        <div class="card-action red accent-4 white-text">
          <a href="download.php?file=<?php echo $result2['nome'];?>">Baixar Curriculo</a>
        </div>
      </div>
    </div>
    <?php endwhile;
  }
?>
  </div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>