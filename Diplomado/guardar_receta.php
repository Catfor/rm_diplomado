<?php
session_start();
//echo "<pre>";
//echo var_dump($_POST);
//echo "</pre>";

if(isset($_SESSION['id_usuario']) ){
//if (false) {
  $id = $_SESSION['id_usuario'];
  $nombre_usuario = ucwords($_SESSION['nombre_usuario']);
  $apellidos_usuario = ucwords($_SESSION['apellidos_usuario']);

  $id_paciente = isset($_POST['id_paciente']) ? $_POST['id_paciente'] : die("Error :No se ha recibido el ID del paciente a registrar la atencion medica");
  $id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : die("Error :No se ha recibido el ID del medico que registra la atencion medica");

  include('../coni/Localhost.php');

  setlocale(LC_ALL, 'es_ES.UTF-8');
  date_default_timezone_set('America/Mexico_City');
  $h = date("Y-m-d");
  $hoys = date("Y-m-d H:i:s");

  $sql3 = "INSERT INTO ctrl_receta_medico (id_usuario, id_paciente, fecha_emision, observaciones) VALUES($id_usuario, $id_paciente, CURRENT_TIMESTAMP, '');";
  $resulta3 = $mysqliL->query($sql3);
  $cont = 0;
  foreach ($_POST["medicamento"] as $med) {
    $id_ctrl_receta_medico = $mysqliL->insert_id;
    $indicacion = $_POST["indicaciones"][$cont];
    $sql3 = "INSERT INTO ctrl_medicamento_receta (id_receta,medicamento, indicaciones) VALUES('$id_ctrl_receta_medico','$med', '$indicacion');";
    $resulta3 = $mysqliL->query($sql3);
    $cont++;
  }
}


//header("Location:consulta_paciente.php");
