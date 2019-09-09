<?php

$mysqliL = new mysqli('74.208.183.28', 'apps', 'apps1', 'diplomado',3307);
mysqli_set_charset($mysqliL, 'utf8');
//mysqli_query("SET NAMES 'utf8'");
if(mysqli_connect_errno()){
  echo 'Conexion Fallida : ', mysqli_connect_error();
  exit();
}

 ?>
 <?php
/*
 $mysqliL = new mysqli('localhost', 'root', '', 'diplomado',3306);
 mysqli_set_charset($mysqliL, 'utf8');
 //mysqli_query("SET NAMES 'utf8'");
 if(mysqli_connect_errno()){
   echo 'Conexion Fallida : ', mysqli_connect_error();
   exit();
 }
*/
  ?>
