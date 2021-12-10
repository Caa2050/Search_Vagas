<?php  
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");

if(isset($_POST['selecionar'])){
  $id = $_POST['idrecrutador'];

?>
<div class="col s12 m6 push-m3">
        <table class="striped">
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Tipo</th>
              <th>Local:</th>
              
            </tr>
          </thead>
          <tbody>
 <?php 
 		$sql = "SELECT * FROM vagas WHERE fkrecrutador = '$id'";
        $resultado=mysqli_query($nulink,$sql);
        while ( $dados=mysqli_fetch_array($resultado)){
         ?>
         <tr>
              <td><?php echo $dados['nome_vaga'];?></td>
              <td><?php echo $dados['tipo'];?></td>
              <td><?php echo $dados['local'];?></td>
         </tr>
       <?php } ?>

       </tbody>
       </table>
<?php
}
?>
