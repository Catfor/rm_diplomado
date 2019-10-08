<?php
//echo "<pre>";
// echo var_dump( $_POST);
//echo "</pre>";

if(isset($_SESSION['id_usuario']) ){
  $id = $_SESSION['id_usuario'];
  $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
  $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);
  
  $idpaciente = isset($_POST['idpaciente']) ? $_POST['idpaciente'] : die("Error :No se ha recibido el ID del paciente a registrar la atencion medica");
  $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : die("Error :No se ha recibido el ID del medico que registra la atencion medica");

  include('../coni/Localhost.php');

  setlocale(LC_ALL, 'es_ES.UTF-8');
  date_default_timezone_set('America/Mexico_City');
  $h = date("Y-m-d");
  $hoys = date("Y-m-d H:i:s");

  $clasificacion_medicovagi = $_POST['clasificacion_medicoVagi'];
  if (!empty(trim($anotaciones_vaginoscopia)) || !empty(trim($estudio_solicitar_vaginoscopia))) {

    $anotaciones_vaginoscopia = (!empty(trim($anotaciones_vaginoscopia))) ? $anotaciones_vaginoscopia : "Sin anotaciones de la biopsia";
    $insertaestudio_vaginoscopia = "INSERT INTO estudio_vaginoscopia (estudio_solicitar_vaginoscopia,anotaciones_vaginoscopia,fecha_estudio) VALUES ('$estudio_solicitar_vaginoscopia','$anotaciones_vaginoscopia','$hoys')";
    $resultadoestudio_vaginoscopia = $mysqliL->query($insertaestudio_vaginoscopia);

    $id_ant_estudio_vaginoscopia = $mysqliL->insert_id;

    $sql3 = "INSERT INTO ctrl_paciente_estudios (id_paciente,id_estudio,id_tipo_estudio,id_usuario,id_atencion,clasificacion_medico)
    VALUES ('$idpaciente','$id_ant_estudio_vaginoscopia','5','$id_usuario','$id_ant_atencionmedica','$clasificacion_medicovagi')";
    $resulta3 = $mysqliL->query($sql3);
  }
}


//header("Location:consulta_paciente.php");
