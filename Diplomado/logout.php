<?php
session_start();
include("../coni/Localhost.php");
$idu=$_SESSION['id_usuario'];
//$sqlssss = "UPDATE sessiones SET activo='no' WHERE idusuario='$idusuario'";
//print_r($sql);

//$result = $mysqli->query($sqlssss);
///////////////////////////////////77
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d H:i:s");
$cierrasession = "INSERT INTO  bitacora_ingreso ( fecha_ingreso, accion,id_u)
        VALUES ('$hoy','Cerro session','$idu')";
$cerrar = $mysqliL->query($cierrasession);
echo $cierrasession;
//////////////////////
session_unset($_SESSION['loggedin']);
session_destroy();

header('Location: ../index.php');
?>
