<?php
$mysqliL = new mysqli('74.208.183.28', 'apps', 'apps1', 'diplomado',3307);
mysqli_set_charset($mysqliL, 'utf8');
//mysqli_query("SET NAMES 'utf8'");
if(mysqli_connect_errno()){
  echo 'Conexion Fallida : ', mysqli_connect_error();
  exit();
}
/*
 * Esta es la forma OO "oficial" de hacerlo,
 * AUNQUE $connect_error estaba averiado hasta PHP 5.2.9 y 5.3.0.
 */
/*
 * Use esto en lugar de $connect_error si necesita asegurarse
 * de la compatibilidad con versiones de PHP anteriores a 5.2.9 y 5.3.0.
 */
 ?>
