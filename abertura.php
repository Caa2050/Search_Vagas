<?php
require_once("./estrutura_pagina/header.php");
require_once("./estrutura_pagina/menu2.php");
?>
<div class="row" id="aluno">
	<div class="row">
    <h5>Para Alunos</h5>
    <div class="col s6">
    	<p style="font-size: 20px">Em Search Vagas, você podera encontrar vagas de estagio
    	e vagas de emprego proximas a você, tendo a possibilidade
    	de enviar seu curriculo diretamente para a empresa que você
    	desejar.</p>
    </div>
    <div class="col s6">
    	<img class="responsive-img" src="./images/fatecourinhos.jpg"><br>
    	<a class="waves-effect waves-light btn" href="alunos/loginaluno.php">Entrar</a>
    </div>
  </div>
</div>
<div class="row" id="recrutador">
	<div class="row">
    <h5>Para Recrutadores</h5>
    <div class="col s6">
    	<p style="font-size: 20px">Em Search Vagas, você podera publicar as vagas de sua empresa
    	para os alunos da FATEC Ourinhos, podendo receber as propostas de
    	alunos, assim como também receber os curriculos para cada vaga que
    	você publicar.</p>
    </div>
    <div class="col s6">
    	<img class = "responsive-img" src="./images/empresa.jpg"><br>
    	<a class="waves-effect waves-light btn" href="recrutador/loginrecrutador.php">Entrar</a>
    </div>
  </div>
  <br>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once("./estrutura_pagina/footer.php");
?>