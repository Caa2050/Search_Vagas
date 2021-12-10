<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
require_once("./mensagem.php");
// tela principal do sitema, com cards.

?>
<div class="row" id="recentes">
  <div class="row">
    <h5>Vagas Adicionadas</h5>
    <?php
        $sql = "SELECT * FROM vagas";
        $resultado = mysqli_query($nulink,$sql);
        while($dados = mysqli_fetch_array($resultado)):

    ?>
    <div class="col s12 m3">
      <div class="card white">
        <div class="card-content black-text">
          
          <span class="card-title"><?php echo $dados['nome_vaga'];?></span>
          <p style="font-size: 20px">Tipo da Vaga:</p>
          <p style="font-size: 20px"><?php echo $dados['tipo'];?></p>
        </div>
        <div class="card-action red accent-4 white-text">
          <a href="descrição.php?id=<?php echo $dados['idvagas'];?>">Ver Mais</a>
        </div>
      </div>
    </div>
  <?php endwhile;?>
  </div>
</div>
<div class="row" id="adicionar">
  <div class="row">
    <h5>Adicionar Vagas</h5>

    <form action="vagas.php" method="POST" enctype="multipart/form-data" class="col s6 offset-m3">
    <div class="row">
    <div class="input-field col s6">
          <label for="nome_vaga">Nome</label>
          <input  name="nome_vaga" type="text" class="validate">
        </div>
    <div class="input-field col s6">
           <select name="tipo">
            <option value="Estagio">Estagio</option>
            <option value="Emprego">Emprego</option>
          
         </select>
        </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
          <label for="local">Local</label>
          <textarea name="local" type="text" class="materialize-textarea"></textarea>
        </div>
    <div class="input-field col s6">
          <label for="descrição">Descrição</label>
          <textarea  name="descrição"class="materialize-textarea"></textarea>
        </div>
    </div>
    <div class="row">
       <div class="input-field col s6">
          <label for="requisitos">Requisitos</label>
          <textarea name="requisitos" type="text" class="materialize-textarea"></textarea>
        </div>
         <div class="input-field col s6">
            <select name="idrecrutador">
              <?php 
                $sql = "SELECT * FROM recrutador";
                $resultado = mysqli_query($nulink,$sql);
                while ($dados = mysqli_fetch_array($resultado)){?>
                  <option value='<?php echo $dados['idrecrutador'];?>'> <?php echo $dados['nomerecrutador'];?></option>
             <?php   }
              ?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn waves-effect waves-light" name="enviar-formulario">Salvar</button>
  </form>
</div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once("../estrutura_pagina/footer.php");
?>