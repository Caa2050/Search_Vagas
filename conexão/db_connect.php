<?php
function conectamy($host, $user, $passwd, $dbase)
{ 
  global $nulink;
  $nulink=mysqli_connect($host,$user,$passwd,$dbase);

  mysqli_query($nulink,"SET NAMES 'utf8'");
  mysqli_query($nulink,'SET character_set_connection=utf8');
  mysqli_query($nulink,'SET character_set_client=utf8');
  mysqli_query($nulink,'SET character_set_results=utf8');
}
conectamy("127.0.0.1:52527","azure","6#vWHD_$","bancotg");

?>