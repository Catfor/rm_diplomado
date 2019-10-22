<?php
session_start();
setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
include('../coni/Localhost.php');

$html = '';
$query = '';

if (isset($_POST['fecha']) || isset($_POST['atencion'])) {
  $condiciones = ' WHERE 1=1 ';

  if(isset($_POST['fecha']) && !empty($_POST['fecha'])){
    $condiciones .= " AND DATE_FORMAT(a.fecha_atencion_medica,'%Y-%m-%d') = '" .$_POST["fecha"] . "' ";
  }
  if(isset($_POST['atencion']) && !empty($_POST['atencion'])){
    $condiciones .= " AND a.id_atencion_medica = '" .$_POST["atencion"] . "' ";
  }
  $query = "SELECT 	CONCAT( p.nombre_paciente, ' ', p.apellidos_paciente ) AS paciente, 	COUNT( * ) AS biopsias, 	COUNT( DISTINCT ct.id_atencion ) AS atencion, 	COUNT( ct.id_estudio_resultado ) AS resultados, 	COUNT( cm.id_receta) AS tratamientos FROM 	paciente p 	INNER JOIN ctrl_paciente_estudios ct ON p.id_paciente = ct.id_paciente  	INNER JOIN atencion_medica a on a.id_atencion_medica = ct.id_atencion AND ct.id_tipo_estudio <> 0  	LEFT JOIN ctrl_receta_medico cm on cm.id_paciente = p.id_paciente " . $condiciones . " GROUP BY 	p.nombre_paciente, 	p.apellidos_paciente";
}else{
  $query = "SELECT 	CONCAT( p.nombre_paciente, ' ', p.apellidos_paciente ) AS paciente, 	COUNT( * ) AS biopsias, 	COUNT( DISTINCT ct.id_atencion ) AS atencion, 	COUNT( ct.id_estudio_resultado ) AS resultados, 	COUNT( cm.id_receta) AS tratamientos FROM 	paciente p 	INNER JOIN ctrl_paciente_estudios ct ON p.id_paciente = ct.id_paciente  	INNER JOIN atencion_medica a on a.id_atencion_medica = ct.id_atencion AND ct.id_tipo_estudio <> 0  	LEFT JOIN ctrl_receta_medico cm on cm.id_paciente = p.id_paciente GROUP BY 	p.nombre_paciente, 	p.apellidos_paciente";
}
    $resultset = $mysqliL->query($query);
    while ($fila = $resultset->fetch_assoc()) {
      $paciente = ucwords($fila['paciente']);
      $biopsias = $fila['biopsias'];
      $atencion = $fila['atencion'];
      $resultados = $fila['resultados'];
      $tratamientos = $fila['tratamientos'];
      $html .= "  <tr>
              <td>$paciente </td>
              <td>$biopsias </td>
              <td>$atencion </td>
              <td>$resultados </td>
              <td>$tratamientos </td>
              <tr>";
    }

    echo $html;

?>
