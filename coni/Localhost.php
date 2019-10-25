<?php

$mysqliL = new mysqli('192.168.1.55', 'root', '', 'diplomadopruebas',3306);
mysqli_set_charset($mysqliL, 'utf8');
//mysqli_query("SET NAMES 'utf8'");
if(mysqli_connect_errno()){
  echo 'Conexion Fallida : ', mysqli_connect_error();
  exit();
}

 ?>
