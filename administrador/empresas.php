<?php
require_once("../conexão/db_connect.php");
require_once("../estrutura_pagina/header.php");
require_once("./menuadm1.php");
?>
<div class="row">

	<h5>Relatorios</h5>
	<div class="row">
	<br>
<br>
<br>
	<form class="col s6 offset-m3" action="relatorio_vaga_empresa.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Selecione o relatorio</span>
          <p>
            <select name="idrecrutador">
              <?php 
                $sql = "SELECT * FROM recrutador";
                $resultado = mysqli_query($nulink,$sql);
                while ($dados = mysqli_fetch_array($resultado)){?>
                  <option value='<?php echo $dados['idrecrutador'];?>'> <?php echo $dados['nomerecrutador'];?></option>
             <?php   }
              ?>
            </select>
          </p>
          <button class="btn waves-effect waves-light" type="submit" name="selecionar">Selecionar</button>
        </div>
      </div>
	</form>
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
<br>
<?php
require_once("../estrutura_pagina/footer.php");
?>