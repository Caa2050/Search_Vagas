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
	<form class="col s6 offset-m3" action="relatorios.php" method="POST">
		<div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Selecione o relatorio</span>
          <p>
      <label>
        <input name="relatorio" type="radio" value="atuais" checked />
        <span>Vagas Atuais</span>
      </label>
    </p>
    <p>
      <label>
        <input name="relatorio" type="radio" value="empresa" />
        <span>Vagas de uma empresa</span>
      </label>
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
if (isset($_POST['selecionar'])){
	if($_POST['relatorio'] == 'atuais'){
		header('Location:gerar_relatorio.php');
	}
	else {
		header('Location:empresas.php');
	}
}
require_once("../estrutura_pagina/footer.php");