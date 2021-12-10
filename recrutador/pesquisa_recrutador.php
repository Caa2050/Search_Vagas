<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menurecrutador.php");


?>
<div class="row">
	<h5 class="center-align"> Pesquise por vagas adicionadas</h5>
	<form class="col s6 offset-m3" action="pesquisa_recrutador.php" method="POST">
    <div class="col s6">
        <select name="tipo">
             <option value="Estagio">Estagio</option>
             <option value="Emprego">Emprego</option>
            </select>
           </div>
        <div class="input-field">
        <input name="search" type="search" required  list="lista">
          <datalist id="lista">
            <?php 
                $id = $_SESSION['idrecrutador'];
                $sql = "SELECT * FROM vagas WHERE fkrecrutador = '$id'";
                $resultado = mysqli_query($nulink,$sql);
                $vaga = 1;
                while ($dados = mysqli_fetch_array($resultado)){
                  extract($dados);
                  ?>
                
                  <option value="<?php echo $nome_vaga;?>"> <?php echo $nome_vaga;?></option>
                  
                 
             <?php   }
              ?>
          </datalist>
          
          <i class="material-icons">close</i>
           <button class="btn waves-effect waves-light" type="submit" name="pesquisar">Buscar</button>
        </div>
      </form>
</div>
<?php
if(isset($_POST['pesquisar'])){
	$_SESSION['search'] = $_POST['search'];
  $_SESSION['id'] = $_SESSION['idrecrutador'];
  $_SESSION['tipo'] = $_POST['tipo'];
	header('Location:resultado_vagas.php');
		
}
?>
<div class="divider"></div>
  <div class="section">
  <h5>Vagas Adicionadas Recentemente</h5>
      <div class="col s12 m6 push-m3">
        <table class="striped">
          <thead>
            <tr>
              <th>Nome:</th>
              <th>tipo:</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $idre = $_SESSION['idrecrutador'];
            $sql = "SELECT * FROM vagas WHERE fkrecrutador = '$idre'";
            $resultado = mysqli_query($nulink,$sql);
            while($dados = mysqli_fetch_array($resultado)):
            ?>
            <tr>
              <td><?php echo $dados['nome_vaga'];?></td>
              <td><?php echo $dados['tipo'];?></td>
              <?php // icone de editar?>
              <td><a href="editar_vaga.php?id=<?php echo $dados['idvagas'];?>" class="btn-floating grey darken-3"><i class="material-icons">edit</i></a></td>
              <?php // icone de excluir?>
              <td><a href="#modal<?php echo $dados['idvagas'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>
              <div id="modal<?php echo $dados['idvagas'];?>" class="modal">
              <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir essa vaga?</p>
              </div>
              <div class="modal-footer">
              <form action="deletar_vaga.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $dados['idvagas'];?>">
                <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                 <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
              </div>
              </div>
            </tr>
          <?php endwhile;?>

          </tbody>
        </table>
       </div>
    </div>
<?php
require_once("../estrutura_pagina/footer.php");
?>