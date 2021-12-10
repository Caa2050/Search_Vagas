<?php

require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");

  if (isset($_SESSION['idrecrutador'])){
  $id = $_SESSION['idrecrutador'];
  $sql = "SELECT * FROM recrutador WHERE idrecrutador = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
 else{
  $id = mysqli_escape_string($nulink,$_GET['id']);
  $sql = "SELECT * FROM recrutador WHERE idrecrutador = '$id'";
  $resultado = mysqli_query($nulink,$sql);
  $dados = mysqli_fetch_array($resultado);
 }
?>
<div class="row">
  <h5 class="center-align"><?php echo $dados['nomerecrutador'];?></h5>

  <div class="divider"></div>
  <div class="section">
  <h5>Informações do Usuario</h5>
  
    <h6 class="left-align">Endereço: <?php echo $dados['endereco'];?></h6>
    <h6 class="left-align">Telefone: <?php echo $dados['telefone'];?></h6>
    <h6 class="left-align">CNPJ: <?php echo $dados['cnpj'];?></h6>
    <h6 class="left-align">Email: <?php echo $dados['telefonecel'];?></h6>
    <h6 class="left-align">CNPJ: <?php echo $dados['email'];?></h6>

</div>
<div class="divider"></div>
<div class="section">
    <?php $id = $dados['idrecrutador']?>
    <h5>Vagas Adicionadas por <?php echo $dados['nomerecrutador'];?> </h5>
      <div class="col s12 ">
        <table class="striped">
          <thead>
            <tr>
              <th>Nome:</th>
              <th>tipo:</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM vagas WHERE fkrecrutador = '$id'";
            $resultado = mysqli_query($nulink,$sql);
            while($dados = mysqli_fetch_array($resultado)):
            ?>
            <tr>
              <td><?php echo $dados['nome_vaga'];?></td>
              <td><?php echo $dados['tipo'];?></td>
              <?php // icone de editar?>
              <td><a href="resultado_vagas.php?id=<?php echo $dados['idvagas'];?>" class="btn-floating grey darken-3"><i class="material-icons">description</i></a></td>
            </tr>
          <?php endwhile;?>

          </tbody>
        </table>
       </div>
  </div>
</div>
<?php
require_once("../estrutura_pagina/footer.php");
?>