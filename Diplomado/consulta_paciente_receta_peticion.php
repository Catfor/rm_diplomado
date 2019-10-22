<?php session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
include('../coni/Localhost.php');

$html = '<ul>';
$query = '';

if (isset($_POST['id'])) {
  $query = "SELECT ct.id_receta, concat(m.nombre_usuario, ' ', m.apellidos_usuario) as medico, m.genero, ct.fecha_emision FROM ctrl_receta_medico AS ct INNER JOIN usu_me AS m ON m.id_usuario = ct.id_usuario WHERE ct.id_paciente = " . $_POST['id'];
  $resultset = $mysqliL->query($query);
  $contRes = $resultset->num_rows;
  if ($contRes > 0) {
    while ($fila = $resultset->fetch_assoc()) {
      $doctor = ($fila['genero'] == 'H' ? 'Dr. ' : 'Dra. ') . ucwords($fila['medico']);
      $id_receta = sprintf("%05d", $fila['id_receta']);
      $fecha = $fila['fecha_emision'];
      $html .= "<li><a href='./tratamientoc/app/reportes/receta.php?id_paciente=".$_POST['id']."&id_receta=".$id_receta."'> " . $id_receta . " - " .  $doctor . " @ " . $fecha . " </a></li>";
    }
  }else{
    $html .= "<li> No tiene historial </li>";
  }
  $html .= "</ul>";
  echo $html;
}
