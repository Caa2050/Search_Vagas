<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menualuno.php");


?>

<div class="row">
	<h5 class="center-align"> Pesquise por vagas e recrutadores</h5>
	<form class="col s6 offset-m3" action="pesquisaluno.php" method="POST">
		<div class="col s6">
        <select name="tipo">
             <option value="Estagio">Estagio</option>
             <option value="Emprego">Emprego</option>
             <option value="Recrutador">Recrutador</option>
            </select>
           </div>
          
        <div class="input-field">
          <input name="search" type="search" required  list="lista">
          <datalist id="lista">
          	<?php 
                $sql = "SELECT vag.idvagas,vag.nome_vaga AS nomevaga,vag.fkrecrutador, rec.nomerecrutador AS nomerecrut FROM vagas vag INNER JOIN recrutador AS rec ON rec.idrecrutador = vag.fkrecrutador";
                $resultado = mysqli_query($nulink,$sql);
                $vaga = 1;
                while ($dados = mysqli_fetch_array($resultado)){
                  extract($dados);
                  ?>
                
                  <option value="<?php echo $nomevaga;?>"> <?php echo $nomevaga;?></option>
                  <option value="<?php echo $nomerecrut;?>"><?php echo $nomerecrut;?></option>
                 
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
	$_SESSION['tipo'] = $_POST['tipo'];
	header('Location:resultado.php');
}
?>
<div class="divider"></div>
  <div class="section">
    <h5>Vagas Adicionadas Recentemente</h5>
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
            $sql = "SELECT * FROM vagas";
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
  <div class="divider"></div>
  <div class="section">
    <h5>Recrutadores</h5>
      <div class="col s12 ">
        <table class="striped">
          <thead>
            <tr>
              <th>Nome:</th>
              <th>Cnpj</th>
              <th>Email:</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM recrutador";
            $resultado = mysqli_query($nulink,$sql);
            while($dados = mysqli_fetch_array($resultado)):
            ?>
            <tr>
              <td><?php echo $dados['nomerecrutador'];?></td>
              <td><?php echo $dados['cnpj'];?></td>
              <td><?php echo $dados['email'];?></td>
              <?php // icone de ?>
              <td><a href="resultado_recrutador.php?id=<?php echo $dados['idrecrutador'];?>" class="btn-floating grey darken-3"><i class="material-icons">description</i></a></td>
            </tr>
          <?php endwhile;?>

          </tbody>
        </table>
      </div>
  </div>
<?php
require_once("../estrutura_pagina/footer.php");
?>