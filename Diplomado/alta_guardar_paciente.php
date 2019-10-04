<?php
include('../coni/Localhost.php');

setlocale(LC_ALL, 'es_ES.UTF-8');
date_default_timezone_set('America/Mexico_City');
$hoys = date("Y-m-d H:i:s");
$nombre_paciente = $_GET['nombre_paciente'];
$apellidos_paciente = $_GET['apellidos_paciente'];
$estado_civil = $_GET['estado_civil'];
$direccion_paciente = $_GET['direccion_paciente'];
$municipio_paciente = $_GET['municipio_paciente'];
$codigo_postal = $_GET['codigo_postal'];
$tipo_seguro = $_GET['tipo_seguro'];
$ingresomensual = $_GET['ingresomensual'];
$escolaridad_paciente = $_GET['escolaridad_paciente'];
$apoyo_gubernamental_paciente = $_GET['apoyo_gubernamental_paciente'];
$razon_apoyo_paciente = $_GET['razon_apoyo_paciente'];
$nombre_familiar_paciente = $_GET['nombre_familiar_paciente'];
$telefono_familiar_paciente = $_GET['telefono_familiar_paciente'];
$celular_familiar_paciente = $_GET['celular_familiar_paciente'];
$nombre_contacto_paciente = $_GET['nombre_contacto_paciente'];
$telefono_contacto_paciente = $_GET['telefono_contacto_paciente'];
$celular_contacto_paciente = $_GET['celular_contacto_paciente'];
$newDate = date('Y-m-d', strtotime($_GET['edad_paciente']));
$otro_tipo_seguro = $_GET['otro_tipo_seguro'];


$result123 = mysqli_query($mysqliL, "SELECT * from paciente where nombre_paciente='$nombre_paciente' and apellidos_paciente='$apellidos_paciente'");

$total = $result123->num_rows;
if ($total > 0) {
  header("Location:alta_paciente1.php?nombres=$nombre_paciente $apellidos_paciente");
} else {
  $cumpleanos = new DateTime("$newDate");
  $hoy = new DateTime();
  $annos = $hoy->diff($cumpleanos);
  $edad = $annos->y;

  $sql11 = "INSERT INTO paciente
  (nombre_paciente,apellidos_paciente,fecha_nacimiento_paciente,edad_paciente,estado_civil
    ,direccion_paciente,municipio_paciente,codigo_postal,
    ingreso_mensual,escolaridad_paciente,
    apoyo_gubernamental_paciente,razon_apoyo_paciente
    ,nombre_familiar_paciente,telefono_familiar_paciente,
    celular_familiar_paciente
    ,nombre_contacto_paciente,telefono_contacto_paciente,celular_contacto_paciente,fecha_creacion,otro_tipo_seguro)
  VALUES
  ('$nombre_paciente','$apellidos_paciente','$newDate','$edad','$estado_civil','$direccion_paciente','$municipio_paciente',
    '$codigo_postal','$ingresomensual','$escolaridad_paciente','$apoyo_gubernamental_paciente',
    '$razon_apoyo_paciente','$nombre_familiar_paciente','$telefono_familiar_paciente','$celular_familiar_paciente',
    '$nombre_contacto_paciente','$telefono_contacto_paciente','$celular_contacto_paciente','$hoys','$otro_tipo_seguro')";
  $resultaq = $mysqliL->query($sql11);
  //   echo $sql11.'<br>';
  $id_bitacora = $mysqliL->insert_id;
  ////////////////////////////////////////////////
  $sql11 = "INSERT INTO atencion_medica
  (id_paciente)
  VALUES
  ('$id_bitacora')";
  //     $resultaq = $mysqliL->query($sql11);
  //////////////////////////////////////////////


  for ($y = 0; $y < count($tipo_seguro); $y++) {
    $tipos = $tipo_seguro[$y];
    echo $tipos . '<br>';
    $sql112 = "INSERT INTO tipo_seguro
(id_seguro,id_paciente)
VALUES
('$tipos','$id_bitacora')";
    $resultaq123 = $mysqliL->query($sql112);
    echo $sql112;
  }

  
  $idUsuario = $_SESSION['id_usuario'];
  $sql11 = "INSERT INTO bitacora_ingreso
  (fecha_ingreso,accion,id_u)
  VALUES
  ('$hoys','Se agrego el paciente paciente $nombre_paciente $apellidos_paciente , con el ID $id_paciente','$idUsuario')";
  $resultaq = $mysqliL->query($sql11);

  header("Location:consulta_paciente1.php?nom=$nombre_paciente $apellidos_paciente");
}
