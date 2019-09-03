<?php

session_start();
include("../coni/Localhost.php");
$idu=$_SESSION['id_usuario'];
$password = md5($_POST['password']);

//$sqlssss = "UPDATE sessiones SET activo='no' WHERE idusuario='$idusuario'";
//print_r($sql);

//$result = $mysqli->query($sqlssss);
///////////////////////////////////77
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d H:i:s");
$sqlssss = "UPDATE usu_me SET contra='$password',accion='cambio contra',fecha_cambio_contra='$hoy' WHERE id_usuario='$idu'";


     $resultqqd = $mysqliL->query($sqlssss);
//////////////////////
session_unset($_SESSION['loggedin']);
session_destroy();

header('Location: ../index.php');





 ?>
